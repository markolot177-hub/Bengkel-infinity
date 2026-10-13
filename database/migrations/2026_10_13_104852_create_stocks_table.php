<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('kategori');
            $table->string('rak');
            $table->integer('harga_beli'); // Harga modal untuk perhitungan keuangan
            $table->integer('harga_jual'); // Harga jual ke pelanggan
            $table->integer('jumlah_stok');
            $table->integer('minimum_stok')->default(5);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
