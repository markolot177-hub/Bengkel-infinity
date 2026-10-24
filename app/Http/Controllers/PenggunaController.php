<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengelola;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    // Tampilkan daftar semua pengguna (Pengelola & Pelanggan/Member)
    public function index()
    {
        $penggunas = Pengelola::all();
        $pelanggans = Pelanggan::all();
        
        return view('admin.pengguna.index', compact('penggunas', 'pelanggans'));
    }

    // Simpan akun pengelola baru (Admin, Kasir, Mekanik)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'username' => 'required|string|max:50',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        Pengelola::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Password di-hash agar aman
            'role' => $request->role,
        ]);

        return back()->with('success', 'Akun pengelola berhasil ditambahkan dan disimpan!');
    }

    // Simpan akun Pelanggan baru yang didaftarkan oleh Admin (Member Bengkel)
    public function storePelanggan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'nullable|string',
            'username' => 'required|string|max:50|unique:pelanggan,username',
            'password' => 'required|string|min:6',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Password di-hash
        ]);

        return back()->with('success', 'Akun member pelanggan berhasil didaftarkan oleh admin!');
    }

    // Hapus akun pengelola
    public function destroy($id)
    {
        $pengguna = Pengelola::where('id_pengelola', $id)->first();

        if ($pengguna) {
            $pengguna->delete();
        }

        return back()->with('success', 'Akun pengelola berhasil dihapus!');
    }

    // Hapus data/akun pelanggan
    public function destroyPelanggan($id)
    {
        $pelanggan = Pelanggan::where('id_pelanggan', $id)->first();

        if ($pelanggan) {
            $pelanggan->delete();
        }

        return back()->with('success', 'Data pelanggan berhasil dihapus!');
    }
}