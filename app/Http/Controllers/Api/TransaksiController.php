<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return response()->json(Transaksi::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis' => 'required|integer',
            'id_pengelola' => 'required|integer',
            'tgl_transaksi' => 'required|date',
            'total_biaya' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'metode_pembayaran' => 'required|string',
            'jumlah_bayar' => 'required|numeric',
            'kembalian' => 'nullable|numeric',
            'tgl_pembayaran' => 'nullable|date',
            'status_pembayaran' => 'required|string',
        ]);

        $transaksi = Transaksi::create($validated);

        return response()->json([
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaksi,
        ], 201);
    }
}
