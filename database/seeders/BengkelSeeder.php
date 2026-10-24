<?php

namespace Database\Seeders;

use App\Models\DetailTransaksi;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\Pengelola;
use App\Models\Servis;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class BengkelSeeder extends Seeder
{
    public function run(): void
    {
        $p1 = Pelanggan::create([
            'nama' => 'Budi Santoso', 'no_hp' => '081234567801',
            'alamat' => 'Jl. Merdeka No. 10, Bandung',
            'username' => 'budisantoso', 'password' => bcrypt('password123'),
        ]);
        $p2 = Pelanggan::create([
            'nama' => 'Siti Aminah', 'no_hp' => '081234567802',
            'alamat' => 'Jl. Sudirman No. 22, Bandung',
            'username' => 'sitiaminah', 'password' => bcrypt('password123'),
        ]);

        Pengelola::create(['nama' => 'Wahyu Nugroho', 'no_hp' => '081300000001', 'username' => 'wahyunugroho', 'password' => bcrypt('password123'), 'role' => 'admin']);
        $kasir = Pengelola::create(['nama' => 'Rina Marlina', 'no_hp' => '081300000002', 'username' => 'rinamarlina', 'password' => bcrypt('password123'), 'role' => 'kasir']);
        $mekanik = Pengelola::create(['nama' => 'Agus Prasetyo', 'no_hp' => '081300000004', 'username' => 'agusprasetyo', 'password' => bcrypt('password123'), 'role' => 'mekanik']);

        $k1 = Kendaraan::create(['id_pelanggan' => $p1->id_pelanggan, 'no_polisi' => 'D 1234 ABC', 'merk' => 'Honda', 'tipe' => 'Beat', 'tahun' => 2020, 'warna' => 'Hitam']);
        Kendaraan::create(['id_pelanggan' => $p2->id_pelanggan, 'no_polisi' => 'D 5678 DEF', 'merk' => 'Yamaha', 'tipe' => 'NMAX', 'tahun' => 2021, 'warna' => 'Merah']);

        $servis = Servis::create([
            'id_kendaraan' => $k1->id_kendaraan, 'id_mekanik' => $mekanik->id_pengelola,
            'tgl_servis' => '2026-09-01', 'keluhan' => 'Mesin kasar saat idle, minta ganti oli',
            'jenis_servis' => 'Servis Rutin', 'status' => 'Selesai', 'total_biaya' => 150000,
        ]);

        $transaksi = Transaksi::create([
            'id_servis' => $servis->id_servis, 'id_pengelola' => $kasir->id_pengelola,
            'tgl_transaksi' => '2026-09-01 14:30:00', 'total_biaya' => 150000,
            'keterangan' => 'Pembayaran servis rutin lunas',
            'metode_pembayaran' => 'Tunai', 'jumlah_bayar' => 150000, 'kembalian' => 0,
            'tgl_pembayaran' => '2026-09-01 14:31:00', 'status_pembayaran' => 'Lunas',
        ]);

        DetailTransaksi::insert([
            ['id_transaksi' => $transaksi->id_transaksi, 'nama_item' => 'Jasa Ganti Oli', 'jenis_item' => 'Jasa', 'jumlah' => 1, 'harga_satuan' => 50000],
            ['id_transaksi' => $transaksi->id_transaksi, 'nama_item' => 'Oli Mesin 1L', 'jenis_item' => 'Sparepart', 'jumlah' => 1, 'harga_satuan' => 80000],
            ['id_transaksi' => $transaksi->id_transaksi, 'nama_item' => 'Jasa Pemeriksaan Umum', 'jenis_item' => 'Jasa', 'jumlah' => 1, 'harga_satuan' => 20000],
        ]);
    }
}
