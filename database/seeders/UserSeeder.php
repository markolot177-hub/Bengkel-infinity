<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin
        User::updateOrCreate(
            ['email' => 'admin@bengkelcare.com'],
            [
                'name' => 'Andi Syarip (Admin)',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // 2. Akun Mekanik
        User::updateOrCreate(
            ['email' => 'mekanik@bengkelcare.com'],
            [
                'name' => 'Doni (Mekanik)',
                'password' => Hash::make('password123'),
                'role' => 'mekanik',
            ]
        );

        // 3. Akun Kasir
        User::updateOrCreate(
            ['email' => 'kasir@bengkelcare.com'],
            [
                'name' => 'Rian (Kasir)',
                'password' => Hash::make('password123'),
                'role' => 'kasir',
            ]
        );

        // 4. Akun Pengguna / Pelanggan
        User::updateOrCreate(
            ['email' => 'pelanggan@bengkelcare.com'],
            [
                'name' => 'Rina Melati (Pelanggan)',
                'password' => Hash::make('password123'),
                'role' => 'pengguna',
            ]
        );
    }
}
