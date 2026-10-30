<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransaksiRequest;
use App\Models\Transaksi;
use App\Models\Servis;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TransaksiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Data transaksi berhasil diambil',
            'data' => Transaksi::all(),
        ], 200);
    }

    public function store(StoreTransaksiRequest $request)
    {
        $idPengelola = session('id_pengelola');

        if (
            !session('logged_in') ||
            session('role') !== 'kasir' ||
            !$idPengelola
        ) {
            return response()->json([
                'message' => 'Hanya kasir yang dapat membuat transaksi.',
            ], 403);
        }

        $validated = $request->validated();

        try {
            $transaksi = DB::transaction(function () use (
                $validated,
                $idPengelola
            ) {
                $servis = Servis::where(
                    'id_servis',
                    $validated['id_servis']
                )->lockForUpdate()->first();

                if (!$servis) {
                    abort(404, 'Data servis tidak ditemukan.');
                }

                $transaksi = Transaksi::where(
                    'id_servis',
                    $servis->id_servis
                )->lockForUpdate()->first();

                if (
                    $transaksi &&
                    $transaksi->status_pembayaran === 'Lunas'
                ) {
                    abort(
                        422,
                        'Transaksi sudah lunas dan tidak dapat dibayar kembali.'
                    );
                }

                if ($servis->status === 'Selesai') {
                    abort(
                        422,
                        'Servis sudah selesai dan tidak dapat dibayar kembali.'
                    );
                }

                $totalBiaya = (float) $servis->total_biaya;
                $jumlahBayar = (float) $validated['jumlah_bayar'];
                $statusPembayaran = $validated['status_pembayaran'];

                if (
                    $statusPembayaran === 'Lunas' &&
                    $jumlahBayar < $totalBiaya
                ) {
                    abort(
                        422,
                        'Pembayaran belum mencukupi total biaya.'
                    );
                }

                $kembalian = $statusPembayaran === 'Lunas'
                    ? max(0, $jumlahBayar - $totalBiaya)
                    : 0;

                $dataTransaksi = [
                    'id_servis' => $servis->id_servis,
                    'id_pengelola' => $idPengelola,
                    'tgl_transaksi' => $validated['tgl_transaksi'],
                    'total_biaya' => $totalBiaya,
                    'keterangan' => $validated['keterangan'] ?? null,
                    'metode_pembayaran' => $validated['metode_pembayaran'],
                    'jumlah_bayar' => $jumlahBayar,
                    'kembalian' => $kembalian,
                    'tgl_pembayaran' => $validated['tgl_pembayaran'] ?? null,
                    'status_pembayaran' => $statusPembayaran,
                ];

                if ($transaksi) {
                    $transaksi->update($dataTransaksi);
                } else {
                    $transaksi = Transaksi::create($dataTransaksi);
                }

                if ($statusPembayaran === 'Lunas') {
                    $servis->update(['status' => 'Selesai']);
                }

                return $transaksi->fresh();
            });

            return response()->json([
                'message' => 'Transaksi berhasil disimpan.',
                'data' => $transaksi,
            ], 201);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return response()->json([
                    'message' => 'Transaksi untuk servis ini sudah ada. Silakan coba lagi.',
                ], 422);
            }

            throw $e;
        } catch (HttpException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], $e->getStatusCode());
        }
    }
}
