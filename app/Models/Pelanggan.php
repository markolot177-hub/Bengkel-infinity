<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Authenticatable
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    public $timestamps = false;

    protected $fillable = ['nama', 'no_hp', 'alamat', 'username', 'password'];
    protected $hidden = ['password'];

    public function kendaraan(): HasMany
    {
        return $this->hasMany(Kendaraan::class, 'id_pelanggan', 'id_pelanggan');
    }
}
