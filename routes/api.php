<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\KendaraanController;
use App\Http\Controllers\Api\ServisController;
use App\Http\Controllers\Api\PengelolaController;
use App\Http\Controllers\Api\DetailTransaksiController;

// Data yang hanya boleh diakses admin
Route::middleware(['checklogin', 'role:admin'])->group(function () {
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pengelola', [PengelolaController::class, 'index']);
});

// Data servis: admin dan mekanik
Route::middleware(['checklogin', 'role:admin,mekanik'])->group(function () {
    Route::get('/servis', [ServisController::class, 'index']);
    Route::post('/servis', [ServisController::class, 'store']);
    Route::put('/servis/{id}', [ServisController::class, 'update']);
});

// Hapus servis hanya oleh admin
Route::middleware(['checklogin', 'role:admin'])->group(function () {
    Route::delete('/servis/{id}', [ServisController::class, 'destroy']);
});

// Transaksi hanya oleh admin dan kasir
Route::middleware(['checklogin', 'role:admin,kasir'])->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::post('/transaksi', [TransaksiController::class, 'store']);
    Route::get('/detail-transaksi', [DetailTransaksiController::class, 'index']);
});

// Data kendaraan: admin dan mekanik
Route::middleware(['checklogin', 'role:admin,mekanik'])->group(function () {
    Route::get('/kendaraan', [KendaraanController::class, 'index']);
});
