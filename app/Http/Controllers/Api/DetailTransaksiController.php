<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;

class DetailTransaksiController extends Controller
{
    public function index()
    {
        return response()->json(DetailTransaksi::all());
    }
}
