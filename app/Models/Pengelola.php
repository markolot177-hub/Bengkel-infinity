<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    protected $table = 'pengelola';
    protected $primaryKey = 'id_pengelola';

    protected $fillable = [
        'nama',
        'no_hp',
        'username',
        'password',
        'role',
    ];

    protected $hidden = ['password'];

    public $timestamps = false;
}
