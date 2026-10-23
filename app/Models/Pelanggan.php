<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Arahkan ke nama tabel yang benar
    protected $table = 'pelanggan'; 
    
    // Beritahu Laravel bahwa Primary Key Anda adalah id_pelanggan, bukan id
    protected $primaryKey = 'id_pelanggan'; 

    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'username',
        'password',
    ];
}