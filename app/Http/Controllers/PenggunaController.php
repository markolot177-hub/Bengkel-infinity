<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengelola;

class PenggunaController extends Controller
{
    // Tampilkan daftar semua pengguna / pengelola
    public function index()
    {
        $penggunas = Pengelola::all();
        return view('admin.pengguna.index', compact('penggunas'));
    }

    // Simpan pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        // Simpan ke database
        Pengelola::create([
            'nama' => $request->nama,       // Sesuaikan jika kolom database Anda bernama nama_lengkap/nama_pengguna
            'no_hp' => $request->no_hp,     // Sesuaikan jika kolom database Anda bernama telepon
            'username' => $request->username, // Sesuaikan jika kolom database Anda bernama email
            'password' => $request->password,
            'role' => $request->role,       // Sesuaikan jika kolom database Anda bernama level/hak_akses
        ]);

        return back()->with('success', 'Akun pengguna berhasil ditambahkan dan disimpan!');
    }

    // Hapus pengguna
    public function destroy($id)
    {
        // Mencari berdasarkan primary key tabel pengelola
        $pengguna = Pengelola::where('id_pengelola', $id)->first();

        if ($pengguna) {
            $pengguna->delete();
        }

        return back()->with('success', 'Akun pengguna berhasil dihapus!');
    }
}
