<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KasirController;

/*
|--------------------------------------------------------------------------
| Login, Registrasi, dan Logout
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'showLogin'])->name('login');

Route::match(['get', 'post'], '/login-proses', [AuthController::class, 'login'])
    ->name('login.proses');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register-proses', [AuthController::class, 'register'])
    ->name('register.proses');

Route::get('/logout', [AuthController::class, 'logout'])
    ->middleware('checklogin')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Route yang Membutuhkan Login
|--------------------------------------------------------------------------
*/

Route::middleware('checklogin')->group(function () {

    /*
    | Dashboard Admin
    | Data (omset, grafik, stok, pelanggan) dihitung di BookingController
    */

    Route::get('/dashboard-admin', [BookingController::class, 'indexDashboardAdmin'])
        ->middleware('role:admin')
        ->name('dashboard.admin');

    /*
    | Pengelolaan Pengguna dan Pelanggan
    | Khusus Admin
    */

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/pengguna', [PenggunaController::class, 'index'])
            ->name('admin.pengguna.index');

        Route::post('/admin/pengguna', [PenggunaController::class, 'store'])
            ->name('admin.pengguna.store');

        Route::delete('/admin/pengguna/{id}', [PenggunaController::class, 'destroy'])
            ->whereNumber('id')
            ->name('admin.pengguna.destroy');

        Route::post('/admin/pelanggan/store', [PenggunaController::class, 'storePelanggan'])
            ->name('admin.pelanggan.store');

        Route::delete('/admin/pelanggan/{id}', [PenggunaController::class, 'destroyPelanggan'])
            ->whereNumber('id')
            ->name('admin.pelanggan.destroy');
    });

    /*
    | Laporan Keuangan dan Manajemen Sparepart
    | Bisa diakses Admin dan Kasir
    */

    Route::middleware('role:admin,kasir')->group(function () {
        Route::get('/laporan-pendapatan', [BookingController::class, 'laporanPendapatan'])
            ->name('keuangan.admin');

        Route::get('/manajemen-stok', [SparepartController::class, 'index'])
            ->name('sparepart.index');

        Route::post('/manajemen-stok/store', [SparepartController::class, 'store'])
            ->name('sparepart.store');

        Route::post('/manajemen-stok/tambah/{id}', [SparepartController::class, 'tambahStok'])
            ->whereNumber('id')
            ->name('sparepart.tambah');
    });

    /*
    | Hapus Sparepart
    | Khusus Admin
    */

    Route::middleware('role:admin')->group(function () {
        Route::delete('/manajemen-stok/delete/{id}', [SparepartController::class, 'destroy'])
            ->whereNumber('id')
            ->name('sparepart.destroy');
    });

    /*
    | Kasir
    */

    Route::middleware('role:kasir')->group(function () {
        Route::get('/kasir', [BookingController::class, 'indexKasir'])
            ->name('kasir.index');

        Route::post('/kasir/bayar/{id}', [KasirController::class, 'bayar'])
            ->whereNumber('id')
            ->name('kasir.bayar');
    });

    /*
    | Mekanik
    */

    Route::middleware('role:mekanik')->group(function () {
        Route::get('/workstation-mekanik', [BookingController::class, 'indexMekanik'])
            ->name('mekanik.workstation');

        Route::post('/workstation-mekanik/update/{id}', [BookingController::class, 'updateProgres'])
            ->whereNumber('id')
            ->name('mekanik.update');
    });

    /*
    | Portal Pelanggan
    */

    Route::middleware('role:pelanggan')->group(function () {
        Route::get('/portal-pelanggan', [BookingController::class, 'indexPortal'])
            ->name('portal');

        Route::get('/booking-servis', [BookingController::class, 'create'])
            ->name('booking.create');

        Route::get('/garasi-saya', function () {
            return view('pelanggan.garasi');
        })->name('garasi.saya');
    });

    /*
    | Booking oleh Pelanggan dan Kasir
    */

    Route::post('/booking-servis', [BookingController::class, 'store'])
        ->middleware('role:pelanggan,kasir')
        ->name('booking.store');

});
