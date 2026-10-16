<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen sparepart - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F4F7FA] text-slate-800 h-screen flex overflow-hidden">

    <!-- SIDEBAR (HANYA STOK, KASIR, LAPORAN) -->
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 z-20">
        <div>
            <div class="h-16 flex items-center px-6 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 text-[13px] leading-tight">BengkelCare</h1>
                        <p class="text-[9px] font-semibold text-slate-500">Sistem Servis Terpadu</p>
                    </div>
                </div>
            </div>

            <nav class="px-3 space-y-1 mt-4">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>
                <a href="/manajemen-stok" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">📦 Manajemen sparepart</a>
                <a href="/kasir" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">🛒 Monitoring & Kasir</a>
                <a href="/laporan-pendapatan" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">📊 Laporan Keuangan</a>
            </nav>
        </div>
        <div class="px-6 py-4 border-t border-slate-200">
            <a href="/logout" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold">🚪 Keluar Sistem</a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <h2 class="font-bold text-slate-800 text-sm">Manajemen Inventori & sparepart</h2>
            <div class="flex items-center gap-3">
    <span class="text-xs font-bold text-slate-700 uppercase">{{ session('nama') }} ({{ session('role') }})</span>
</div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-8 space-y-6">

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <span class="text-[10px] uppercase font-bold bg-emerald-100 px-2 py-0.5 rounded">Berhasil</span>
                </div>
            @endif

            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight">Datalog sparepart & Pelumas</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Kelola harga beli, harga jual, margin keuntungan, dan pemantauan stok secara akurat.</p>
                </div>
            </div>

            <!-- DASHBOARD SUMMARY -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm flex justify-between items-center">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase">Total SKU Barang Aktif</p>
                        <h3 class="text-3xl font-black text-slate-900 mt-1">{{ $totalSku ?? 0 }} <span class="text-xs font-medium text-slate-500">Item</span></h3>
                        <p class="text-xs text-blue-600 font-bold mt-2">Valuasi Modal Aset: Rp {{ number_format($totalValuasi ?? 0, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-xl text-blue-600">📦</div>
                </div>

                <div class="bg-white rounded-xl border border-red-200 p-5 shadow-sm flex justify-between items-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1.5 h-full bg-red-500"></div>
                    <div class="pl-2">
                        <p class="text-[10px] font-bold text-red-600 uppercase">Peringatan Stok Kritis / Habis</p>
                        <h3 class="text-3xl font-black text-red-600 mt-1">{{ isset($stokKritis) ? $stokKritis->count() : 0 }} <span class="text-xs font-medium text-red-500">Item Perlu Restock</span></h3>
                        <p class="text-xs text-slate-500 mt-2">Stok menyamai atau di bawah batas minimum sistem.</p>
                    </div>
                    <div class="bg-red-50 p-3 rounded-xl text-red-600 border border-red-100">⚠️</div>
                </div>
            </div>

            <!-- FORM TAMBAH BARANG -->
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                <h3 class="font-bold text-slate-900 text-sm mb-4">➕ Tambah Suku Cadang & Harga Modal (Beli)</h3>
                <form action="{{ route('stok.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-7 gap-3">
                    @csrf
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Nama Barang:</label>
                        <input type="text" name="nama_barang" required placeholder="Cth: Oli TMO 1L" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Kategori:</label>
                        <input type="text" name="kategori" required placeholder="Cth: Pelumas" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Rak:</label>
                        <input type="text" name="rak" required placeholder="RAK A-01" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Harga Beli (Modal):</label>
                        <input type="number" name="harga_beli" required placeholder="40000" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Harga Jual:</label>
                        <input type="number" name="harga_jual" required placeholder="55000" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Stok Awal:</label>
                        <input type="number" name="jumlah_stok" required placeholder="10" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <input type="hidden" name="minimum_stok" value="5">
                    <div class="md:col-span-7 flex justify-end mt-2">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-5 py-2.5 rounded-lg shadow-sm transition-colors">
                            Simpan Barang ke Inventori
                        </button>
                    </div>
                </form>
            </div>

            <!-- TABEL INVENTORI -->
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 bg-white flex justify-between items-center">
                    <h3 class="font-bold text-slate-900 text-sm">Daftar Inventori sparepart</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 text-[10px] font-bold uppercase tracking-wider border-b border-slate-100">
                                <th class="py-3 px-4">Nama Barang & Rak</th>
                                <th class="py-3 px-4">Kategori</th>
                                <th class="py-3 px-4 text-right">Harga Beli (Modal)</th>
                                <th class="py-3 px-4 text-right">Harga Jual</th>
                                <th class="py-3 px-4 text-center">Jumlah Stok</th>
                                <th class="py-3 px-4 text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs font-medium text-slate-700">
                            @forelse($stocks as $item)
                            <tr class="hover:bg-slate-50/50">
                                <td class="py-4 px-4">
                                    <span class="font-bold text-slate-900 block">{{ $item->nama_barang }}</span>
                                    <span class="text-[10px] text-blue-600 font-bold">Rak: {{ $item->rak }}</span>
                                </td>
                                <td class="py-4 px-4 text-slate-500">{{ $item->kategori }}</td>
                                <td class="py-4 px-4 text-right font-medium text-slate-600">Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                                <td class="py-4 px-4 text-right font-bold text-slate-900">Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                                <td class="py-4 px-4 text-center">
                                    @if($item->jumlah_stok <= $item->minimum_stok)
                                        <span class="bg-red-100 text-red-700 font-extrabold text-[11px] px-2.5 py-1 rounded-full inline-block">⚠️ {{ $item->jumlah_stok }} Pcs (Kritis)</span>
                                    @else
                                        <span class="bg-emerald-100 text-emerald-800 font-bold text-[11px] px-2.5 py-1 rounded-full inline-block">{{ $item->jumlah_stok }} Pcs (Aman)</span>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <form action="{{ route('stok.tambah', $item->id) }}" method="POST" class="inline-flex items-center gap-1">
                                            @csrf
                                            <input type="number" name="tambah_jumlah" value="1" min="1" class="w-12 bg-white border border-slate-200 rounded text-center text-xs py-1">
                                            <button type="submit" class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold text-[10px] px-2 py-1 rounded border border-blue-200">+ Stok</button>
                                        </form>
                                        <form action="{{ route('stok.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 font-bold text-[10px] px-2 py-1 rounded border border-red-200">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-slate-400 text-xs">Belum ada data suku cadang di inventori.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
