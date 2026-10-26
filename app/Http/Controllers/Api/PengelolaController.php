<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengelola;

class PengelolaController extends Controller
{
    public function index()
    {
        $data = Pengelola::query()
            ->select([
                'id_pengelola',
                'nama',
                'no_hp',
                'username',
                'role',
            ])
            ->get();

        return response()->json([
            'message' => 'Data pengelola berhasil diambil',
            'data' => $data,
        ], 200);
    }
}
