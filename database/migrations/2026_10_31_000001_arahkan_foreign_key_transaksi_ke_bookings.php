<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Migration ini hanya dijalankan pada MySQL.
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('transaksi_id_servis_foreign');
        });

        // Samakan tipe kolom dengan bookings.id.
        $kolom = DB::selectOne(
            "SELECT COLUMN_TYPE AS tipe
             FROM information_schema.COLUMNS
             WHERE TABLE_SCHEMA = DATABASE()
             AND TABLE_NAME = 'bookings'
             AND COLUMN_NAME = 'id'"
        );

        if (!$kolom) {
            throw new RuntimeException('Kolom bookings.id tidak ditemukan.');
        }

        $tipe = $kolom->tipe;

        DB::statement(
            "ALTER TABLE transaksi MODIFY id_servis {$tipe} NOT NULL"
        );

        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('id_servis')
                ->references('id')
                ->on('bookings')
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        // Rollback perubahan hanya pada MySQL.
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign(['id_servis']);

            $table->foreign('id_servis')
                ->references('id_servis')
                ->on('servis')
                ->cascadeOnUpdate();
        });
    }
};
