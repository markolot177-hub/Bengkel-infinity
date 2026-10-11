<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransaksiRequest;
use App\Models\Transaksi;
use App\Models\Servis;
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

    // Membuat transaksi dengan validasi FormRequest
    public function store(StoreTransaksiRequest $request)
    {
        $validated = $request->validated();

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
