<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Stock;

class BookingController extends Controller
{
    public function indexPortal()
    {
        $bookings = Booking::latest()->get();
        return view('pelanggan.portal', compact('bookings'));
    }

    public function create()
    {
        return view('pelanggan.booking');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nopol' => 'required',
            'nama_pelanggan' => 'required',
            'kendaraan' => 'required',
            'jenis_layanan' => 'required',
        ]);

        Booking::create([
            'no_booking' => 'BC-' . rand(1000, 9999),
            'nopol' => $request->nopol,
            'nama_pelanggan' => $request->nama_pelanggan,
            'kendaraan' => $request->kendaraan,
            'jenis_layanan' => $request->jenis_layanan,
            'keluhan' => $request->keluhan ?? '-',
            'tanggal_kedatangan' => $request->tanggal_kedatangan ?? date('Y-m-d'),
            'status' => 'Menunggu',
        ]);

        return back()->with('success', 'Data servis berhasil ditambahkan ke antrean!');
    }

    public function indexMekanik()
    {
        $bookings = Booking::whereIn('status', ['Menunggu', 'Dikerjakan'])->latest()->get();
        return view('mekanik.workstation', compact('bookings'));
    }

    public function updateProgres(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->catatan_mekanik = $request->catatan_mekanik;

        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')->store('lampiran-mekanik', 'public');
            $booking->lampiran = $path;
        }

        $booking->save();
        return back()->with('success', 'Progres pengerjaan berhasil diperbarui!');
    }

    public function indexKasir()
    {
        $bookings = Booking::latest()->get();
        $stocks = Stock::all();
        return view('admin.kasir', compact('bookings', 'stocks'));
    }

    // Proses Pembayaran Kasir & Pengurangan Stok Otomatis
    public function prosesPembayaran(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $biayaJasa = $request->biaya_jasa ?? 0;
        $totalPart = 0;

        if ($request->has('barang_id') && is_array($request->barang_id)) {
            foreach ($request->barang_id as $index => $barangId) {
                $qty = $request->qty[$index] ?? 1;
                $stock = Stock::find($barangId);

                if ($stock) {
                    $totalPart += ($stock->harga_jual * $qty);
                    // Kurangi jumlah stok di tabel inventori
                    $stock->jumlah_stok = max(0, $stock->jumlah_stok - $qty);
                    $stock->save();
                }
            }
        }

        $totalBiaya = $biayaJasa + $totalPart;

        $booking->total_biaya = $totalBiaya;
        $booking->metode_pembayaran = $request->metode_pembayaran ?? 'Tunai';
        $booking->status = 'Selesai';
        $booking->save();

        return back()->with('success', 'Pembayaran berhasil diproses! Total: Rp ' . number_format($totalBiaya, 0, ',', '.'));
    }

    public function laporanPendapatan()
    {
        $transaksiSelesai = Booking::where('status', 'Selesai')->latest()->get();
        $totalUangHarian = $transaksiSelesai->where('updated_at', '>=', now()->startOfDay())->sum('total_biaya');
        $totalOmsetBulanIni = $transaksiSelesai->where('updated_at', '>=', now()->startOfMonth())->sum('total_biaya');
        $totalSemuaOmset = $transaksiSelesai->sum('total_biaya');

        return view('admin.keuangan', compact('transaksiSelesai', 'totalUangHarian', 'totalOmsetBulanIni', 'totalSemuaOmset'));
    }
}
