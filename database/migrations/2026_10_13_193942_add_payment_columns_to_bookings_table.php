<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        if (!Schema::hasColumn('bookings', 'total_biaya')) {
            $table->decimal('total_biaya', 12, 2)->default(0);
        }
        if (!Schema::hasColumn('bookings', 'metode_pembayaran')) {
            $table->string('metode_pembayaran')->nullable();
        }
    });
}

public function down(): void
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn(['total_biaya', 'metode_pembayaran']);
    });
}
};
