<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    // Menampilkan halaman manajemen stok & laporan modal
    public function index()
    {
        // Mengambil data sparepart dengan kolom yang diperlukan saja
        $spareparts = Sparepart::select([
            'id',
            'nama_barang',
            'kategori',
            'rak',
            'harga_beli',
            'harga_jual',
            'jumlah_stok',
            'minimum_stok'
        ])->get();

        // Menghitung total SKU langsung di database
        $totalSku = Sparepart::count();

        // Menghitung total valuasi langsung di database
        $totalValuasi = Sparepart::sum(
            DB::raw('jumlah_stok * harga_beli')
        );

        // Mengambil sparepart yang stoknya sudah mencapai batas minimum
        $stokKritis = Sparepart::whereColumn(
            'jumlah_stok',
            '<=',
            'minimum_stok'
        )->get();

        return view('admin.stok', compact(
            'spareparts',
            'totalSku',
            'totalValuasi',
            'stokKritis'
        ));
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

        return redirect()->back()->with(
            'success',
            'Suku cadang berhasil ditambahkan ke inventori!'
        );
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

        return redirect()->back()->with(
            'success',
            'Barang berhasil dihapus dari inventori.'
        );
    }
}
