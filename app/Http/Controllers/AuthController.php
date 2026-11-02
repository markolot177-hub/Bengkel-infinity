<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
            ]);

            $credential = $request->email; // Berisi username yang diinput user
            $password = $request->password;

            // 1. Cek tabel pengelola (Admin, Kasir, Mekanik) berdasarkan username
            $pengelola = null;
            if (\Schema::hasTable('pengelola')) {
                $pengelola = DB::table('pengelola')
                    ->where('username', $credential)
                    ->first();
            }

            if ($pengelola) {
                $storedPassword = $pengelola->password ?? '';
                $isValid = false;

                if (Str::startsWith($storedPassword, ['$2y$', '$2a$', '$2b$'])) {
                    $isValid = Hash::check($password, $storedPassword);
                } else {
                    $isValid = hash_equals($storedPassword, $password);
                }

                if ($isValid) {
                    $role = strtolower(trim($pengelola->role ?? 'admin'));
                    $request->session()->regenerate();

                    session([
                        'id_pengelola' => $pengelola->id_pengelola ?? $pengelola->id ?? 1,
                        'nama' => $pengelola->nama ?? 'Pengelola',
                        'role' => $role,
                        'logged_in' => true,
                    ]);

                    if ($role === 'admin') {
                        return redirect()->route('dashboard.admin');
                    } elseif ($role === 'kasir') {
                        return redirect()->route('kasir.index');
                    } elseif ($role === 'mekanik') {
                        return redirect()->route('mekanik.workstation');
                    }
                    return redirect('/dashboard');
                }
            }

            // 2. Cek tabel pelanggan HANYA berdasarkan username (karena kolom email tidak ada di database)
            $pelanggan = null;
            if (\Schema::hasTable('pelanggan')) {
                $pelanggan = DB::table('pelanggan')
                    ->where('username', $credential)
                    ->first();
            }

            if ($pelanggan) {
                $storedPassword = $pelanggan->password ?? '';
                $isValid = false;

                if (Str::startsWith($storedPassword, ['$2y$', '$2a$', '$2b$'])) {
                    $isValid = Hash::check($password, $storedPassword);
                } else {
                    $isValid = hash_equals($storedPassword, $password);
                }

                if ($isValid) {
                    $request->session()->regenerate();

                    session([
                        'id_pelanggan' => $pelanggan->id_pelanggan ?? $pelanggan->id ?? 1,
                        'nama' => $pelanggan->nama ?? $pelanggan->nama_lengkap ?? 'Pelanggan',
                        'role' => 'pelanggan',
                        'logged_in' => true,
                    ]);

                    return redirect()->route('portal');
                }
            }

            return back()
                ->withErrors(['error' => 'Username atau Kata Sandi yang Anda masukkan salah.'])
                ->withInput($request->only('email'));

        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'Terjadi kesalahan sistem: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Berhasil keluar akun.');
    }
}
