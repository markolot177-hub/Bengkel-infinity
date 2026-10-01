<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir & Monitoring - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F4F7FA] text-slate-800 h-screen flex overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 z-20">
        <div>
            <!-- Logo -->
            <div class="h-16 flex items-center px-6 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 text-[13px] leading-tight">BengkelCare</h1>
                        <p class="text-[9px] font-semibold text-slate-500">Sistem Servis Terpadu</p>
                    </div>
                </div>
            </div>

            <!-- Cabang Indicator -->
            <div class="px-5 py-4">
                <div class="bg-blue-50 text-blue-700 px-3 py-2 rounded-lg text-xs font-semibold flex justify-between items-center border border-blue-100">
                    <div class="flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        CABANG PUSAT
                    </div>
                    <span class="bg-white px-1.5 py-0.5 rounded text-[10px] border border-blue-200">Bay 1-8</span>
                </div>
            </div>

            <!-- Menu Navigasi -->
            <nav class="px-3 space-y-1 mt-2">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Navigasi Utama</p>
                <a href="{{ route('dashboard.admin') }}" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Dashboard Admin
                </a>
                <!-- Menu Kasir Aktif -->
                <a href="#" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    Monitoring Servis & Kasir
                </a>
                <a href="#" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    Workstation Mekanik
                </a>
                <a href="#" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    Portal Pelanggan
                </a>
            </nav>
        </div>

        <div class="px-6 py-4 border-t border-slate-200">
            <div class="flex items-center justify-between text-[10px] text-slate-500 mb-1">
                <span>Status Jaringan Bengkel</span>
                <span class="text-blue-600 font-bold flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> Aktif</span>
            </div>
            <p class="text-[9px] text-slate-400">Versi Sistem: 3.4.2 Enterprise</p>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        
        <!-- TOP NAVBAR -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <div class="relative w-96">
                <svg class="absolute left-3 top-1.5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="text" placeholder="Cari No. Polisi (cth: B 2841 SKL), No. Rangka, atau ID Pelanggan..." class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg pl-9 pr-3 py-1.5 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            </div>

            <div class="flex items-center gap-6">
                <div class="flex items-center bg-[#F8FAFC] p-1 rounded-lg border border-slate-200">
                    <span class="text-[10px] text-slate-500 font-semibold px-2">Peran:</span>
                    <button class="bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded shadow-sm">Admin</button>
                    <button class="text-slate-500 hover:text-slate-700 text-[10px] font-semibold px-3 py-1">Mekanik</button>
                    <button class="text-slate-500 hover:text-slate-700 text-[10px] font-semibold px-3 py-1">Pelanggan</button>
                </div>
                
                <button class="text-slate-400 hover:text-slate-600 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                </button>

                <div class="flex items-center gap-3 border-l border-slate-200 pl-6 cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-slate-300 overflow-hidden border border-slate-200">
                        <img src="https://ui-avatars.com/api/?name=Andi+Syarip&background=E2E8F0&color=1E293B" alt="Avatar">
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-800">ANDI SYARIP</p>
                        <p class="text-[10px] text-slate-500 font-medium">Kepala Bengkel (Service Head)</p>
                    </div>
                    <svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
        </header>

        <!-- SCROLLABLE CONTENT -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            
            <!-- Page Header -->
            <div class="flex justify-between items-end mb-6">
                <div>
                    <div class="flex items-center gap-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">
                        KASIR & KEUANGAN <span class="text-blue-600">&bull; SHIFT SIANG (KASIR #02)</span> &bull; 24 OKTOBER 2025
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Terminal Transaksi & Monitoring Servis</h2>
                </div>
                <div class="flex gap-3">
                    <button class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold px-4 py-2 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Ekspor Laporan
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <button class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold px-4 py-2 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                        Sinkron Part
                    </button>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Buat Faktur Baru
                    </button>
                </div>
            </div>

            <!-- Stats Row -->
            <div class="grid grid-cols-4 gap-4 mb-6">
                <!-- Stat 1 -->
                <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">TOTAL PEMBAYARAN MASUK</p>
                            <h3 class="text-xl font-black text-slate-800 mt-1">Rp 14.850.000</h3>
                        </div>
                        <div class="bg-blue-50 p-1.5 rounded text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                        </div>
                    </div>
                    <div class="mt-3 text-[10px] text-slate-500 flex items-center gap-1">
                        <span class="text-blue-600 font-bold flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg> +18.4%</span> vs shift kemarin (16 faktur lunas)
                    </div>
                </div>
                <!-- Stat 2 -->
                <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">INVOICE TERTUNDA (UNPAID)</p>
                            <h3 class="text-xl font-black text-slate-800 mt-1">Rp 3.425.000</h3>
                        </div>
                        <div class="bg-red-50 p-1.5 rounded text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                        </div>
                    </div>
                    <div class="mt-3 flex justify-between items-center text-[10px]">
                        <span class="text-slate-500">3 Kendaraan selesai servis</span>
                        <span class="text-red-600 font-bold">Siap Ditagih</span>
                    </div>
                </div>
                <!-- Stat 3 -->
                <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">TOTAL FAKTUR HARI INI</p>
                            <div class="flex items-baseline gap-1 mt-1">
                                <h3 class="text-xl font-black text-slate-800">21</h3>
                                <span class="text-[10px] text-slate-500 font-medium">Faktur</span>
                            </div>
                        </div>
                        <div class="bg-slate-100 p-1.5 rounded text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center gap-3 text-[10px] text-slate-500 font-medium">
                        <span class="flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> 18 Lunas</span>
                        <span class="flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> 3 Pending</span>
                    </div>
                </div>
                <!-- Stat 4 -->
                <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">ITEM SPAREPART TERPAKAI</p>
                            <div class="flex items-baseline gap-1 mt-1">
                                <h3 class="text-xl font-black text-slate-800">48</h3>
                                <span class="text-[10px] text-slate-500 font-medium">Pcs (14 SKU)</span>
                            </div>
                        </div>
                        <div class="bg-blue-50 p-1.5 rounded text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        </div>
                    </div>
                    <div class="mt-3 flex justify-between items-center text-[10px]">
                        <span class="text-blue-600 font-bold">Stok otomatis berkurang</span>
                        <span class="bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded font-medium">Aman</span>
                    </div>
                </div>
            </div>

            <!-- Main Transaksi Area (Grid 2 Kolom) -->
            <div class="grid grid-cols-3 gap-6 mb-8">
                
                <!-- KOLOM KIRI: Detail Invoice & SPK -->
                <div class="col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm flex flex-col">
                    
                    <!-- Header Invoice -->
                    <div class="p-5 border-b border-slate-100 flex justify-between items-start bg-slate-50/50 rounded-t-xl">
                        <div class="flex gap-4 items-center">
                            <div class="bg-slate-200 text-slate-700 font-bold text-sm px-3 py-1.5 rounded-lg border border-slate-300">
                                B 2091 SZZ
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900">Honda HR-V 1.5 E CVT (2020)</h3>
                                <p class="text-[11px] text-slate-500 mt-0.5">Pemilik: <span class="font-semibold text-slate-700">Bpk. Hendra Gunawan</span> &bull; +62 812-9882-1100</p>
                            </div>
                        </div>
                        <span class="bg-blue-100 text-blue-700 text-[10px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span> Siap Kasir / Unpaid
                        </span>
                    </div>

                    <!-- Info Grid -->
                    <div class="grid grid-cols-4 gap-4 p-5 border-b border-slate-100 bg-white">
                        <div>
                            <p class="text-[10px] text-slate-500 font-medium mb-1">No. Faktur / SPK</p>
                            <p class="text-xs font-bold text-slate-800">INV-2025-0588</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-500 font-medium mb-1">Mekanik Utama</p>
                            <p class="text-xs font-bold text-slate-800">Joko Widodo (Bay 04)</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-500 font-medium mb-1">Selesai Dikerjakan</p>
                            <p class="text-xs font-bold text-slate-800">Hari ini, 14:20 WIB</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-500 font-medium mb-1">Tipe Servis</p>
                            <p class="text-xs font-bold text-slate-800">Periodic 40.000 KM</p>
                        </div>
                    </div>

                    <!-- Table Rincian -->
                    <div class="p-5 flex-1">
                        <div class="flex justify-between items-end mb-3">
                            <h4 class="text-[13px] font-bold text-slate-800">Rincian Komponen Jasa & Suku Cadang</h4>
                            <span class="text-[10px] text-slate-500">4 Item Tercatat</span>
                        </div>
                        
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-[10px] font-bold text-slate-500 uppercase tracking-wide border-y border-slate-100 bg-slate-50">
                                    <th class="py-2.5 px-2">Kode / Komponen</th>
                                    <th class="py-2.5 px-2 text-center">Tipe</th>
                                    <th class="py-2.5 px-2 text-center">QTY</th>
                                    <th class="py-2.5 px-2 text-right">Harga Satuan</th>
                                    <th class="py-2.5 px-2 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-[11px]">
                                <!-- Row 1 -->
                                <tr>
                                    <td class="py-3 px-2">
                                        <p class="font-bold text-slate-800">Paket Servis Berkala 40.000 KM</p>
                                        <p class="text-[9px] text-slate-500 mt-0.5">Labor/Jasa Tune-up & Pemeriksaan 24 Titik Kaki-Kaki</p>
                                    </td>
                                    <td class="py-3 px-2 text-center"><span class="bg-blue-50 text-blue-600 border border-blue-100 text-[9px] font-bold px-2 py-0.5 rounded">JASA</span></td>
                                    <td class="py-3 px-2 text-center font-medium">1 Paket</td>
                                    <td class="py-3 px-2 text-right text-slate-600">Rp 350.000</td>
                                    <td class="py-3 px-2 text-right font-bold text-slate-800">Rp 350.000</td>
                                </tr>
                                <!-- Row 2 -->
                                <tr>
                                    <td class="py-3 px-2">
                                        <p class="font-bold text-slate-800">Honda E-Pro Gold 0W-20 (4L)</p>
                                        <p class="text-[9px] text-slate-500 mt-0.5">Part Code: 08232-P99-K4LQ1</p>
                                    </td>
                                    <td class="py-3 px-2 text-center"><span class="bg-slate-100 text-slate-600 border border-slate-200 text-[9px] font-bold px-2 py-0.5 rounded">PART</span></td>
                                    <td class="py-3 px-2 text-center font-medium">1 Galon</td>
                                    <td class="py-3 px-2 text-right text-slate-600">Rp 520.000</td>
                                    <td class="py-3 px-2 text-right font-bold text-slate-800">Rp 520.000</td>
                                </tr>
                                <!-- Row 3 -->
                                <tr>
                                    <td class="py-3 px-2">
                                        <p class="font-bold text-slate-800">Filter Oli Mesin Original HR-V</p>
                                        <p class="text-[9px] text-slate-500 mt-0.5">Part Code: 15400-RAF-T01</p>
                                    </td>
                                    <td class="py-3 px-2 text-center"><span class="bg-slate-100 text-slate-600 border border-slate-200 text-[9px] font-bold px-2 py-0.5 rounded">PART</span></td>
                                    <td class="py-3 px-2 text-center font-medium">1 Pcs</td>
                                    <td class="py-3 px-2 text-right text-slate-600">Rp 65.000</td>
                                    <td class="py-3 px-2 text-right font-bold text-slate-800">Rp 65.000</td>
                                </tr>
                                <!-- Row 4 -->
                                <tr>
                                    <td class="py-3 px-2">
                                        <p class="font-bold text-slate-800">Brake Pad Front Set (Kampas Rem)</p>
                                        <p class="text-[9px] text-slate-500 mt-0.5">Part Code: 45022-T7A-000</p>
                                    </td>
                                    <td class="py-3 px-2 text-center"><span class="bg-slate-100 text-slate-600 border border-slate-200 text-[9px] font-bold px-2 py-0.5 rounded">PART</span></td>
                                    <td class="py-3 px-2 text-center font-medium">1 Set</td>
                                    <td class="py-3 px-2 text-right text-slate-600">Rp 680.000</td>
                                    <td class="py-3 px-2 text-right font-bold text-slate-800">Rp 680.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Kalkulasi Total -->
                    <div class="bg-slate-50 p-5 rounded-b-xl border-t border-slate-100 flex justify-between items-center">
                        <div class="w-1/2 space-y-2">
                            <div class="flex justify-between text-[11px] text-slate-600">
                                <span>Subtotal Komponen (1 Jasa + 3 Suku Cadang)</span>
                                <span class="font-bold">Rp 1.615.000</span>
                            </div>
                            <div class="flex justify-between text-[11px] text-blue-600">
                                <span class="flex items-center gap-1 font-medium"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> Diskon Member Prioritas (BengkelCare Gold 5%)</span>
                                <span class="font-bold">- Rp 80.750</span>
                            </div>
                            <div class="flex justify-between text-[11px] text-slate-600">
                                <span>PPN 11% (UU HPP Kemenkeu)</span>
                                <span class="font-bold">Rp 168.768</span>
                            </div>
                            
                            <div class="pt-3 mt-2 border-t border-slate-200 flex justify-between items-end">
                                <div>
                                    <h4 class="text-sm font-black text-slate-900">Total Tagihan Final</h4>
                                    <p class="text-[9px] text-slate-500 mt-0.5">Termasuk garansi pekerjaan 14 hari kerja</p>
                                </div>
                                <h2 class="text-[26px] font-black text-slate-900 leading-none tracking-tight">Rp 1.703.018</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Action Footer -->
                    <div class="p-4 border-t border-slate-200 flex justify-between items-center bg-white rounded-b-xl">
                        <div class="flex gap-2">
                            <button class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                                <svg class="text-slate-500" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                Cetak Struk Kasir
                            </button>
                            <button class="bg-white border border-slate-200 hover:bg-slate-50 text-blue-600 text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                Kirim WhatsApp
                            </button>
                        </div>
                        <button class="bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold px-5 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="M9 15l2 2 4-4"></path></svg>
                            Tandai Kendaraan Diambil
                        </button>
                    </div>

                </div>

                <!-- KOLOM KANAN: Panel Kasir & Pembayaran -->
                <div class="col-span-1 flex flex-col gap-4">
                    
                    <!-- Box Pembayaran -->
                    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-slate-900">Penyelesaian Transaksi</h3>
                                <p class="text-[10px] text-slate-500 mt-0.5">Pilih metode bayar pelanggan</p>
                            </div>
                            <div class="bg-blue-50 text-blue-600 p-1.5 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                            </div>
                        </div>

                        <!-- Tab Metode Bayar -->
                        <div class="flex rounded-lg border border-slate-200 p-1 bg-slate-50 mb-5">
                            <button class="flex-1 bg-blue-600 text-white text-[10px] font-bold py-1.5 rounded shadow-sm">QRIS</button>
                            <button class="flex-1 text-slate-600 hover:text-slate-900 text-[10px] font-semibold py-1.5 rounded">Tunai</button>
                            <button class="flex-1 text-slate-600 hover:text-slate-900 text-[10px] font-semibold py-1.5 rounded">Transfer</button>
                            <button class="flex-1 text-slate-600 hover:text-slate-900 text-[10px] font-semibold py-1.5 rounded">EDC/Debit</button>
                        </div>

                        <!-- Area QRIS -->
                        <div class="bg-[#F4F7FF] rounded-xl border border-blue-100 p-6 flex flex-col items-center justify-center relative mb-5">
                            <div class="flex items-center gap-1.5 mb-4 text-[10px] font-bold text-slate-800">
                                QRIS STANDAR BI <span class="text-blue-600 flex items-center gap-1 ml-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span> Sesi Aktif</span>
                            </div>
                            <!-- Mock QR Code -->
                            <div class="bg-white p-2 rounded-lg shadow-sm border border-slate-200 mb-4 w-32 h-32 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#0F172A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect><rect x="5" y="5" width="3" height="3"></rect><rect x="16" y="5" width="3" height="3"></rect><rect x="16" y="16" width="3" height="3"></rect><rect x="5" y="16" width="3" height="3"></rect><path d="M10 14h2"></path><path d="M12 14v2"></path><path d="M10 18h4"></path><path d="M14 10v-2"></path><path d="M12 22v-2"></path><path d="M22 10v2"></path></svg>
                            </div>
                            <h3 class="text-lg font-black text-slate-900">Rp 1.703.018</h3>
                            <p class="text-[9px] text-slate-500 mt-1 text-center">BCA, Mandiri, GoPay, OVO, ShopeePay</p>
                            
                            <!-- Timer -->
                            <div class="absolute bottom-0 left-0 w-full bg-blue-100/50 rounded-b-xl border-t border-blue-100 px-4 py-2 flex justify-between items-center text-[10px]">
                                <span class="text-slate-500 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> Kadaluwarsa dlm</span>
                                <span class="font-bold text-blue-700">14:40</span>
                            </div>
                        </div>

                        <!-- Button Eksekusi (DB Transaction Trigger S2-06) -->
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 rounded-lg text-sm shadow-md transition-colors flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            Konfirmasi Pembayaran Lunas
                        </button>
                        <p class="text-center text-[9px] text-slate-400 mt-3 flex items-center justify-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            Transaksi tercatat aman di Cloud Kasir BengkelCare
                        </p>
                    </div>

                    <!-- Antrean Kasir Berikutnya -->
                    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm flex-1">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-[11px] font-bold text-slate-700 uppercase tracking-wide">Antrean Kasir Berikutnya</h3>
                            <span class="text-[10px] text-blue-600 font-bold">2 Menunggu</span>
                        </div>
                        
                        <div class="space-y-3">
                            <!-- Antrean 1 -->
                            <div class="flex justify-between items-center bg-slate-50 p-3 rounded-lg border border-slate-100">
                                <div class="flex items-center gap-3">
                                    <div class="bg-white px-2 py-1 rounded text-[9px] font-bold text-slate-700 border border-slate-200">B 1984 VKA</div>
                                    <div>
                                        <p class="text-[11px] font-bold text-slate-800">Toyota Innova Reborn</p>
                                        <p class="text-[9px] text-slate-500">Dr. Ratna S. &bull; Ganti Oli & Kampas</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-[11px] font-bold text-slate-800">Rp 980.000</p>
                                    <p class="text-[9px] text-blue-600 font-bold">Selesai 14:05</p>
                                </div>
                            </div>
                            <!-- Antrean 2 -->
                            <div class="flex justify-between items-center bg-slate-50 p-3 rounded-lg border border-slate-100">
                                <div class="flex items-center gap-3">
                                    <div class="bg-white px-2 py-1 rounded text-[9px] font-bold text-slate-700 border border-slate-200">D 1414 AAZ</div>
                                    <div>
                                        <p class="text-[11px] font-bold text-slate-800">Mitsubishi Pajero Dakar</p>
                                        <p class="text-[9px] text-slate-500">Bpk. Kevin W. &bull; Spooring Balancing</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-[11px] font-bold text-slate-800">Rp 740.000</p>
                                    <p class="text-[9px] text-blue-600 font-bold">Selesai 14:12</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Monitoring Operasional Table -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mb-8">
                <!-- Header & Filters -->
                <div class="p-5 border-b border-slate-100 flex justify-between items-center">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Monitoring Operasional Servis & Inventori</h3>
                        <p class="text-[10px] text-slate-500 mt-0.5">Daftar unit aktif, status siklus servis, dan tracking pemakaian gudang suku cadang.</p>
                    </div>
                    <div class="flex gap-2 text-[10px] font-semibold">
                        <button class="bg-blue-600 text-white px-3 py-1.5 rounded-full shadow-sm flex items-center gap-1.5">Semua (18)</button>
                        <button class="bg-slate-50 text-slate-600 border border-slate-200 hover:bg-slate-100 px-3 py-1.5 rounded-full flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Menunggu (3)</button>
                        <button class="bg-slate-50 text-slate-600 border border-slate-200 hover:bg-slate-100 px-3 py-1.5 rounded-full flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span> Pemeriksaan (3)</button>
                        <button class="bg-slate-50 text-slate-600 border border-slate-200 hover:bg-slate-100 px-3 py-1.5 rounded-full flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> Pengerjaan (5)</button>
                        <button class="bg-slate-50 text-slate-600 border border-slate-200 hover:bg-slate-100 px-3 py-1.5 rounded-full flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Menunggu Sparepart (1)</button>
                        <button class="bg-slate-50 text-slate-600 border border-slate-200 hover:bg-slate-100 px-3 py-1.5 rounded-full flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Selesai (4)</button>
                        <button class="bg-slate-50 text-slate-600 border border-slate-200 hover:bg-slate-100 px-3 py-1.5 rounded-full flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Diambil (3)</button>
                    </div>
                </div>

                <!-- Table -->
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[9px] font-bold text-slate-500 uppercase tracking-wide border-b border-slate-100 bg-slate-50">
                            <th class="py-3 px-5">No. SPK & Waktu</th>
                            <th class="py-3 px-5">Identitas Kendaraan & Pelanggan</th>
                            <th class="py-3 px-5">Bay & Mekanik</th>
                            <th class="py-3 px-5">Status Siklus</th>
                            <th class="py-3 px-5">Suku Cadang Dikonsumsi</th>
                            <th class="py-3 px-5 text-right">Estimasi / Total</th>
                            <th class="py-3 px-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-[11px]">
                        <!-- Row 1: Selesai -->
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-3 px-5">
                                <p class="font-bold text-slate-800">SPK-0588</p>
                                <p class="text-[9px] text-slate-500 mt-0.5">Masuk: 13:10 WIB</p>
                            </td>
                            <td class="py-3 px-5">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-slate-800 bg-slate-100 px-1.5 py-0.5 rounded text-[10px]">B 2091 SZZ</span>
                                    <span class="font-bold text-slate-700">Honda HR-V 1.5</span>
                                </div>
                                <p class="text-[10px] text-slate-500 mt-1">Bpk. Hendra Gunawan</p>
                            </td>
                            <td class="py-3 px-5">
                                <p class="font-semibold text-slate-700">Bay 04 (Pit C)</p>
                                <p class="text-[10px] text-slate-500 mt-0.5">Joko Widodo</p>
                            </td>
                            <td class="py-3 px-5">
                                <span class="bg-blue-50 text-blue-700 border border-blue-100 px-2 py-1 rounded text-[10px] font-bold inline-flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> Selesai</span>
                            </td>
                            <td class="py-3 px-5">
                                <p class="text-[10px] font-medium text-slate-700 truncate w-48">Oli 0W-20 (4L), Oil Filter, Kampas Rem Dpn</p>
                                <p class="text-[9px] text-blue-600 font-bold mt-0.5">Auto-deducted (-3 SKU)</p>
                            </td>
                            <td class="py-3 px-5 text-right">
                                <p class="font-bold text-slate-800">Rp 1.703.018</p>
                                <p class="text-[9px] text-slate-500 font-medium mt-0.5">Unpaid</p>
                            </td>
                            <td class="py-3 px-5 text-center">
                                <button class="text-blue-600 hover:text-blue-800"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg></button>
                            </td>
                        </tr>

                        <!-- Row 2: Pengerjaan -->
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-3 px-5">
                                <p class="font-bold text-slate-800">SPK-0589</p>
                                <p class="text-[9px] text-slate-500 mt-0.5">Masuk: 13:45 WIB</p>
                            </td>
                            <td class="py-3 px-5">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-slate-800 bg-slate-100 px-1.5 py-0.5 rounded text-[10px]">B 1184 TAA</span>
                                    <span class="font-bold text-slate-700">Toyota Yaris GR Sport</span>
                                </div>
                                <p class="text-[10px] text-slate-500 mt-1">Ibu Citra Lestari</p>
                            </td>
                            <td class="py-3 px-5">
                                <p class="font-semibold text-slate-700">Bay 02 (Pit A)</p>
                                <p class="text-[10px] text-slate-500 mt-0.5">Rian Pratama</p>
                            </td>
                            <td class="py-3 px-5">
                                <span class="bg-blue-50 text-blue-700 border border-blue-100 px-2 py-1 rounded text-[10px] font-bold inline-flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span> Pengerjaan</span>
                            </td>
                            <td class="py-3 px-5">
                                <p class="text-[10px] font-medium text-slate-700 truncate w-48">Minyak Rem DOT4, Wiper Blade Hybrid (2x)</p>
                                <p class="text-[9px] text-blue-600 font-bold mt-0.5">Auto-deducted (-2 SKU)</p>
                            </td>
                            <td class="py-3 px-5 text-right">
                                <p class="font-bold text-slate-800">Rp 510.000</p>
                                <p class="text-[9px] text-slate-400 font-medium mt-0.5">Estimasi</p>
                            </td>
                            <td class="py-3 px-5 text-center">
                                <button class="text-slate-400 hover:text-slate-700"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg></button>
                            </td>
                        </tr>

                        <!-- Row 3: Menunggu Sparepart -->
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-3 px-5">
                                <p class="font-bold text-slate-800">SPK-0585</p>
                                <p class="text-[9px] text-slate-500 mt-0.5">Masuk: 11:20 WIB</p>
                            </td>
                            <td class="py-3 px-5">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-slate-800 bg-slate-100 px-1.5 py-0.5 rounded text-[10px]">B 9918 FQ</span>
                                    <span class="font-bold text-slate-700">Mitsubishi Xpander Ultimate</span>
                                </div>
                                <p class="text-[10px] text-slate-500 mt-1">Bpk. Agus Santoso</p>
                            </td>
                            <td class="py-3 px-5">
                                <p class="font-semibold text-slate-700">Bay 05 (Pit E)</p>
                                <p class="text-[10px] text-slate-500 mt-0.5">Hadi Firmansyah</p>
                            </td>
                            <td class="py-3 px-5">
                                <span class="bg-yellow-50 text-yellow-700 border border-yellow-200 px-2 py-1 rounded text-[10px] font-bold inline-flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Menunggu Sparepart</span>
                            </td>
                            <td class="py-3 px-5">
                                <p class="text-[10px] font-medium text-slate-700 truncate w-48">Shock Absorber Belakang (PO #8812)</p>
                                <p class="text-[9px] text-yellow-600 font-bold mt-0.5">Dalam Pengiriman Distributor</p>
                            </td>
                            <td class="py-3 px-5 text-right">
                                <p class="font-bold text-slate-800">Rp 2.150.000</p>
                                <p class="text-[9px] text-slate-400 font-medium mt-0.5">DP 50% Masuk</p>
                            </td>
                            <td class="py-3 px-5 text-center">
                                <button class="text-slate-400 hover:text-slate-700"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></button>
                            </td>
                        </tr>

                        <!-- Row 4: Diambil -->
                        <tr class="hover:bg-slate-50 transition-colors opacity-70">
                            <td class="py-3 px-5">
                                <p class="font-bold text-slate-800">SPK-0580</p>
                                <p class="text-[9px] text-slate-500 mt-0.5">Masuk: 09:15 WIB</p>
                            </td>
                            <td class="py-3 px-5">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-slate-800 bg-slate-100 px-1.5 py-0.5 rounded text-[10px]">F 1239 ZP</span>
                                    <span class="font-bold text-slate-700">Daihatsu Rocky 1.0 Turbo</span>
                                </div>
                                <p class="text-[10px] text-slate-500 mt-1">Ibu Melinda Tan</p>
                            </td>
                            <td class="py-3 px-5">
                                <p class="font-semibold text-slate-700">Bay 01 (Pit Quick)</p>
                                <p class="text-[10px] text-slate-500 mt-0.5">Arif Rahman</p>
                            </td>
                            <td class="py-3 px-5">
                                <span class="bg-slate-100 text-slate-600 border border-slate-200 px-2 py-1 rounded text-[10px] font-bold inline-flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Diambil</span>
                            </td>
                            <td class="py-3 px-5">
                                <p class="text-[10px] font-medium text-slate-700 truncate w-48">Oli Full-Synthetic, Filter Udara Mesin</p>
                                <p class="text-[9px] text-blue-600 font-bold mt-0.5">Stok Berkurang (-2 SKU)</p>
                            </td>
                            <td class="py-3 px-5 text-right">
                                <p class="font-bold text-slate-800 line-through text-slate-400">Rp 785.000</p>
                                <p class="text-[9px] text-green-600 font-bold mt-0.5">Lunas (QRIS)</p>
                            </td>
                            <td class="py-3 px-5 text-center">
                                <button class="text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Bottom Banner -->
                <div class="bg-[#F4F7FF] p-4 flex justify-between items-center border-t border-blue-100">
                    <div class="flex items-center gap-3">
                        <div class="text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 1l4 4-4 4"></path><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><path d="M7 23l-4-4 4-4"></path><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg></div>
                        <div>
                            <p class="text-[11px] font-bold text-slate-800">Otomasi Pemotongan Stok Suku Cadang (Inventory Sync)</p>
                            <p class="text-[10px] text-slate-500">Tiap faktur/SPK yang diterbitkan langsung mengurangi kartu stok gudang secara real-time dan terhubung ke laporan rugi-laba HPP.</p>
                        </div>
                    </div>
                    <span class="bg-white text-blue-700 border border-blue-100 text-[10px] font-bold px-3 py-1.5 rounded shadow-sm">Integrasi ERP Active</span>
                </div>
            </div>

        </main>
    </div>

</body>
</html>