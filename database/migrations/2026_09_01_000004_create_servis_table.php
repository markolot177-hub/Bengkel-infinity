<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->id('id_servis');
            $table->foreignId('id_kendaraan')
                ->constrained('kendaraan', 'id_kendaraan')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('id_mekanik')
                ->constrained('pengelola', 'id_pengelola')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->date('tgl_servis');
            $table->text('keluhan')->nullable();
            $table->string('jenis_servis', 100);
            $table->enum('status', ['Menunggu', 'Diproses', 'Selesai', 'Dibatalkan'])->default('Menunggu');
            $table->decimal('total_biaya', 12, 2)->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servis');
    }
};
