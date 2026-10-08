<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Data transaksi berhasil diambil',
            'data' => Transaksi::all(),
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis' => 'required|integer|exists:servis,id_servis',
            'id_pengelola' => 'required|integer|exists:pengelola,id_pengelola',
            'tgl_transaksi' => 'required|date',
            'total_biaya' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'metode_pembayaran' => 'required|in:Tunai,Transfer,QRIS',
            'jumlah_bayar' => 'required|numeric|min:0',
            'kembalian' => 'nullable|numeric|min:0',
            'tgl_pembayaran' => 'nullable|date',
            'status_pembayaran' => 'required|in:Belum Lunas,Lunas',
        ]);

        $transaksi = Transaksi::create($validated);

        return response()->json([
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaksi,
        ], 201);
    }
}
