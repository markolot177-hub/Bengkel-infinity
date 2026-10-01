<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok - BengkelCare</title>
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
                <a href="{{ route('dashboard.admin') ?? '#' }}" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Dashboard Admin
                </a>
                <a href="{{ route('kasir') ?? '#' }}" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    Monitoring Servis & Kasir
                </a>
                <!-- Manajemen Stok Aktif -->
                <a href="#" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    Manajemen Stok
                </a>
                <a href="{{ route('mekanik.workstation') ?? '#' }}" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    Workstation Mekanik
                </a>
                <a href="{{ route('portal') ?? '#' }}" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
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
                <input type="text" placeholder="Cari No. Polisi (cth: B 2841 SKL), No. Rangka, atau ID Pelanggan..." class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg pl-9 pr-3 py-1.5 text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div class="flex items-center gap-6">
                <!-- Role Switcher -->
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

                <!-- Profile Admin -->
                <div class="flex items-center gap-3 border-l border-slate-200 pl-6 cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-slate-300 overflow-hidden border border-slate-200">
                        <img src="https://ui-avatars.com/api/?name=Andi+Syarip&background=E2E8F0&color=1E293B" alt="Avatar">
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-800 uppercase">ANDI SYARIP</p>
                        <p class="text-[10px] text-slate-500 font-medium">Kepala Bengkel (Service Head)</p>
                    </div>
                    <svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
        </header>

        <!-- SCROLLABLE CONTENT -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            
            <!-- Breadcrumb & Auto-Sync Status -->
            <div class="flex justify-between items-center mb-4 text-[10px]">
                <div class="flex items-center gap-2 text-slate-500">
                    <span class="hover:text-blue-600 cursor-pointer">Gudang & Logistik</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    <span class="hover:text-blue-600 cursor-pointer font-bold">Manajemen Suku Cadang & Pelumas</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    <span class="text-slate-800 font-bold uppercase">BENGKEL-PUSAT-WH01</span>
                </div>
                <div class="flex items-center gap-4 text-slate-500 font-medium">
                    <span class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse"></span> Auto-Sync POS SPK: <span class="text-blue-600 font-bold">Aktif</span></span>
                    <span>Update: Hari ini, 14:32 WIB</span>
                </div>
            </div>

            <!-- Page Header -->
            <div class="flex justify-between items-start mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-xl flex items-center justify-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-slate-900 tracking-tight">Manajemen Stok & Inventori Suku Cadang</h2>
                        <p class="text-[11px] text-slate-500 mt-1">Monitoring ketersediaan sparepart, oli/pelumas, ambang batas minimum otomatis, integrasi pemotongan SPK, dan purchase order terpadu.</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold px-4 py-2 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Ekspor Rekap
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <button class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                        Catat Barang Masuk
                    </button>
                    <button class="bg-slate-900 hover:bg-black text-white text-xs font-bold px-4 py-2 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Tambah Suku Cadang
                    </button>
                </div>
            </div>

            <!-- Dashboard Summary Grid -->
            <div class="grid grid-cols-4 gap-6 mb-6">
                <!-- TOTAL ITEM -->
                <div class="col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">TOTAL ITEM AKTIF</p>
                            <div class="flex items-baseline gap-1 mt-1">
                                <h3 class="text-3xl font-black text-slate-800">428</h3>
                                <span class="text-[11px] text-slate-500 font-medium">SKU</span>
                            </div>
                        </div>
                        <div class="bg-blue-50 p-2 rounded-lg text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-end border-t border-slate-100 pt-3">
                        <div>
                            <p class="text-[10px] text-slate-500 font-medium mb-1">Total Valuasi Aset:</p>
                            <div class="flex gap-2">
                                <span class="bg-slate-100 text-slate-600 text-[9px] font-bold px-2 py-0.5 rounded">12 Kategori</span>
                                <span class="bg-slate-100 text-slate-600 text-[9px] font-bold px-2 py-0.5 rounded">3 Gudang Penyimpanan</span>
                            </div>
                        </div>
                        <h4 class="text-lg font-black text-blue-600">Rp 184.500.000</h4>
                    </div>
                </div>

                <!-- STOK KRITIS -->
                <div class="col-span-2 bg-white rounded-xl border border-red-100 p-5 shadow-sm flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-red-500"></div>
                    <div class="flex justify-between items-start mb-4 pl-2">
                        <div>
                            <p class="text-[10px] font-bold text-red-600 uppercase tracking-wide">STOK KRITIS / HABIS</p>
                            <div class="flex items-baseline gap-1 mt-1">
                                <h3 class="text-3xl font-black text-red-600">8</h3>
                                <span class="text-[11px] text-red-500 font-medium">Item</span>
                            </div>
                        </div>
                        <div class="bg-red-50 p-2 rounded-lg text-red-600 border border-red-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        </div>
                    </div>
                    <div class="flex justify-between items-end border-t border-red-50 pt-3 pl-2">
                        <div>
                            <p class="text-[10px] text-slate-500 font-medium mb-1">Status Gudang:</p>
                            <p class="text-[9px] text-slate-400">3 item mempengaruhi 5 jadwal servis aktif hari ini</p>
                        </div>
                        <span class="bg-red-100 text-red-700 text-[10px] font-black px-2 py-1 rounded flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span> Perlu Reorder Cepat</span>
                    </div>
                </div>
            </div>

            <!-- Filters & Actions Area -->
            <div class="bg-white rounded-t-xl border-x border-t border-slate-200 p-4">
                <div class="flex gap-3 mb-4">
                    <!-- Search Box -->
                    <div class="relative flex-1">
                        <svg class="absolute left-3 top-2.5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" placeholder="Cari nama part, kode OEM, kecocokan mobil (cth: Bendix, TMO, NS40ZL, Avanza)..." class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg pl-9 pr-8 py-2 text-xs focus:outline-none focus:border-blue-500">
                        <button class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg></button>
                    </div>
                    <!-- Rak Filter -->
                    <div class="relative w-48">
                        <select class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg pl-3 pr-8 py-2 text-xs text-slate-600 appearance-none focus:outline-none focus:border-blue-500 font-medium">
                            <option>Semua Lokasi Rak</option>
                        </select>
                        <svg class="absolute right-3 top-2.5 text-slate-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                    <!-- Status Filter -->
                    <div class="relative w-48">
                        <select class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg pl-3 pr-8 py-2 text-xs text-slate-600 appearance-none focus:outline-none focus:border-blue-500 font-medium">
                            <option>Semua Status Stok</option>
                        </select>
                        <svg class="absolute right-3 top-2.5 text-slate-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                    <button class="bg-[#F8FAFC] border border-slate-200 hover:bg-slate-50 text-slate-600 p-2 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3h18v18H3z"></path><path d="M12 8v8"></path><path d="M8 12h8"></path></svg></button>
                </div>

                <!-- Chips/Tags -->
                <div class="flex gap-2 text-[10px] font-bold">
                    <button class="bg-blue-600 text-white px-3 py-1.5 rounded shadow-sm flex items-center gap-1.5">Semua Part <span class="bg-blue-700 text-white px-1.5 py-0.5 rounded text-[8px]">428</span></button>
                    <button class="bg-slate-50 border border-slate-200 text-slate-600 hover:bg-slate-100 px-3 py-1.5 rounded flex items-center gap-1.5">Oli & Pelumas <span class="bg-slate-200 text-slate-600 px-1.5 py-0.5 rounded text-[8px]">34</span></button>
                    <button class="bg-slate-50 border border-slate-200 text-slate-600 hover:bg-slate-100 px-3 py-1.5 rounded flex items-center gap-1.5">Sistem Pengereman <span class="bg-slate-200 text-slate-600 px-1.5 py-0.5 rounded text-[8px]">52</span></button>
                    <button class="bg-slate-50 border border-slate-200 text-slate-600 hover:bg-slate-100 px-3 py-1.5 rounded flex items-center gap-1.5">Filter Udara & Oli <span class="bg-slate-200 text-slate-600 px-1.5 py-0.5 rounded text-[8px]">41</span></button>
                    <button class="bg-slate-50 border border-slate-200 text-slate-600 hover:bg-slate-100 px-3 py-1.5 rounded flex items-center gap-1.5">Kelistrikan & Aki <span class="bg-slate-200 text-slate-600 px-1.5 py-0.5 rounded text-[8px]">28</span></button>
                    <button class="bg-red-50 border border-red-200 text-red-600 hover:bg-red-100 px-3 py-1.5 rounded flex items-center gap-1.5"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Stok Kritis <span class="bg-red-600 text-white px-1.5 py-0.5 rounded text-[8px]">8</span></button>
                </div>
            </div>

            <!-- Main Layout (Table & Sidebar) -->
            <div class="grid grid-cols-4 gap-6">
                
                <!-- MAIN TABLE AREA (Col 1-3) -->
                <div class="col-span-3">
                    <div class="bg-white border-x border-b border-slate-200 rounded-b-xl shadow-sm overflow-hidden mb-6">
                        
                        <!-- Batch Actions -->
                        <div class="px-4 py-3 border-b border-slate-100 bg-slate-50 flex justify-between items-center text-[11px]">
                            <div class="flex items-center gap-4">
                                <label class="flex items-center gap-2 cursor-pointer text-slate-600 font-medium">
                                    <input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                    Pilih Semua (8 item dipilih)
                                </label>
                                <div class="w-px h-4 bg-slate-300"></div>
                                <button class="text-blue-600 font-bold hover:underline flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> Cetak Barcode Label
                                </button>
                                <button class="text-blue-600 font-bold hover:underline flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> Masukkan ke Draft PO
                                </button>
                            </div>
                            <span class="text-slate-500 font-medium">Menampilkan <span class="font-bold text-slate-800">1-7</span> dari <span class="font-bold text-slate-800">428</span> item</span>
                        </div>

                        <!-- Data Table -->
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-[9px] font-bold text-slate-500 uppercase tracking-wide bg-slate-100 border-b border-slate-200">
                                    <th class="py-3 px-4 w-10 text-center"></th>
                                    <th class="py-3 px-4">Informasi Suku Cadang</th>
                                    <th class="py-3 px-4 w-32">Kategori & Kompatibilitas</th>
                                    <th class="py-3 px-4 w-20 text-center">Lokasi Rak</th>
                                    <th class="py-3 px-4 w-28 text-right">HPP / Harga Jual</th>
                                    <th class="py-3 px-4 w-36">Status Kuantitas Stok</th>
                                    <th class="py-3 px-4 w-24 text-center">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-[11px]">
                                <!-- Row 1 -->
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-4 text-center"><input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-blue-600"></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-slate-100 rounded border border-slate-200 flex items-center justify-center overflow-hidden shrink-0">
                                                <img src="https://via.placeholder.com/40x40/f1f5f9/64748b?text=Oli" alt="Part" class="object-cover">
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-slate-900 text-sm">Oli Mesin TMO 5W-30 (4L) Synthetic</h4>
                                                <div class="flex items-center gap-2 mt-0.5 text-[9px] text-slate-500">
                                                    <span class="font-bold text-slate-700 bg-slate-100 px-1 rounded">TMO-5W30-4L</span>
                                                    <span>&bull; OEM Toyota Genuine</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-[10px]">
                                        <p class="font-bold text-slate-800 mb-0.5">Pelumas Mesin</p>
                                        <p class="text-slate-500 leading-tight">Innova, Fortuner Bensin, Avanza</p>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <span class="bg-blue-50 text-blue-700 border border-blue-100 px-1.5 py-1 rounded text-[9px] font-bold inline-flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg> RAK A-02</span>
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <p class="font-black text-slate-900 text-[13px]">Rp 385.000</p>
                                        <div class="flex justify-end items-center gap-1 mt-0.5 text-[9px]">
                                            <span class="text-slate-400">Beli: Rp 295.000</span>
                                            <span class="text-green-600 font-bold">(+30%)</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex justify-between text-[10px] font-bold mb-1">
                                            <span class="text-orange-600">Sisa 6 Galon</span>
                                            <span class="text-slate-400 font-medium">Min: 12 Galon</span>
                                        </div>
                                        <div class="w-full bg-slate-100 h-1.5 rounded-full mb-1.5"><div class="bg-orange-500 h-1.5 rounded-full" style="width: 50%"></div></div>
                                        <p class="text-[9px] text-orange-600 font-bold flex items-center gap-1"><span class="w-1 h-1 rounded-full bg-orange-600"></span> Menipis (Buffer 50%)</p>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <button class="bg-blue-50 hover:bg-blue-100 text-blue-700 border border-blue-200 px-3 py-1.5 rounded text-[10px] font-bold flex items-center gap-1 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> Order</button>
                                            <button class="text-slate-400 hover:text-slate-700 p-1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Row 2 (KRITIS) -->
                                <tr class="bg-red-50/30 hover:bg-red-50/50 transition-colors">
                                    <td class="py-4 px-4 text-center"><input type="checkbox" checked class="w-3.5 h-3.5 rounded border-slate-300 text-blue-600"></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-white rounded border border-red-200 flex items-center justify-center overflow-hidden shrink-0">
                                                <img src="https://via.placeholder.com/40x40/fee2e2/ef4444?text=B" alt="Part" class="object-cover">
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-slate-900 text-sm flex items-center gap-2">Bendix Stealth Front Brake Pad <span class="bg-red-600 text-white text-[8px] px-1.5 py-0.5 rounded uppercase tracking-wider">Kritis</span></h4>
                                                <div class="flex items-center gap-2 mt-0.5 text-[9px] text-slate-500">
                                                    <span class="font-bold text-slate-700 bg-white border border-slate-200 px-1 rounded">BDX-DB1831</span>
                                                    <span>&bull; Bendix Official</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-[10px]">
                                        <p class="font-bold text-slate-800 mb-0.5">Sistem Pengereman</p>
                                        <p class="text-slate-500 leading-tight">Honda HR-V, Jazz GK5, City</p>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <span class="bg-blue-50 text-blue-700 border border-blue-100 px-1.5 py-1 rounded text-[9px] font-bold inline-flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg> RAK B-14</span>
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <p class="font-black text-slate-900 text-[13px]">Rp 460.000</p>
                                        <div class="flex justify-end items-center gap-1 mt-0.5 text-[9px]">
                                            <span class="text-slate-400">Beli: Rp 345.000</span>
                                            <span class="text-green-600 font-bold">(+33%)</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex justify-between text-[10px] font-bold mb-1">
                                            <span class="text-red-600">Sisa 2 Set</span>
                                            <span class="text-slate-500 font-medium">Min: 10 Set</span>
                                        </div>
                                        <div class="w-full bg-slate-200 h-1.5 rounded-full mb-1.5"><div class="bg-red-600 h-1.5 rounded-full" style="width: 20%"></div></div>
                                        <p class="text-[9px] text-red-600 font-bold flex items-center gap-1"><span class="w-1 h-1 rounded-full bg-red-600 animate-pulse"></span> Di Bawah Batas Aman</p>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <button class="bg-red-600 hover:bg-red-700 text-white px-2.5 py-1.5 rounded text-[10px] font-bold flex items-center gap-1 shadow-sm transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Reorder PO</button>
                                            <button class="text-slate-400 hover:text-slate-700 p-1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Row 3 -->
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-4 text-center"><input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-blue-600"></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-slate-100 rounded border border-slate-200 flex items-center justify-center overflow-hidden shrink-0">
                                                <img src="https://via.placeholder.com/40x40/f1f5f9/64748b?text=Flt" alt="Part" class="object-cover">
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-slate-900 text-sm">Filter Oli Mesin Yaris / Vios / Avanza</h4>
                                                <div class="flex items-center gap-2 mt-0.5 text-[9px] text-slate-500">
                                                    <span class="font-bold text-slate-700 bg-slate-100 px-1 rounded">TY-90915-YZZE1</span>
                                                    <span>&bull; Denso OEM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-[10px]">
                                        <p class="font-bold text-slate-800 mb-0.5">Filter Suku Cadang</p>
                                        <p class="text-slate-500 leading-tight">Toyota All 1.3L & 1.5L</p>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <span class="bg-blue-50 text-blue-700 border border-blue-100 px-1.5 py-1 rounded text-[9px] font-bold inline-flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg> RAK C-01</span>
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <p class="font-black text-slate-900 text-[13px]">Rp 48.000</p>
                                        <div class="flex justify-end items-center gap-1 mt-0.5 text-[9px]">
                                            <span class="text-slate-400">Beli: Rp 32.500</span>
                                            <span class="text-green-600 font-bold">(+47%)</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex justify-between text-[10px] font-bold mb-1">
                                            <span class="text-green-600">Sisa 54 Pcs</span>
                                            <span class="text-slate-400 font-medium">Min: 15 Pcs</span>
                                        </div>
                                        <div class="w-full bg-slate-100 h-1.5 rounded-full mb-1.5"><div class="bg-green-500 h-1.5 rounded-full" style="width: 100%"></div></div>
                                        <p class="text-[9px] text-green-600 font-bold flex items-center gap-1"><span class="w-1 h-1 rounded-full bg-green-500"></span> Ketersediaan Aman</p>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <button class="bg-slate-50 hover:bg-slate-100 text-slate-700 border border-slate-200 px-3 py-1.5 rounded text-[10px] font-bold flex items-center gap-1 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Opname</button>
                                            <button class="text-slate-400 hover:text-slate-700 p-1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Row 4 -->
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-4 px-4 text-center"><input type="checkbox" class="w-3.5 h-3.5 rounded border-slate-300 text-blue-600"></td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-slate-100 rounded border border-slate-200 flex items-center justify-center overflow-hidden shrink-0">
                                                <img src="https://via.placeholder.com/40x40/f1f5f9/64748b?text=Aki" alt="Part" class="object-cover">
                                            </div>
                                            <div>
                                                <h4 class="font-bold text-slate-900 text-sm">Aki GS Astra Hybrid NS40ZL (35Ah)</h4>
                                                <div class="flex items-center gap-2 mt-0.5 text-[9px] text-slate-500">
                                                    <span class="font-bold text-slate-700 bg-slate-100 px-1 rounded">GS-HYB-NS40ZL</span>
                                                    <span>&bull; Garansi Resmi 12 Bln</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-[10px]">
                                        <p class="font-bold text-slate-800 mb-0.5">Kelistrikan & Aki</p>
                                        <p class="text-slate-500 leading-tight">Brio, Calya, Sigra, Agya, Ayla</p>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <span class="bg-blue-50 text-blue-700 border border-blue-100 px-1.5 py-1 rounded text-[9px] font-bold inline-flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg> GD-BLK-03</span>
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <p class="font-black text-slate-900 text-[13px]">Rp 820.000</p>
                                        <div class="flex justify-end items-center gap-1 mt-0.5 text-[9px]">
                                            <span class="text-slate-400">Beli: Rp 670.000</span>
                                            <span class="text-green-600 font-bold">(+22%)</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex justify-between text-[10px] font-bold mb-1">
                                            <span class="text-green-600">Sisa 11 Unit</span>
                                            <span class="text-slate-400 font-medium">Min: 5 Unit</span>
                                        </div>
                                        <div class="w-full bg-slate-100 h-1.5 rounded-full mb-1.5"><div class="bg-green-500 h-1.5 rounded-full" style="width: 80%"></div></div>
                                        <p class="text-[9px] text-green-600 font-bold flex items-center gap-1"><span class="w-1 h-1 rounded-full bg-green-500"></span> Normal</p>
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <button class="bg-slate-50 hover:bg-slate-100 text-slate-700 border border-slate-200 px-3 py-1.5 rounded text-[10px] font-bold flex items-center gap-1 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Opname</button>
                                            <button class="text-slate-400 hover:text-slate-700 p-1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        
                        <!-- Pagination -->
                        <div class="px-4 py-3 bg-white border-t border-slate-200 flex justify-between items-center text-[11px] text-slate-500 rounded-b-xl">
                            <div class="flex items-center gap-3">
                                <span>Baris per halaman:</span>
                                <select class="bg-[#F8FAFC] border border-slate-200 rounded px-2 py-1 outline-none font-medium text-slate-700">
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                </select>
                                <span>Total 428 suku cadang terdaftar</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <button class="w-7 h-7 rounded border border-slate-200 flex items-center justify-center hover:bg-slate-50"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg></button>
                                <button class="w-7 h-7 rounded bg-blue-600 text-white font-bold flex items-center justify-center shadow-sm">1</button>
                                <button class="w-7 h-7 rounded border border-slate-200 hover:bg-slate-50 font-bold flex items-center justify-center">2</button>
                                <button class="w-7 h-7 rounded border border-slate-200 hover:bg-slate-50 font-bold flex items-center justify-center">3</button>
                                <span>...</span>
                                <button class="w-7 h-7 rounded border border-slate-200 hover:bg-slate-50 font-bold flex items-center justify-center">43</button>
                                <button class="w-7 h-7 rounded border border-slate-200 flex items-center justify-center hover:bg-slate-50"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6" transform="matrix(-1 0 0 1 24 0)"></polyline></svg></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDEBAR: Urgent Restock (Col 4) -->
                <div class="col-span-1">
                    <div class="bg-white rounded-xl border border-red-200 shadow-sm overflow-hidden sticky top-6">
                        <div class="p-4 border-b border-red-100 bg-red-50/50 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <div class="bg-red-100 text-red-600 p-1.5 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-900 text-sm">Peringatan Restock Darurat</h3>
                                    <p class="text-[9px] text-slate-500">Saran otomatis berbasis lead-time supplier</p>
                                </div>
                            </div>
                            <span class="bg-red-600 text-white text-[9px] font-bold px-2 py-0.5 rounded-full shadow-sm">3 Urgent</span>
                        </div>
                        
                        <div class="p-4 space-y-4">
                            <!-- Urgent 1 -->
                            <div class="border-b border-slate-100 pb-3">
                                <div class="flex justify-between items-start mb-1">
                                    <p class="text-[11px] font-bold text-slate-800">Fan Belt Bando 6PK-1810</p>
                                    <span class="text-[8px] bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded font-bold border border-slate-200">CR-V / Civic</span>
                                </div>
                                <p class="text-[10px] text-red-600 font-bold mb-1.5">Stok: 0 Pcs (Min. 6 Pcs)</p>
                                <p class="text-[9px] text-slate-500">Supplier: <span class="font-semibold text-slate-700">PT Astra Otoparts</span></p>
                            </div>

                            <!-- Urgent 2 -->
                            <div class="border-b border-slate-100 pb-3">
                                <div class="flex justify-between items-start mb-1">
                                    <p class="text-[11px] font-bold text-slate-800">Bendix Stealth Brake Pad</p>
                                    <span class="text-[8px] bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded font-bold border border-slate-200">Honda HR-V</span>
                                </div>
                                <p class="text-[10px] text-red-600 font-bold mb-1.5">Stok: 2 Set (Min. 10 Set)</p>
                                <p class="text-[9px] text-slate-500">Supplier: <span class="font-semibold text-slate-700">Bendix ID Prima</span></p>
                            </div>

                            <!-- Urgent 3 -->
                            <div>
                                <div class="flex justify-between items-start mb-1">
                                    <p class="text-[11px] font-bold text-slate-800">Brake Fluid DOT 4 Prestone</p>
                                    <span class="text-[8px] bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded font-bold border border-slate-200">Universal</span>
                                </div>
                                <p class="text-[10px] text-red-600 font-bold mb-1.5">Stok: 1 Btl (Min. 8 Btl)</p>
                                <p class="text-[9px] text-slate-500">Supplier: <span class="font-semibold text-slate-700">PT Pertamina Lub</span></p>
                            </div>
                        </div>

                        <div class="p-4 bg-slate-50 border-t border-slate-100">
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white text-[11px] font-bold py-2.5 rounded-lg shadow-sm flex items-center justify-center gap-2 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                Generate PO Massal (3 item)
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>

</body>
</html>