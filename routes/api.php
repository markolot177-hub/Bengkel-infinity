<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\KendaraanController;
use App\Http\Controllers\Api\ServisController;
use App\Http\Controllers\Api\PengelolaController;
use App\Http\Controllers\Api\DetailTransaksiController;

Route::get('/transaksi',
[TransaksiController::class, 'index']);
Route::post('/transaksi',
[TransaksiController::class, 'store']);
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/kendaraan', [KendaraanController::class, 'index']);
Route::get('/servis', [ServisController::class, 'index']);
Route::post('/servis', [ServisController::class, 'store']);
Route::put('/servis/{id}', [ServisController::class, 'update']);
Route::delete('/servis/{id}', [ServisController::class, 'destroy']);
Route::get('/pengelola', [PengelolaController::class, 'index']);
Route::get('/detail-transaksi', [DetailTransaksiController::class, 'index']);
