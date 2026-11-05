<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id('id_kendaraan');
            $table->foreignId('id_pelanggan')
                ->constrained('pelanggan', 'id_pelanggan')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->string('no_polisi', 15)->unique();
            $table->string('merk', 50);
            $table->string('tipe', 50)->nullable();
            $table->year('tahun')->nullable();
            $table->string('warna', 30)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
