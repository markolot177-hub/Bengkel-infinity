<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('no_booking')->unique();
            $table->string('nopol');
            $table->string('nama_pelanggan');
            $table->string('kendaraan');
            $table->string('jenis_layanan');
            $table->date('tanggal_kedatangan');
            $table->string('sesi_waktu');
            $table->text('keluhan')->nullable();
            $table->enum('status', ['Menunggu', 'Dikerjakan', 'Selesai'])->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
