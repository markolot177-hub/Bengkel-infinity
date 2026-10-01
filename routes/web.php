<?php

use Illuminate\Support\Facades\Route;

// Rute untuk halaman Login (welcome.blade.php)
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman Dashboard Admin (admin/dashboard.blade.php)
Route::get('/dashboard-admin', function () {
    return view('admin.dashboard'); 
})->name('dashboard.admin');
Route::get('/kasir', function () {
    return view('admin.kasir'); // Memanggil file resources/views/admin/kasir.blade.php
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