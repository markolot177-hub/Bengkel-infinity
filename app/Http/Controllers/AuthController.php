<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('welcome');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'nama'     => 'required|string|max:100',
                'username' => 'required|string|max:50|unique:pelanggan,username',
                'no_hp'    => 'required|string|max:20',
                'alamat'   => 'nullable|string|max:255',
                'password' => 'required|string|min:6|confirmed',
            ], [
                'nama.required'      => 'Nama lengkap wajib diisi.',
                'username.required'  => 'Username wajib diisi.',
                'username.unique'    => 'Username sudah terdaftar, silakan gunakan username lain.',
                'no_hp.required'     => 'Nomor telepon / WA wajib diisi.',
                'password.required'  => 'Kata sandi wajib diisi.',
                'password.min'       => 'Kata sandi minimal 6 karakter.',
                'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            ]);

            if (
                Schema::hasTable('pengelola') &&
                DB::table('pengelola')
                    ->where('username', $request->username)
                    ->exists()
            ) {
                return back()
                    ->withErrors([
                        'username' => 'Username sudah digunakan, silakan pilih username lain.'
                    ])
                    ->withInput($request->except('password', 'password_confirmation'));
            }

            if (!Schema::hasTable('pelanggan')) {
                return back()
                    ->withErrors([
                        'error' => 'Tabel pelanggan tidak ditemukan di database.'
                    ])
                    ->withInput($request->except('password', 'password_confirmation'));
            }

            $data = [
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ];

            if (Schema::hasColumn('pelanggan', 'nama')) {
                $data['nama'] = $request->nama;
            } elseif (Schema::hasColumn('pelanggan', 'nama_lengkap')) {
                $data['nama_lengkap'] = $request->nama;
            }

            if (Schema::hasColumn('pelanggan', 'no_hp')) {
                $data['no_hp'] = $request->no_hp;
            } elseif (Schema::hasColumn('pelanggan', 'telepon')) {
                $data['telepon'] = $request->no_hp;
            } elseif (Schema::hasColumn('pelanggan', 'no_telepon')) {
                $data['no_telepon'] = $request->no_hp;
            }

            if (Schema::hasColumn('pelanggan', 'alamat')) {
                $data['alamat'] = $request->alamat ?? '-';
            }

            if (Schema::hasColumn('pelanggan', 'created_at')) {
                $data['created_at'] = now();
            }

            if (Schema::hasColumn('pelanggan', 'updated_at')) {
                $data['updated_at'] = now();
            }

            DB::table('pelanggan')->insert($data);

            return redirect()->route('login')
                ->with(
                    'success',
                    'Akun berhasil dibuat! Silakan masuk menggunakan username dan kata sandi Anda.'
                );

        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;

        } catch (\Exception $e) {
            return back()
                ->withErrors([
                    'error' => 'Gagal mendaftarkan akun: ' . $e->getMessage()
                ])
                ->withInput($request->except('password', 'password_confirmation'));
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
            ]);

            $credential = $request->email;
            $password = $request->password;

            // 1. Login pengelola
            $pengelola = null;

            if (Schema::hasTable('pengelola')) {
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

                    $idPengelola = $pengelola->id_pengelola
                        ?? $pengelola->id
                        ?? null;

                    if (!$idPengelola) {
                        return back()->withErrors([
                            'error' => 'ID pengelola tidak ditemukan.'
                        ]);
                    }

                    $request->session()->regenerate();

                    // Bersihkan identitas pelanggan sebelumnya
                    $request->session()->forget([
                        'id_pelanggan',
                        'user_id',
                        'id',
                    ]);

                    $request->session()->put([
                        'id_pengelola' => $idPengelola,
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

            // 2. Login pelanggan berdasarkan username
            $pelanggan = null;

            if (Schema::hasTable('pelanggan')) {
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
                    // Ambil ID asli dari primary key pelanggan
                    $idPelanggan = $pelanggan->id_pelanggan ?? null;

                    if (!$idPelanggan) {
                        return back()->withErrors([
                            'error' => 'ID pelanggan tidak ditemukan di database.'
                        ]);
                    }

                    $request->session()->regenerate();

                    // Bersihkan identitas pengelola sebelumnya
                    $request->session()->forget([
                        'id_pengelola',
                        'user_id',
                        'id',
                    ]);

                    $request->session()->put([
                        'id_pelanggan' => $idPelanggan,
                        'nama' => $pelanggan->nama ?? 'Pelanggan',
                        'role' => 'pelanggan',
                        'logged_in' => true,
                    ]);

                    return redirect()->route('portal');
                }
            }

            return back()
                ->withErrors([
                    'error' => 'Username atau Kata Sandi yang Anda masukkan salah.'
                ])
                ->withInput($request->only('email'));

        } catch (\Exception $e) {
            return back()
                ->withErrors([
                    'error' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
                ])
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
