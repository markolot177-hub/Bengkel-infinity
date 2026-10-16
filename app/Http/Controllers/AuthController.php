<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengelola;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('welcome');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Cek data di tabel pengelola berdasarkan username / email
        $user = Pengelola::where('username', $request->email)
                    ->orWhere('username', 'LIKE', '%' . $request->email . '%')
                    ->first();

        $isPasswordValid = false;

        if ($user) {
            // Periksa apakah password di database menggunakan format hash atau teks biasa
            if (\Str::startsWith($user->password, '$2y$') || \Str::startsWith($user->password, '$2a$')) {
                // Jika terdeteksi hash bcrypt, gunakan Hash::check
                if (Hash::check($request->password, $user->password)) {
                    $isPasswordValid = true;
                }
            } else {
                // Jika berupa teks biasa (plain text)
                if ($user->password === $request->password) {
                    $isPasswordValid = true;
                }
            }
        }

        // Jika user ditemukan dan password valid
        if ($user && $isPasswordValid) {

            // Simpan session login berdasarkan data pengelola
            session([
                'id_pengelola' => $user->id_pengelola,
                'nama' => $user->nama,
                'role' => $user->role,
                'logged_in' => true
            ]);

            // Arahkan ke halaman berdasarkan role masing-masing
            if ($user->role == 'admin') {
                return redirect()->route('dashboard.admin')->with('success', 'Berhasil login sebagai Admin!');
            } elseif ($user->role == 'kasir') {
                return redirect()->route('kasir.index')->with('success', 'Berhasil login sebagai Kasir!');
            } elseif ($user->role == 'mekanik') {
                return redirect()->route('mekanik.workstation')->with('success', 'Berhasil login sebagai Mekanik!');
            } elseif ($user->role == 'pelanggan') {
                return redirect()->route('portal')->with('success', 'Berhasil login sebagai Pelanggan!');
            }

            return redirect('/dashboard-admin');
        }

        return back()->withErrors(['error' => 'Email atau kata sandi yang Anda masukkan salah.'])->withInput();
    }

    // Proses logout
    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Berhasil keluar akun.');
    }
}
