<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\Booking;
use App\Models\Sparepart;
use App\Models\Pelanggan;

class BookingController extends Controller
{
    public function indexPortal()
    {
        if (session('role') !== 'pelanggan' || !session('id_pelanggan')) {
            abort(403);
        }

        $bookings = Booking::where(
            'id_pelanggan',
            session('id_pelanggan')
        )->latest()->get();

        return view('pelanggan.portal', compact('bookings'));
    }

    public function create()
    {
        if (session('role') !== 'pelanggan' || !session('id_pelanggan')) {
            abort(403);
        }

        return view('pelanggan.booking');
    }

    public function store(Request $request)
    {
        if (session('role') !== 'pelanggan' || !session('id_pelanggan')) {
            abort(403);
        }

        $pelanggan = Pelanggan::findOrFail(session('id_pelanggan'));

        $validated = $request->validate([
            'nopol' => 'required|string|max:20',
            'kendaraan' => 'required|string|max:100',
            'jenis_layanan' => 'required|string|max:100',
            'tanggal_kedatangan' => 'nullable|date',
            'sesi_waktu' => 'required|string|max:50',
            'keluhan' => 'nullable|string',
        ]);

        Booking::create([
            'id_pelanggan' => $pelanggan->id_pelanggan,
            'no_booking' => 'BC-' . Str::upper(Str::random(10)),
            'nopol' => $validated['nopol'],
            'nama_pelanggan' => $pelanggan->nama,
            'kendaraan' => $validated['kendaraan'],
            'jenis_layanan' => $validated['jenis_layanan'],
            'tanggal_kedatangan' => $validated['tanggal_kedatangan'] ?? date('Y-m-d'),
            'sesi_waktu' => $validated['sesi_waktu'],
            'keluhan' => $validated['keluhan'] ?? '-',
            'status' => 'Menunggu',
        ]);

        return back()->with(
            'success',
            'Data servis berhasil ditambahkan ke antrean!'
        );
    }

    public function indexMekanik()
    {
        if (session('role') !== 'mekanik') {
            abort(403, 'Akses hanya untuk mekanik.');
        }

        $bookings = Booking::whereIn(
            'status',
            ['Menunggu', 'Dikerjakan']
        )->latest()->get();

        return view('mekanik.workstation', compact('bookings'));
    }

    public function updateProgres(Request $request, $id)
    {
        if (session('role') !== 'mekanik') {
            abort(403, 'Akses hanya untuk mekanik.');
        }

        $validated = $request->validate([
            'status' => 'required|in:Menunggu,Dikerjakan,Selesai',
            'catatan_mekanik' => 'nullable|string',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $booking = Booking::findOrFail($id);

        $booking->status = $validated['status'];
        $booking->catatan_mekanik = $validated['catatan_mekanik'] ?? null;

        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')
                ->store('lampiran-mekanik', 'public');

            $booking->lampiran = $path;
        }

        $booking->save();

        return back()->with(
            'success',
            'Progres pengerjaan berhasil diperbarui!'
        );
    }

    public function indexKasir()
    {
        if (session('role') !== 'kasir') {
            abort(403, 'Akses hanya untuk kasir.');
        }

        $bookings = Booking::latest()->get();

        // Nama variabel $stocks dipertahankan agar kompatibel
        // dengan view kasir yang sudah ada.
        $stocks = Sparepart::all();

        return view('admin.kasir', compact('bookings', 'stocks'));
    }

    public function prosesPembayaran(Request $request, $id)
    {
        if (session('role') !== 'kasir') {
            abort(403, 'Akses hanya untuk kasir.');
        }

        $validated = $request->validate([
            'biaya_jasa' => 'nullable|numeric|min:0',
            'metode_pembayaran' => 'nullable|in:Tunai,Transfer,QRIS',
            'barang_id' => 'nullable|array',
            'barang_id.*' => 'integer|distinct|exists:sparepart,id',
            'qty' => 'nullable|array',
            'qty.*' => 'nullable|integer|min:1',
        ]);

        $totalBiaya = DB::transaction(function () use ($validated, $id) {
            $booking = Booking::findOrFail($id);
            $biayaJasa = (float) ($validated['biaya_jasa'] ?? 0);
            $totalPart = 0;

            foreach ($validated['barang_id'] ?? [] as $index => $barangId) {
                $qty = (int) ($validated['qty'][$index] ?? 1);

                $sparepart = Sparepart::whereKey($barangId)
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($sparepart->jumlah_stok < $qty) {
                    throw ValidationException::withMessages([
                        'barang_id' =>
                            'Stok ' . $sparepart->nama_barang .
                            ' tidak mencukupi.',
                    ]);
                }

                $totalPart += $sparepart->harga_jual * $qty;
                $sparepart->jumlah_stok -= $qty;
                $sparepart->save();
            }

            $booking->total_biaya = $biayaJasa + $totalPart;
            $booking->metode_pembayaran =
                $validated['metode_pembayaran'] ?? 'Tunai';
            $booking->status = 'Selesai';
            $booking->save();

            return $booking->total_biaya;
        });

        return back()->with(
            'success',
            'Pembayaran berhasil diproses! Total: Rp ' .
            number_format($totalBiaya, 0, ',', '.')
        );
    }

    public function laporanPendapatan()
    {
        if (session('role') !== 'admin') {
            abort(403, 'Akses hanya untuk admin.');
        }

        $transaksiSelesai = Booking::where(
            'status',
            'Selesai'
        )->latest()->get();

        $totalUangHarian = $transaksiSelesai
            ->where('updated_at', '>=', now()->startOfDay())
            ->sum('total_biaya');

        $totalOmsetBulanIni = $transaksiSelesai
            ->where('updated_at', '>=', now()->startOfMonth())
            ->sum('total_biaya');

        $totalSemuaOmset = $transaksiSelesai->sum('total_biaya');

        return view('admin.keuangan', compact(
            'transaksiSelesai',
            'totalUangHarian',
            'totalOmsetBulanIni',
            'totalSemuaOmset'
        ));
    }
}
