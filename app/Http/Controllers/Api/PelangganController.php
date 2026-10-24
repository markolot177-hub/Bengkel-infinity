<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json(Pelanggan::all());
    }
}
