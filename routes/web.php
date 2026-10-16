<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PenggunaController;

/*
|--------------------------------------------------------------------------
| Web Routes - BengkelCare
|--------------------------------------------------------------------------
*/

// Halaman Login & Proses Autentikasi
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::match(['get', 'post'], '/login-proses', [AuthController::class, 'login'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Dashboard Admin (Mengambil data dinamis dari Database)
Route::get('/dashboard-admin', function () {

    // 1. Ambil Omset Hari Ini (Menggunakan kolom tgl_servis & total_biaya)
    $omsetHariIni = DB::table('servis')
        ->whereDate('tgl_servis', Carbon::today())
        ->sum('total_biaya');

    // 2. Ambil Total Sparepart (Menggunakan tabel 'stocks' dan kolom 'jumlah_stok')
    $totalStok = DB::table('stocks')->sum('jumlah_stok');

    // 3. Peringatan Stok Menipis (Misalnya jumlah_stok <= 5)
    $barangHampirHabis = DB::table('stocks')
        ->where('jumlah_stok', '<=', 5)
        ->get();

    $stokMenipis = $barangHampirHabis->count();

    // 4. Data Grafik Penjualan (7 Hari Terakhir)
    $grafik = [];
    for ($i = 6; $i >= 0; $i--) {
        $tanggal = Carbon::today()->subDays($i);

        $totalHarian = DB::table('servis')
            ->whereDate('tgl_servis', $tanggal)
            ->sum('total_biaya');

        $grafik[] = [
            'hari' => $tanggal->locale('id')->translatedFormat('D'),
            'total_format' => $totalHarian > 1000000 ? round($totalHarian / 1000000, 1) . 'M' : ($totalHarian > 1000 ? round($totalHarian / 1000, 1) . 'K' : 0),
            'tinggi_persen' => $totalHarian > 0 ? min(($totalHarian / 5000000) * 100, 100) : 0
        ];
    }

    return view('admin.dashboard', compact('omsetHariIni', 'totalStok', 'stokMenipis', 'barangHampirHabis', 'grafik'));

})->name('dashboard.admin');


// Rute Kelola Data Pengguna (Admin)
Route::get('/admin/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
Route::post('/admin/pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna.store');
Route::delete('/admin/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.destroy');


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
