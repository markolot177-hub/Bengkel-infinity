<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\PenggunaController;

/*
|--------------------------------------------------------------------------
| Login dan Logout
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'showLogin'])->name('login');

Route::match(['get', 'post'], '/login-proses', [AuthController::class, 'login'])
    ->name('login.proses');

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
    */

    Route::get('/dashboard-admin', function () {
        $omsetHariIni = DB::table('servis')
            ->whereDate('tgl_servis', Carbon::today())
            ->sum('total_biaya');

        $totalStok = DB::table('sparepart')->sum('jumlah_stok');

        $barangHampirHabis = DB::table('sparepart')
            ->where('jumlah_stok', '<=', 5)
            ->get();

        $stokMenipis = $barangHampirHabis->count();

        $grafik = [];

        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i);

            $totalHarian = DB::table('servis')
                ->whereDate('tgl_servis', $tanggal)
                ->sum('total_biaya');

            $grafik[] = [
                'hari' => $tanggal->locale('id')->translatedFormat('D'),
                'total_format' => $totalHarian > 1000000
                    ? round($totalHarian / 1000000, 1) . 'M'
                    : ($totalHarian > 1000
                        ? round($totalHarian / 1000, 1) . 'K'
                        : 0),
                'tinggi_persen' => $totalHarian > 0
                    ? min(($totalHarian / 5000000) * 100, 100)
                    : 0,
            ];
        }

        return view('admin.dashboard', compact(
            'omsetHariIni',
            'totalStok',
            'stokMenipis',
            'barangHampirHabis',
            'grafik'
        ));
    })
        ->middleware('role:admin')
        ->name('dashboard.admin');


    /*
    | Pengelolaan Pengguna dan Pelanggan oleh Admin
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

        Route::get('/laporan-pendapatan', [BookingController::class, 'laporanPendapatan'])
            ->name('keuangan.admin');

        Route::get('/manajemen-stok', [SparepartController::class, 'index'])
            ->name('sparepart.index');

        Route::post('/manajemen-stok/store', [SparepartController::class, 'store'])
            ->name('sparepart.store');

        Route::post('/manajemen-stok/tambah/{id}', [SparepartController::class, 'tambahStok'])
            ->whereNumber('id')
            ->name('sparepart.tambah');

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

        Route::post('/kasir/bayar/{id}', [BookingController::class, 'prosesPembayaran'])
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
    | Portal dan Booking Pelanggan
    */

    Route::middleware('role:pelanggan')->group(function () {
        Route::get('/portal-pelanggan', [BookingController::class, 'indexPortal'])
            ->name('portal');

        Route::get('/booking-servis', [BookingController::class, 'create'])
            ->name('booking.create');

        Route::post('/booking-servis', [BookingController::class, 'store'])
            ->name('booking.store');

        Route::get('/garasi-saya', function () {
            return view('pelanggan.garasi');
        })->name('garasi.saya');
    });

});
