<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sparepart; // PERUBAHAN 1: Memanggil model Sparepart

class SparepartController extends Controller // PERUBAHAN 2: Menyesuaikan nama class
{
    // Menampilkan halaman manajemen stok & laporan modal
    public function index()
    {
        $spareparts = Sparepart::all(); // PERUBAHAN 3: Menggunakan model Sparepart
        $totalSku = $spareparts->count();
        
        $totalValuasi = $spareparts->sum(function($item) {
            // PERUBAHAN 4: Menambahkan tanda bintang (*) untuk operasi perkalian
            return $item->jumlah_stok * $item->harga_beli;
        });
        
        $stokKritis = Sparepart::where('jumlah_stok', '<=', 5)->get();

        // Variabel yang dikirim ke tampilan diubah menjadi 'spareparts'
        return view('admin.stok', compact('spareparts', 'totalSku', 'totalValuasi', 'stokKritis'));
    }

    // Menambah barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'rak' => 'required|string|max:20',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'jumlah_stok' => 'required|integer|min:0',
        ]);

        Sparepart::create($request->all());

        return redirect()->back()->with('success', 'Suku cadang berhasil ditambahkan ke inventori!');
    }

    // Menambah jumlah stok manual
    public function tambahStok(Request $request, $id)
    {
        $sparepart = Sparepart::findOrFail($id);
        $sparepart->jumlah_stok += (int) $request->input('tambah_jumlah', 1);
        $sparepart->save();

        return redirect()->back()->with('success', 'Stok berhasil ditambah!');
    }

    // Menghapus barang
    public function destroy($id)
    {
        Sparepart::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Barang berhasil dihapus dari inventori.');
    }
}