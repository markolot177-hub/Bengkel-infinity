<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pelanggan',
        'no_booking',
        'nopol',
        'nama_pelanggan',
        'kendaraan',
        'jenis_layanan',
        'tanggal_kedatangan',
        'sesi_waktu',
        'keluhan',
        'status',
        'total_biaya',
        'metode_pembayaran',
        'catatan_mekanik',
        'lampiran',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(
            Pelanggan::class,
            'id_pelanggan',
            'id_pelanggan'
        );
    }
}
