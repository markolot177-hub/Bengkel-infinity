<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengelola', function (Blueprint $table) {
            $table->id('id_pengelola');
            $table->string('nama', 100);
            $table->string('no_hp', 20)->nullable();
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->enum('role', ['admin', 'kasir', 'mekanik']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengelola');
    }
};
