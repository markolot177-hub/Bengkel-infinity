<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
// PERUBAHAN 1: Mengubah nama controller
use App\Http\Controllers\SparepartController; 
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

    // 2. Ambil Total Sparepart (PERUBAHAN 2: Menggunakan tabel 'sparepart')
    $totalStok = DB::table('sparepart')->sum('jumlah_stok');

    // 3. Peringatan Stok Menipis (Misalnya jumlah_stok <= 5)
    $barangHampirHabis = DB::table('sparepart') // PERUBAHAN 2: Menggunakan tabel 'sparepart'
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
// PERUBAHAN 3: Menggunakan SparepartController dan name route yang sesuai dengan Blade
Route::get('/manajemen-stok', [SparepartController::class, 'index'])->name('sparepart.index');
Route::post('/manajemen-stok/store', [SparepartController::class, 'store'])->name('sparepart.store');
Route::post('/manajemen-stok/tambah/{id}', [SparepartController::class, 'tambahStok'])->name('sparepart.tambah');
Route::delete('/manajemen-stok/delete/{id}', [SparepartController::class, 'destroy'])->name('sparepart.destroy');


// Laporan Keuangan & Pendapatan
Route::get('/laporan-pendapatan', [BookingController::class, 'laporanPendapatan'])->name('keuangan.admin');
// Rute Kelola Data Pengguna & Pelanggan (Admin)
Route::get('/admin/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
Route::post('/admin/pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna.store');
Route::delete('/admin/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.destroy');

// Rute Khusus Pendaftaran Member Pelanggan oleh Admin
Route::post('/admin/pelanggan/store', [PenggunaController::class, 'storePelanggan'])->name('admin.pelanggan.store');
Route::delete('/admin/pelanggan/{id}', [PenggunaController::class, 'destroyPelanggan'])->name('admin.pelanggan.destroy');