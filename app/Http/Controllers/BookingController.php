<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * 🏠 DASHBOARD UTAMA ADMIN (Omset, Grafik 7 Hari, Stok, Pelanggan)
     */
    public function indexDashboardAdmin()
    {
        // 1. Omset Hari Ini
        $omsetHariIni = Schema::hasTable('transaksi')
            ? (DB::table('transaksi')
                ->whereDate('tgl_transaksi', Carbon::today())
                ->where('status_pembayaran', 'Lunas')
                ->sum(DB::raw('COALESCE(total_biaya, 0)')) ?? 0)
            : 0;

        // 2. Data Sparepart (Stok Total & Menipis)
        $namaTabelStok = Schema::hasTable('spareparts') ? 'spareparts' : (Schema::hasTable('sparepart') ? 'sparepart' : null);
        $totalStok = 0;
        $stokMenipis = 0;
        $barangHampirHabis = collect();

        if ($namaTabelStok) {
            $totalStok = DB::table($namaTabelStok)->sum('jumlah_stok') ?? 0;
            $stokMenipis = DB::table($namaTabelStok)->where('jumlah_stok', '<=', 5)->count();
            $barangHampirHabis = DB::table($namaTabelStok)->where('jumlah_stok', '<=', 5)->get();
        }

        // 3. Daftar Pelanggan (Pengaman jika tabel pelanggan ada)
        $pelanggan = Schema::hasTable('pelanggan') ? DB::table('pelanggan')->get() : collect();

        // 4. Grafik Pendapatan (7 Hari Terakhir)
        $namaHariMap = [
            'Mon' => 'SEN', 'Tue' => 'SEL', 'Wed' => 'RAB', 'Thu' => 'KAM',
            'Fri' => 'JUM', 'Sat' => 'SAB', 'Sun' => 'MIN',
        ];

        $grafik = [];
        $maxOmset = 1;

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $total = Schema::hasTable('transaksi')
                ? (DB::table('transaksi')
                    ->whereDate('tgl_transaksi', $date->toDateString())
                    ->where('status_pembayaran', 'Lunas')
                    ->sum(DB::raw('COALESCE(total_biaya, 0)')) ?? 0)
                : 0;

            if ($total > $maxOmset) {
                $maxOmset = $total;
            }

            $dayKey = $date->format('D');
            $grafik[] = [
                'hari' => $namaHariMap[$dayKey] ?? strtoupper($dayKey),
                'total' => $total,
                'total_format' => 'Rp ' . number_format($total, 0, ',', '.'),
            ];
        }

        foreach ($grafik as &$g) {
            $g['tinggi_persen'] = $maxOmset > 0 ? max(10, round(($g['total'] / $maxOmset) * 100)) : 10;
        }

        $viewName = view()->exists('dashboard-admin')
            ? 'dashboard-admin'
            : (view()->exists('admin.dashboard') ? 'admin.dashboard' : 'dashboard-admin');

        return view($viewName, compact(
            'omsetHariIni', 'totalStok', 'stokMenipis', 'barangHampirHabis', 'pelanggan', 'grafik'
        ));
    }

    /**
     * Menampilkan halaman kasir POS
     */
    public function indexKasir()
    {
        $bookings = Schema::hasTable('bookings')
                    ? DB::table('bookings')->orderBy('created_at', 'desc')->get()
                    : collect();

        $stocks = collect();
        if (Schema::hasTable('sparepart')) {
            $stocks = DB::table('sparepart')->get();
        } elseif (Schema::hasTable('spareparts')) {
            $stocks = DB::table('spareparts')->get();
        }

        if (view()->exists('kasir')) {
            return view('kasir', compact('bookings', 'stocks'));
        } elseif (view()->exists('kasir.index')) {
            return view('kasir.index', compact('bookings', 'stocks'));
        }

        return view('admin.kasir', compact('bookings', 'stocks'));
    }

    /**
     * Menampilkan workstation mekanik
     */
    public function indexMekanik()
    {
        $bookings = Schema::hasTable('bookings')
                    ? DB::table('bookings')->whereIn('status', ['Menunggu', 'Dikerjakan'])->get()
                    : collect();

        return view('mekanik.workstation', compact('bookings'));
    }

    /**
     * Update progres oleh mekanik
     */
    public function updateProgres(Request $request, $id)
{
    $validated = $request->validate([
        'status' => 'required|in:Menunggu,Dikerjakan,Selesai',
        'catatan_mekanik' => 'nullable|string|max:1000',
        'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
    ]);

    $booking = DB::table('bookings')
    ->where('id', $id)
    ->first();

    if (!$booking) {
        abort(404, 'Booking tidak ditemukan.');
    }

    $data = [
        'status' => $validated['status'],
        'catatan_mekanik' => $validated['catatan_mekanik'] ?? null,
        'updated_at' => now(),
    ];

    if ($request->hasFile('lampiran')) {
        $data['lampiran'] = $request->file('lampiran')
            ->store('lampiran-mekanik', 'local');
    }

    DB::table('bookings')
        ->where('id', $booking->id)
        ->update($data);

    return redirect()->back()
        ->with('success', 'Progres servis berhasil diperbarui!');
}

    /**
     * Menampilkan portal pelanggan
     */
    public function indexPortal()
    {
        $bookings = Schema::hasTable('bookings') ? DB::table('bookings')->get() : collect();
        return view('pelanggan.portal', compact('bookings'));
    }

    /**
     * Halaman form booking servis
     */
    public function create()
    {
        return view('pelanggan.booking');
    }

    /**
     * Simpan data booking/antrean baru (termasuk walk-in kasir)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nopol' => 'required|string',
            'nama_pelanggan' => 'required|string',
            'kendaraan' => 'required|string',
            'jenis_layanan' => 'required|string',
        ]);

        DB::table('bookings')->insert([
            'no_booking' => 'BC-' . strtoupper(Str::random(8)),
            'nopol' => $request->nopol,
            'nama_pelanggan' => $request->nama_pelanggan,
            'kendaraan' => $request->kendaraan,
            'jenis_layanan' => $request->jenis_layanan,
            'tanggal_kedatangan' => $request->tanggal_kedatangan ?? date('Y-m-d'),
            'sesi_waktu' => $request->sesi_waktu ?? 'Langsung',
            'status' => 'Menunggu',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Kendaraan berhasil dimasukkan ke antrean!');
    }

    /**
     * 📊 LAPORAN KEUANGAN DAN PENDAPATAN (Bisa Filter Tanggal)
     */
    public function laporanPendapatan(Request $request)
    {
        $tglMulai = $request->input('tgl_mulai');
        $tglSelesai = $request->input('tgl_selesai');

        $totalUangHarian = Schema::hasTable('transaksi')
                            ? DB::table('transaksi')
                                ->whereDate('tgl_transaksi', Carbon::today())
                                ->where('status_pembayaran', 'Lunas')
                                ->sum(DB::raw('COALESCE(total_biaya, 0)'))
                            : 0;

        $totalOmsetBulanIni = Schema::hasTable('transaksi')
                                ? DB::table('transaksi')
                                   ->whereMonth('tgl_transaksi', Carbon::now()->month)
                                   ->whereYear('tgl_transaksi', Carbon::now()->year)
                                   ->where('status_pembayaran', 'Lunas')
                                   ->sum(DB::raw('COALESCE(total_biaya, 0)'))
                                : 0;

        $totalSemuaOmset = Schema::hasTable('transaksi')
                            ? DB::table('transaksi')
                                ->where('status_pembayaran', 'Lunas')
                                ->sum(DB::raw('COALESCE(total_biaya, 0)'))
                            : 0;

        $query = Schema::hasTable('transaksi')
                    ? DB::table('transaksi')
                        ->leftJoin('bookings', 'transaksi.id_servis', '=', 'bookings.id')
                        ->select(
                            'transaksi.*',
                            'bookings.nopol',
                            'bookings.nama_pelanggan',
                            'bookings.kendaraan',
                            'bookings.jenis_layanan'
                        )
                        ->where('transaksi.status_pembayaran', 'Lunas')
                    : null;

        if ($query && $tglMulai && $tglSelesai) {
            $query->whereBetween(DB::raw('DATE(transaksi.tgl_transaksi)'), [$tglMulai, $tglSelesai]);
        }

        $transaksiSelesai = $query ? $query->orderBy('transaksi.tgl_transaksi', 'desc')->get() : collect();

        // Hitung total khusus hasil filter
        $totalHasilFilter = $transaksiSelesai->sum('total_biaya');

        if (view()->exists('keuangan')) {
            return view('keuangan', compact('totalUangHarian', 'totalOmsetBulanIni', 'totalSemuaOmset', 'transaksiSelesai', 'tglMulai', 'tglSelesai', 'totalHasilFilter'));
        }

        return view('admin.keuangan', compact('totalUangHarian', 'totalOmsetBulanIni', 'totalSemuaOmset', 'transaksiSelesai', 'tglMulai', 'tglSelesai', 'totalHasilFilter'));
    }
}
