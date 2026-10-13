<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    // Menampilkan halaman manajemen stok & laporan modal
    public function index()
    {
        $stocks = Stock::all();
        $totalSku = $stocks->count();
        $totalValuasi = $stocks->sum(function($item) {
            return $item->jumlah_stok * $item->harga_beli;
        });
        $stokKritis = Stock::where('jumlah_stok', '<=', 5)->get();

        return view('admin.stok', compact('stocks', 'totalSku', 'totalValuasi', 'stokKritis'));
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

        Stock::create($request->all());

        return redirect()->back()->with('success', 'Suku cadang berhasil ditambahkan ke inventori!');
    }

    // Menambah jumlah stok manual
    public function tambahStok(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->jumlah_stok += (int) $request->input('tambah_jumlah', 1);
        $stock->save();

        return redirect()->back()->with('success', 'Stok berhasil ditambah!');
    }

    // Menghapus barang
    public function destroy($id)
    {
        Stock::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Barang berhasil dihapus dari inventori.');
    }
}
