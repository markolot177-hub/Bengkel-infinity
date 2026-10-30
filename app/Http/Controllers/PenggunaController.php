<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengelola;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    // Tampilkan daftar pengelola dan pelanggan
    public function index()
    {
        $penggunas = Pengelola::all();
        $pelanggans = Pelanggan::all();

        return view('admin.pengguna.index', compact(
            'penggunas',
            'pelanggans'
        ));
    }

    // Simpan akun berdasarkan role yang dipilih
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,kasir,mekanik,pelanggan',
        ]);

        // Pelanggan disimpan ke tabel pelanggan
        if ($request->role === 'pelanggan') {
            $request->validate([
                'username' => 'unique:pelanggan,username',
                'alamat' => 'nullable|string',
            ]);

            Pelanggan::create([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            return back()->with(
                'success',
                'Akun pelanggan berhasil ditambahkan!'
            );
        }

        // Cegah username staf duplikat
        $request->validate([
            'username' => 'unique:pengelola,username',
        ]);

        Pengelola::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return back()->with(
            'success',
            'Akun pengelola berhasil ditambahkan!'
        );
    }

    // Tetap sediakan route penyimpanan pelanggan yang lama
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
            'password' => Hash::make($request->password),
        ]);

        return back()->with(
            'success',
            'Akun member pelanggan berhasil didaftarkan!'
        );
    }

    // Hapus akun pengelola
    public function destroy($id)
    {
        $pengguna = Pengelola::where('id_pengelola', $id)->firstOrFail();
        $pengguna->delete();

        return back()->with('success', 'Akun pengelola berhasil dihapus!');
    }

    // Hapus akun pelanggan
    public function destroyPelanggan($id)
    {
        $pelanggan = Pelanggan::where('id_pelanggan', $id)->firstOrFail();
        $pelanggan->delete();

        return back()->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
