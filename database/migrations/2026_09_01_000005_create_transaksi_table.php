<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('id_servis')
                ->constrained('servis', 'id_servis')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('id_pengelola')
                ->constrained('pengelola', 'id_pengelola')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('tgl_transaksi')->useCurrent();
            $table->decimal('total_biaya', 12, 2);
            $table->text('keterangan')->nullable();

            // kolom hasil gabungan dari tabel pembayaran
            $table->enum('metode_pembayaran', ['Tunai', 'Transfer', 'QRIS', 'Kartu Debit/Kredit']);
            $table->decimal('jumlah_bayar', 12, 2);
            $table->decimal('kembalian', 12, 2)->default(0);
            $table->dateTime('tgl_pembayaran')->nullable();
            $table->enum('status_pembayaran', ['Belum Lunas', 'Lunas', 'Gagal'])->default('Belum Lunas');
            $table->string('bukti_pembayaran', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
