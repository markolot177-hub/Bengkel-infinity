<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\JsonResponse;

class PelangganController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'Data pelanggan berhasil diambil',
            'data' => Pelanggan::query()
                ->select([
                    'id_pelanggan',
                    'nama',
                    'no_hp',
                    'alamat',
                    'username',
                ])
                ->get(),
        ], 200);
    }
}
