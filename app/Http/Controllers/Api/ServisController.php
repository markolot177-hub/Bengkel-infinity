<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servis;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    // Menampilkan semua data servis
    public function index()
    {
        return response()->json([
            'message' => 'Data servis berhasil diambil',
            'data' => Servis::all(),
        ], 200);
    }

    // Menambahkan servis dengan pengecekan bentrok
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kendaraan' => 'required|integer|exists:kendaraan,id_kendaraan',
            'id_mekanik' => 'required|integer|exists:pengelola,id_pengelola',
            'tgl_servis' => 'required|date',
            'keluhan' => 'nullable|string',
            'jenis_servis' => 'required|string|max:100',
            'status' => 'sometimes|required|in:Menunggu,Diproses,Selesai,Dibatalkan',
            'total_biaya' => 'sometimes|required|numeric|min:0',
        ]);

        $bentrok = Servis::where('id_kendaraan', $validated['id_kendaraan'])
            ->where('tgl_servis', $validated['tgl_servis'])
            ->whereIn('status', ['Menunggu', 'Diproses'])
            ->exists();

        if ($bentrok) {
            return response()->json([
                'message' => 'Kendaraan masih memiliki servis yang belum selesai pada tanggal tersebut',
            ], 422);
        }

        $servis = Servis::create($validated);

        return response()->json([
            'message' => 'Data servis berhasil dibuat',
            'data' => $servis,
        ], 201);
    }

    // Mengubah data servis dengan pengecekan anti-IDOR
    public function update(Request $request, $id)
    {
        $servis = Servis::find($id);

        if (!$servis) {
            return response()->json([
                'message' => 'Data servis tidak ditemukan',
            ], 404);
        }

        // Mekanik hanya boleh mengubah servis yang ditugaskan kepadanya
        if (
            session('role') === 'mekanik' &&
            (
                !session()->has('id_pengelola') ||
                (int) session('id_pengelola') !== (int) $servis->id_mekanik
            )
        ) {
            return response()->json([
                'message' => 'Kamu tidak memiliki akses ke servis ini.',
            ], 403);
        }

        $validated = $request->validate([
            'status' => 'sometimes|required|in:Menunggu,Diproses,Selesai,Dibatalkan',
            'total_biaya' => 'sometimes|required|numeric|min:0',
            'keluhan' => 'sometimes|nullable|string',
            'jenis_servis' => 'sometimes|required|string|max:100',
            'tgl_servis' => 'sometimes|required|date',
            'id_mekanik' => 'sometimes|required|integer|exists:pengelola,id_pengelola',
        ]);

        // Mekanik tidak boleh memindahkan servis ke mekanik lain
        if (
            session('role') === 'mekanik' &&
            isset($validated['id_mekanik']) &&
            (int) $validated['id_mekanik'] !== (int) session('id_pengelola')
        ) {
            return response()->json([
                'message' => 'Mekanik tidak boleh mengubah penugasan servis.',
            ], 403);
        }

        $servis->update($validated);

        return response()->json([
            'message' => 'Data servis berhasil diperbarui',
            'data' => $servis->fresh(),
        ], 200);
    }

    // Menghapus data servis (akses admin diatur melalui middleware route)
    public function destroy($id)
    {
        $servis = Servis::find($id);

        if (!$servis) {
            return response()->json([
                'message' => 'Data servis tidak ditemukan',
            ], 404);
        }

        $servis->delete();

        return response()->json([
            'message' => 'Data servis berhasil dihapus',
        ], 200);
    }
}
