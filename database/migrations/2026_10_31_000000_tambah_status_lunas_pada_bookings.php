<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement(
                "ALTER TABLE bookings MODIFY status VARCHAR(20) NOT NULL DEFAULT 'Menunggu'"
            );
        }

        DB::table('bookings')
            ->where('status', 'Selesai')
            ->where('total_biaya', '>', 0)
            ->update(['status' => 'Lunas']);
    }

    public function down(): void
    {
        DB::table('bookings')
            ->where('status', 'Lunas')
            ->update(['status' => 'Selesai']);
    }
};
