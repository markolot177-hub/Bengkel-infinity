<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servis;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function index()
    {
        return response()->json(Servis::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kendaraan' => 'required|integer|exists:kendaraan,id_kendaraan',
            'id_mekanik' => 'required|integer|exists:pengelola,id_pengelola',
            'tgl_servis' => 'required|date',
            'keluhan' => 'nullable|string',
            'jenis_servis' => 'required|string|max:100',
            'status' => 'required|in:Menunggu,Diproses,Selesai,Dibatalkan',
            'total_biaya' => 'required|numeric|min:0',
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
}
