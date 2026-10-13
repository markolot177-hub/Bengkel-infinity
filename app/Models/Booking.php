<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_booking',
        'nopol',
        'nama_pelanggan',
        'kendaraan',
        'jenis_layanan',
        'tanggal_kedatangan',
        'sesi_waktu',
        'keluhan',
        'status',
    ];
}
