<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    // WAJIB DITAMBAHKAN AGAR TIDAK ERROR "TABLE NOT FOUND"
    protected $table = 'sparepart';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'rak',
        'harga_beli',
        'harga_jual',
        'jumlah_stok',
        'minimum_stok',
    ];
}