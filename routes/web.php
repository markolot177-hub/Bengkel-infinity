<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StockController;

/*
|--------------------------------------------------------------------------
| Web Routes - BengkelCare
|--------------------------------------------------------------------------
*/

// Halaman Login & Proses Autentikasi (Menggunakan match GET & POST agar bebas 419)
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::match(['get', 'post'], '/login-proses', [AuthController::class, 'login'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Dashboard Admin
Route::get('/dashboard-admin', function () {
    return view('admin.dashboard');
})->name('dashboard.admin');


// Point of Sale (POS) & Kasir
Route::get('/kasir', [BookingController::class, 'indexKasir'])->name('kasir.index');
Route::post('/kasir/bayar/{id}', [BookingController::class, 'prosesPembayaran'])->name('kasir.bayar');


// Workstation Mekanik
Route::get('/workstation-mekanik', [BookingController::class, 'indexMekanik'])->name('mekanik.workstation');
Route::post('/workstation-mekanik/update/{id}', [BookingController::class, 'updateProgres'])->name('mekanik.update');


// Portal Pelanggan & Booking
Route::get('/portal-pelanggan', [BookingController::class, 'indexPortal'])->name('portal');
Route::get('/booking-servis', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking-servis', [BookingController::class, 'store'])->name('booking.store');

Route::get('/garasi-saya', function () {
    return view('pelanggan.garasi');
})->name('garasi.saya');


// Manajemen Stok / Suku Cadang
Route::get('/manajemen-stok', [StockController::class, 'index'])->name('stok.index');
Route::post('/manajemen-stok/store', [StockController::class, 'store'])->name('stok.store');
Route::post('/manajemen-stok/tambah/{id}', [StockController::class, 'tambahStok'])->name('stok.tambah');
Route::delete('/manajemen-stok/delete/{id}', [StockController::class, 'destroy'])->name('stok.destroy');


// Laporan Keuangan & Pendapatan
Route::get('/laporan-pendapatan', [BookingController::class, 'laporanPendapatan'])->name('keuangan.admin');
