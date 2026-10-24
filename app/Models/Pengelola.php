<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    protected $table = 'pengelola';
    protected $primaryKey = 'id_pengelola';

    // Masukkan semua nama kolom yang ada di tabel pengelola database Anda
    protected $fillable = ['nama', 'no_hp', 'username', 'password', 'role'];

    public $timestamps = false;
}
