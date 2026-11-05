<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign('transaksi_id_servis_foreign');
        });

        // samakan tipe kolom dengan bookings.id agar foreign key bisa dibuat
        $tipe = DB::selectOne(
            "SELECT COLUMN_TYPE AS tipe FROM information_schema.COLUMNS
             WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'bookings' AND COLUMN_NAME = 'id'"
        )->tipe;

        DB::statement("ALTER TABLE transaksi MODIFY id_servis {$tipe} NOT NULL");

        Schema::table('transaksi', function (Blueprint $table) {
            $table->foreign('id_servis')->references('id')->on('bookings')->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign(['id_servis']);
            $table->foreign('id_servis')->references('id_servis')->on('servis')->cascadeOnUpdate();
        });
    }
};