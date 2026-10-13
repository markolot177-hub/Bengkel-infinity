<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

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
