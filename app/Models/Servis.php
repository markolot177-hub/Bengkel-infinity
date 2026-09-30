<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Servis extends Model
{
    protected $table = 'servis';
    protected $primaryKey = 'id_servis';
    public $timestamps = false;

    protected $fillable = ['id_kendaraan', 'jenis_servis', 'status'];

    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id_kendaraan');
    }

    public function transaksi(): HasOne
    {
        return $this->hasOne(Transaksi::class, 'id_servis', 'id_servis');
    }
}
