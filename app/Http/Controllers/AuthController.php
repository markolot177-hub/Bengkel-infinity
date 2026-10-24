<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengelola;
use App\Models\Pelanggan; // Tambahkan model Pelanggan
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('welcome');
    }

    // Proses login dengan pemisahan tabel Pengelola dan Pelanggan
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required', // Input form bisa berupa username/email
            'password' => 'required',
        ]);

        $credential = $request->email;
        $password = $request->password;

        // ==========================================
        // TAHAP 1: CEK KE TABEL PENGELOLA (Admin, Kasir, Mekanik)
        // ==========================================
        $pengelola = Pengelola::where('username', $credential)
                    ->orWhere('username', 'LIKE', '%' . $credential . '%')
                    ->first();

        if ($pengelola) {
            $isPasswordValid = false;

            // Periksa format password (hash bcrypt atau teks biasa)
            if (Str::startsWith($pengelola->password, '$2y$') || Str::startsWith($pengelola->password, '$2a$')) {
                if (Hash::check($password, $pengelola->password)) {
                    $isPasswordValid = true;
                }
            } else {
                if ($pengelola->password === $password) {
                    $isPasswordValid = true;
                }
            }

            if ($isPasswordValid) {
                // Simpan session pegawai
                session([
                    'id_pengelola' => $pengelola->id_pengelola,
                    'nama' => $pengelola->nama,
                    'role' => strtolower($pengelola->role),
                    'logged_in' => true
                ]);

                $role = strtolower($pengelola->role);
                if ($role == 'admin') {
                    return redirect()->route('dashboard.admin')->with('success', 'Berhasil login sebagai Admin!');
                } elseif ($role == 'kasir') {
                    return redirect()->route('kasir.index')->with('success', 'Berhasil login sebagai Kasir!');
                } elseif ($role == 'mekanik') {
                    return redirect()->route('mekanik.workstation')->with('success', 'Berhasil login sebagai Mekanik!');
                }

                return redirect('/dashboard-admin');
            }
        }

        // ==========================================
        // TAHAP 2: CEK KE TABEL PELANGGAN
        // ==========================================
        $pelanggan = Pelanggan::where('username', $credential)->first();

        if ($pelanggan) {
            $isPelangganValid = false;

            // Periksa format password pada tabel pelanggan
            if (Str::startsWith($pelanggan->password, '$2y$') || Str::startsWith($pelanggan->password, '$2a$')) {
                if (Hash::check($password, $pelanggan->password)) {
                    $isPelangganValid = true;
                }
            } else {
                if ($pelanggan->password === $password) {
                    $isPelangganValid = true;
                }
            }

            if ($isPelangganValid) {
                // Simpan session khusus pelanggan
                session([
                    'id_pelanggan' => $pelanggan->id_pelanggan,
                    'nama' => $pelanggan->nama,
                    'role' => 'pelanggan',
                    'logged_in' => true
                ]);

                return redirect()->route('portal')->with('success', 'Berhasil login sebagai Pelanggan!');
            }
        }

        // Jika kedua tabel gagal mencocokkan data
        return back()->withErrors(['error' => 'Username atau kata sandi yang Anda masukkan salah.'])->withInput();
    }

    // Proses logout
    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Berhasil keluar akun.');
    }
}
