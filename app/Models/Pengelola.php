<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengelola extends Authenticatable
{
    protected $table = 'pengelola';
    protected $primaryKey = 'id_pengelola';
    public $timestamps = false;

    protected $fillable = ['nama', 'no_hp', 'username', 'password', 'role'];
    protected $hidden = ['password'];

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_pengelola', 'id_pengelola');
    }
}
