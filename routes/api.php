<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransaksiController;

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'store']);
