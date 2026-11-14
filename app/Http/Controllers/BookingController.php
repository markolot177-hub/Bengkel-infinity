<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * DASHBOARD UTAMA ADMIN
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

        // 2. Data Sparepart
        $namaTabelStok = Schema::hasTable('spareparts')
            ? 'spareparts'
            : (Schema::hasTable('sparepart') ? 'sparepart' : null);

        $totalStok = 0;
        $stokMenipis = 0;
        $barangHampirHabis = collect();

        if ($namaTabelStok) {
            $totalStok = DB::table($namaTabelStok)->sum('jumlah_stok') ?? 0;
            $stokMenipis = DB::table($namaTabelStok)
                ->where('jumlah_stok', '<=', 5)
                ->count();

            $barangHampirHabis = DB::table($namaTabelStok)
                ->where('jumlah_stok', '<=', 5)
                ->get();
        }

        // 3. Daftar Pelanggan
        $pelanggan = Schema::hasTable('pelanggan')
            ? DB::table('pelanggan')->get()
            : collect();

        // 4. Grafik Pendapatan 7 Hari Terakhir
        $namaHariMap = [
            'Mon' => 'SEN',
            'Tue' => 'SEL',
            'Wed' => 'RAB',
            'Thu' => 'KAM',
            'Fri' => 'JUM',
            'Sat' => 'SAB',
            'Sun' => 'MIN',
        ];

        $tanggalAkhir = Carbon::today();
        $tanggalAwal = $tanggalAkhir->copy()->subDays(6);

        $omsetPerHari = collect();

        if (Schema::hasTable('transaksi')) {
            $omsetPerHari = DB::table('transaksi')
                ->selectRaw('DATE(tgl_transaksi) as tanggal, SUM(COALESCE(total_biaya, 0)) as total')
                ->whereBetween('tgl_transaksi', [
                    $tanggalAwal->copy()->startOfDay(),
                    $tanggalAkhir->copy()->endOfDay(),
                ])
                ->where('status_pembayaran', 'Lunas')
                ->groupBy(DB::raw('DATE(tgl_transaksi)'))
                ->get()
                ->keyBy('tanggal');
        }

        $grafik = [];
        $maxOmset = 1;

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $tanggal = $date->toDateString();

            $total = (float) ($omsetPerHari->get($tanggal)->total ?? 0);

            $maxOmset = max($maxOmset, $total);

            $dayKey = $date->format('D');

            $grafik[] = [
                'hari' => $namaHariMap[$dayKey] ?? strtoupper($dayKey),
                'total' => $total,
                'total_format' => 'Rp ' . number_format($total, 0, ',', '.'),
            ];
        }

        foreach ($grafik as &$g) {
            $g['tinggi_persen'] = max(
                10,
                round(($g['total'] / $maxOmset) * 100)
            );
        }

        unset($g);

        return view('admin.dashboard', compact(
            'omsetHariIni',
            'totalStok',
            'stokMenipis',
            'barangHampirHabis',
            'pelanggan',
            'grafik'
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

        return view('admin.kasir', compact('bookings', 'stocks'));
    }

    /**
     * Menampilkan workstation mekanik
     */
    public function indexMekanik()
    {
        $bookings = Schema::hasTable('bookings')
            ? DB::table('bookings')
                ->whereIn('status', ['Menunggu', 'Dikerjakan'])
                ->get()
            : collect();

        return view('mekanik.workstation', compact('bookings'));
    }

    /**
     * Update progres oleh mekanik
     */
    public function updateProgres(Request $request, string|int $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Dikerjakan,Selesai',
            'catatan_mekanik' => 'nullable|string',
            'lampiran' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $booking = DB::table('bookings')
            ->where('id', $id)
            ->first();

        if (!$booking) {
            return redirect()->back()->with('error', 'Data booking tidak ditemukan!');
        }

        $dataUpdate = [
            'status' => $request->status,
            'updated_at' => now(),
        ];

        // Simpan catatan jika diisi
        if ($request->filled('catatan_mekanik')) {
            $dataUpdate['catatan_mekanik'] = $request->catatan_mekanik;
        }

        // Simpan lampiran foto jika diunggah
        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')
                ->store('lampiran-servis', 'public');

            $dataUpdate['lampiran'] = $path;
        }

        DB::table('bookings')
            ->where('id', $id)
            ->update($dataUpdate);

        return redirect()->back()->with(
            'success',
            'Progres servis, catatan, dan lampiran berhasil diperbarui!'
        );
    }

    /**
     * Menampilkan portal pelanggan
     */
    public function indexPortal()
    {
        $namaPelanggan = session('nama')
            ?? (Auth::check() ? Auth::user()->name : null);

        $bookings = (Schema::hasTable('bookings') && $namaPelanggan)
            ? DB::table('bookings')
                ->where('nama_pelanggan', $namaPelanggan)
                ->orderBy('created_at', 'desc')
                ->get()
            : collect();

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
     * Simpan data booking/antrean baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nopol' => 'required|string',
            'kendaraan' => 'required|string',
            'jenis_layanan' => 'required|string',
        ]);

        $namaPelanggan = $request->nama_pelanggan
            ?? session('nama')
            ?? (Auth::check() ? Auth::user()->name : 'Pelanggan');

        DB::table('bookings')->insert([
            'no_booking' => 'BC-' . strtoupper(Str::random(8)),
            'nopol' => $request->nopol,
            'nama_pelanggan' => $namaPelanggan,
            'kendaraan' => $request->kendaraan,
            'jenis_layanan' => $request->jenis_layanan,
            'tanggal_kedatangan' => $request->tanggal_kedatangan ?? date('Y-m-d'),
            'sesi_waktu' => $request->sesi_waktu ?? 'Langsung',
            'status' => 'Menunggu',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with(
            'success',
            'Kendaraan berhasil dimasukkan ke antrean!'
        );
    }

    /**
     * LAPORAN KEUANGAN DAN PENDAPATAN
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
            $query->whereBetween(
                DB::raw('DATE(transaksi.tgl_transaksi)'),
                [$tglMulai, $tglSelesai]
            );
        }

        $transaksiSelesai = $query
            ? $query->orderBy('transaksi.tgl_transaksi', 'desc')->get()
            : collect();

        // Hitung total khusus hasil filter
        $totalHasilFilter = $transaksiSelesai->sum('total_biaya');

        return view('admin.keuangan', compact(
            'totalUangHarian',
            'totalOmsetBulanIni',
            'totalSemuaOmset',
            'transaksiSelesai',
            'tglMulai',
            'tglSelesai',
            'totalHasilFilter'
        ));
    }
}
