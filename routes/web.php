<?php

use Illuminate\Support\Facades\Route;

// 1. Halaman Login
Route::get('/', function () {
    return view('welcome');
})->name('login');

// 2. Mesin Proses Login (BYPASS EKSTREM GET)
Route::get('/custom-login', function () {
    return redirect()->route('dashboard.admin');
})->name('custom.login');

// 3. Rute Halaman-halaman Dashboard
Route::get('/dashboard-admin', function () {
    return view('admin.dashboard');
})->name('dashboard.admin');

Route::get('/kasir', function () {
    return view('admin.kasir');
})->name('kasir');

Route::get('/portal-pelanggan', function () {
    return view('pelanggan.portal');
})->name('portal');

Route::get('/workstation-mekanik', function () {
    return view('mekanik.workstation');
})->name('mekanik.workstation');

Route::get('/manajemen-stok', function () {
    return view('admin.stok');
})->name('stok.admin');

Route::get('/laporan-pendapatan', function () {
    return view('admin.keuangan');
})->name('keuangan.admin');