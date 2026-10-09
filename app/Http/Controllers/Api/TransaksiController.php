<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Servis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
    {
        return response()->json([
            'message' => 'Data transaksi berhasil diambil',
            'data' => Transaksi::all(),
        ], 200);
    }

    // Membuat transaksi dengan database transaction
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis' => 'required|integer|exists:servis,id_servis',
            'id_pengelola' => 'required|integer|exists:pengelola,id_pengelola',
            'tgl_transaksi' => 'required|date',
            'total_biaya' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
            'metode_pembayaran' => 'required|in:Tunai,Transfer,QRIS,Kartu Debit/Kredit',
            'jumlah_bayar' => 'required|numeric|min:0',
            'kembalian' => 'nullable|numeric|min:0',
            'tgl_pembayaran' => 'nullable|date',
            'status_pembayaran' => 'required|in:Belum Lunas,Lunas,Gagal',
        ]);

        $servis = Servis::find($validated['id_servis']);

        if (!$servis) {
            return response()->json([
                'message' => 'Data servis tidak ditemukan',
            ], 404);
        }

        // Pembayaran lunas harus mencukupi total biaya
        if (
            $validated['status_pembayaran'] === 'Lunas'
            && $validated['jumlah_bayar'] < $validated['total_biaya']
        ) {
            return response()->json([
                'message' => 'Pembayaran belum mencukupi total biaya',
            ], 422);
        }

        // Proses transaksi dan perubahan status dalam satu DB transaction
        $transaksi = DB::transaction(function () use ($validated) {
            $transaksi = Transaksi::create($validated);

            if ($validated['status_pembayaran'] === 'Lunas') {
                Servis::where('id_servis', $validated['id_servis'])
                    ->update([
                        'status' => 'Selesai',
                        'total_biaya' => $validated['total_biaya'],
                    ]);
            }

            return $transaksi;
        });

        return response()->json([
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaksi,
        ], 201);
    }
}
