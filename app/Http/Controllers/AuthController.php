<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengelola;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('welcome');
    }

    // Proses login admin, kasir, mekanik, dan pelanggan
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credential = $request->email;
        $password = $request->password;

        // Login pengelola menggunakan username yang cocok tepat
        $pengelola = Pengelola::where(
            'username',
            $credential
        )->first();

        if ($pengelola && $this->passwordValid(
            $password,
            $pengelola->password
        )) {
            $role = strtolower($pengelola->role);

            if (!in_array($role, ['admin', 'kasir', 'mekanik'], true)) {
                return back()->withErrors([
                    'error' => 'Role akun tidak valid.',
                ]);
            }

            // Regenerasi session untuk keamanan login
            $request->session()->regenerate();

            session([
                'id_pengelola' => $pengelola->id_pengelola,
                'nama' => $pengelola->nama,
                'role' => $role,
                'logged_in' => true,
            ]);

            if ($role === 'admin') {
                return redirect()
                    ->route('dashboard.admin')
                    ->with('success', 'Berhasil login sebagai Admin!');
            }

            if ($role === 'kasir') {
                return redirect()
                    ->route('kasir.index')
                    ->with('success', 'Berhasil login sebagai Kasir!');
            }

            return redirect()
                ->route('mekanik.workstation')
                ->with('success', 'Berhasil login sebagai Mekanik!');
        }

        // Login pelanggan
        $pelanggan = Pelanggan::where(
            'username',
            $credential
        )->first();

        if ($pelanggan && $this->passwordValid(
            $password,
            $pelanggan->password
        )) {
            $request->session()->regenerate();

            session([
                'id_pelanggan' => $pelanggan->id_pelanggan,
                'nama' => $pelanggan->nama,
                'role' => 'pelanggan',
                'logged_in' => true,
            ]);

            return redirect()
                ->route('portal')
                ->with('success', 'Berhasil login sebagai Pelanggan!');
        }

        return back()
            ->withErrors([
                'error' => 'Username atau kata sandi yang Anda masukkan salah.',
            ])
            ->withInput($request->only('email'));
    }

    // Mendukung password hash dan password lama teks biasa
    private function passwordValid(
        string $input,
        ?string $storedPassword
    ): bool {
        if (!$storedPassword) {
            return false;
        }

        if (
            Str::startsWith($storedPassword, '$2y$') ||
            Str::startsWith($storedPassword, '$2a$') ||
            Str::startsWith($storedPassword, '$2b$')
        ) {
            return Hash::check($input, $storedPassword);
        }

        // Kompatibilitas dengan data password lama
        return hash_equals($storedPassword, $input);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Berhasil keluar akun.');
    }
}
