<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;

    protected $fillable = [
        'id_servis', 'id_pengelola', 'tgl_transaksi', 'total_biaya',
        'keterangan', 'metode_pembayaran', 'jumlah_bayar', 'kembalian',
        'tgl_pembayaran', 'status_pembayaran'
    ];

    public function servis(): BelongsTo
    {
        return $this->belongsTo(Servis::class, 'id_servis', 'id_servis');
    }

    public function pengelola(): BelongsTo
    {
        return $this->belongsTo(Pengelola::class, 'id_pengelola', 'id_pengelola');
    }

    public function detailTransaksi(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id_transaksi');
    }
}
