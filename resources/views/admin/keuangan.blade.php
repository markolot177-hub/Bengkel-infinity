<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
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
                <a href="#" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Dashboard Admin
                </a>
                <a href="#" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    Monitoring Servis & Kasir
                </a>
                
                <!-- Menu Laporan Pendapatan Aktif -->
                <a href="#" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    Laporan Keuangan
                </a>
                
                <a href="#" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    Manajemen Stok
                </a>
                <a href="#" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    Workstation Mekanik
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
                        <p class="text-xs font-bold text-slate-800 uppercase">ANDI SYARIP</p>
                        <p class="text-[10px] text-slate-500 font-medium">Kepala Bengkel (Service Head)</p>
                    </div>
                    <svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
        </header>

        <!-- SCROLLABLE CONTENT -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            
            <!-- Breadcrumb -->
            <div class="flex text-[10px] text-slate-500 mb-3 gap-2 items-center">
                <span class="hover:text-blue-600 cursor-pointer">Keuangan & Kasir</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span class="hover:text-blue-600 cursor-pointer">Laporan Pendapatan & Omset</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                <span class="font-bold text-slate-800">Bengkel Pusat</span>
            </div>

            <!-- Page Header -->
            <div class="flex justify-between items-start mb-6 border-b border-slate-200 pb-5">
                <div>
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                        Laporan Pendapatan & Analitik Finansial
                        <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2.5 py-1 rounded-full flex items-center gap-1.5 border border-blue-100 uppercase tracking-wide"><span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> Data Terkonsolidasi</span>
                    </h2>
                    <p class="text-xs text-slate-500 mt-1.5">Monitoring arus pendapatan bengkel secara komprehensif: harian, mingguan, dan bulanan dengan rincian jasa servis, penjualan suku cadang, dan metode pembayaran.</p>
                </div>
                <div class="flex gap-3 items-center">
                    <div class="flex items-center bg-white border border-slate-200 rounded-lg px-3 py-2 text-xs font-semibold text-slate-700 shadow-sm gap-2">
                        <svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        Periode: <span class="text-slate-900">Oktober 2024</span>
                        <svg class="text-slate-400 ml-2" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </div>
                    <button class="bg-white border border-slate-200 hover:bg-slate-50 text-blue-600 text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Ekspor PDF / Excel
                    </button>
                    <button class="bg-slate-900 hover:bg-black text-white text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        Cetak Laporan Tutup Buku
                    </button>
                </div>
            </div>

            <!-- Nav Tabs -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex bg-white border border-slate-200 rounded-lg p-1 text-xs font-semibold shadow-sm">
                    <button class="px-4 py-1.5 text-slate-500 hover:text-slate-800 rounded">Ringkasan Harian <span class="font-normal text-[10px] ml-1">(24 Okt 2024)</span></button>
                    <button class="px-4 py-1.5 text-slate-500 hover:text-slate-800 rounded">Performa Mingguan <span class="font-normal text-[10px] ml-1">(W4 Okt)</span></button>
                    <button class="px-4 py-1.5 bg-blue-600 text-white rounded shadow-sm">Tren Bulanan <span class="font-normal text-blue-200 text-[10px] ml-1">(Okt 2024)</span></button>
                </div>
                <div class="text-[10px] font-semibold text-slate-500 flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                    Sinkronisasi Pembukuan Terakhir: <span class="text-slate-800">15:42 WIB</span>
                    <svg class="text-slate-400 ml-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"></polyline><path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path></svg>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-4 gap-5 mb-6">
                <!-- Stat 1 -->
                <div class="bg-white rounded-xl border border-blue-100 p-5 shadow-sm shadow-blue-50/50">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center gap-2 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                            <span class="text-[10px] font-bold uppercase tracking-wide">TOTAL OMSET BULAN INI</span>
                        </div>
                        <span class="bg-emerald-50 text-emerald-700 text-[9px] font-bold px-1.5 py-0.5 rounded flex items-center gap-0.5"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 17 9 11 13 15 21 7"></polyline><polyline points="14 7 21 7 21 14"></polyline></svg> +14.2%</span>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4">Rp 148.750.000</h3>
                    <div>
                        <div class="flex justify-between text-[10px] mb-1">
                            <span class="text-slate-500">Target: Rp 160.000.000</span>
                            <span class="font-bold text-blue-600">92.9%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mb-3"><div class="bg-blue-600 h-1.5 rounded-full" style="width: 92.9%"></div></div>
                        <div class="flex justify-between text-[10px] pt-3 border-t border-slate-100">
                            <span class="text-slate-500">Selisih ke Target:</span>
                            <span class="font-bold text-slate-800">Rp 11.250.000 lagi</span>
                        </div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center gap-2 text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <span class="text-[10px] font-bold uppercase tracking-wide">PENDAPATAN MINGGU INI</span>
                        </div>
                        <span class="bg-emerald-50 text-emerald-700 text-[9px] font-bold px-1.5 py-0.5 rounded flex items-center gap-0.5"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 17 9 11 13 15 21 7"></polyline><polyline points="14 7 21 7 21 14"></polyline></svg> +8.5%</span>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-2">Rp 36.420.000</h3>
                    <p class="text-[11px] text-slate-500 flex items-center gap-1.5 mb-5"><svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg> Volume unit: <span class="font-bold text-slate-700">84 unit</span> kendaraan selesai</p>
                    <div class="flex justify-between items-center text-[10px] pt-3 border-t border-slate-100 bg-slate-50 px-3 py-2 rounded -mx-1">
                        <span class="text-slate-500">Rata-rata / Hari:</span>
                        <span class="font-bold text-slate-800">Rp 7.284.000</span>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center gap-2 text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <span class="text-[10px] font-bold uppercase tracking-wide">PENDAPATAN HARI INI</span>
                        </div>
                        <span class="bg-blue-50 text-blue-600 border border-blue-100 text-[9px] font-bold px-1.5 py-0.5 rounded">14 SPK Lunas</span>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-2">Rp 6.850.000</h3>
                    <div class="flex justify-between text-[11px] mb-5">
                        <span class="text-slate-500">Rata-rata per tiket/faktur:</span>
                        <span class="font-bold text-slate-800">Rp 489.285</span>
                    </div>
                    <div class="flex justify-between items-center text-[10px] pt-3 border-t border-emerald-100 bg-emerald-50/50 px-3 py-2 rounded -mx-1 text-emerald-700">
                        <span class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Target Harian</span>
                        <span class="font-bold">97.8% (Target 7jt)</span>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center gap-2 text-amber-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                            <span class="text-[10px] font-bold uppercase tracking-wide">LABA OPERASIONAL (EST.)</span>
                        </div>
                        <span class="bg-amber-50 text-amber-700 text-[9px] font-bold px-1.5 py-0.5 rounded">Margin 28.6%</span>
                    </div>
                    <h3 class="text-2xl font-black text-emerald-600 mb-2">Rp 42.600.000</h3>
                    <p class="text-[10px] text-slate-500 mb-6">Setelah HPP sparepart & estimasi bagi hasil mekanik</p>
                    <div class="flex justify-between items-center text-[10px] pt-3 border-t border-slate-100">
                        <span class="text-slate-500">Beban HPP Sparepart:</span>
                        <span class="font-bold text-slate-800">Rp 51.400.000</span>
                    </div>
                </div>
            </div>

            <!-- Middle Section: Charts & Composition -->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <!-- Bar Chart Area -->
                <div class="col-span-2 bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="font-bold text-slate-900 text-base">Tren Dinamika Pendapatan Bulanan</h3>
                            <p class="text-[10px] text-slate-500 mt-0.5">Perbandingan akumulasi omset kotor vs estimasi beban pengeluaran suku cadang per pekan</p>
                        </div>
                        <div class="flex bg-slate-50 border border-slate-200 rounded p-0.5 text-[10px] font-medium">
                            <button class="bg-white shadow-sm rounded px-3 py-1 font-bold text-slate-800">Omset Total</button>
                            <button class="px-3 py-1 text-slate-500 hover:text-slate-800">Vs HPP</button>
                        </div>
                    </div>

                    <!-- CSS Bar Chart (Simplified representation based on screenshot) -->
                    <div class="relative h-48 w-full border-b border-slate-200 flex items-end justify-around pb-2 mt-8">
                        <!-- Y-axis labels -->
                        <div class="absolute left-0 top-0 bottom-0 flex flex-col justify-between text-[10px] text-slate-400 w-8">
                            <span>50M</span>
                            <span>35M</span>
                            <span>20M</span>
                            <span>5M</span>
                        </div>
                        <!-- Horizontal Grid Lines -->
                        <div class="absolute left-8 right-0 top-0 h-px bg-slate-100"></div>
                        <div class="absolute left-8 right-0 top-[33%] h-px bg-slate-100"></div>
                        <div class="absolute left-8 right-0 top-[66%] h-px bg-slate-100"></div>

                        <!-- Bars Container (offset for y-axis) -->
                        <div class="flex-1 ml-10 flex justify-around items-end h-full relative z-10 px-4">
                            
                            <!-- W1 -->
                            <div class="flex flex-col items-center group w-16">
                                <span class="text-[11px] font-bold text-slate-800 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">32.5M</span>
                                <div class="flex items-end gap-1 w-full justify-center">
                                    <div class="bg-blue-500 hover:bg-blue-600 transition-colors w-8 rounded-t-sm" style="height: 55%;"></div>
                                    <div class="bg-slate-200 w-4 rounded-t-sm" style="height: 25%;"></div>
                                </div>
                                <span class="text-[10px] text-slate-500 mt-3 font-medium">W1 (1-7 Okt)</span>
                            </div>

                            <!-- W2 -->
                            <div class="flex flex-col items-center group w-16">
                                <span class="text-[11px] font-bold text-slate-800 mb-2 opacity-0 group-hover:opacity-100 transition-opacity">38.2M</span>
                                <div class="flex items-end gap-1 w-full justify-center">
                                    <div class="bg-blue-500 hover:bg-blue-600 transition-colors w-8 rounded-t-sm" style="height: 65%;"></div>
                                    <div class="bg-slate-200 w-4 rounded-t-sm" style="height: 30%;"></div>
                                </div>
                                <span class="text-[10px] text-slate-500 mt-3 font-medium">W2 (8-14 Okt)</span>
                            </div>

                            <!-- W3 -->
                            <div class="flex flex-col items-center w-16">
                                <span class="text-[11px] font-bold text-blue-600 mb-2">41.6M</span>
                                <div class="flex items-end gap-1 w-full justify-center relative">
                                    <div class="absolute -top-1.5 left-2 w-1.5 h-1.5 rounded-full bg-blue-600"></div>
                                    <div class="bg-blue-600 w-8 rounded-t-sm" style="height: 75%;"></div>
                                    <div class="bg-slate-200 w-4 rounded-t-sm" style="height: 35%;"></div>
                                </div>
                                <span class="text-[10px] text-slate-800 mt-3 font-bold">W3 (15-21 Okt)</span>
                            </div>

                            <!-- W4 -->
                            <div class="flex flex-col items-center group w-16">
                                <span class="text-[11px] font-bold text-slate-800 mb-2">36.4M*</span>
                                <div class="flex items-end gap-1 w-full justify-center">
                                    <div class="bg-blue-500 hover:bg-blue-600 transition-colors w-8 rounded-t-sm" style="height: 60%;"></div>
                                    <div class="bg-slate-200 w-4 rounded-t-sm" style="height: 28%;"></div>
                                </div>
                                <span class="text-[10px] text-blue-600 mt-3 font-bold">W4 (22-28 Okt)</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-4 bg-slate-50 p-2.5 rounded-lg text-[10px]">
                        <div class="flex gap-4 items-center">
                            <span class="flex items-center gap-1.5 font-medium text-slate-700"><span class="w-2.5 h-2.5 rounded-sm bg-blue-600"></span> Omset Pendapatan Bruto</span>
                            <span class="flex items-center gap-1.5 font-medium text-slate-500"><span class="w-2.5 h-2.5 rounded-sm bg-slate-200"></span> Beban HPP Sparepart</span>
                        </div>
                        <span class="text-slate-500 italic">*Minggu ke-4 tersisa 4 hari operasional</span>
                    </div>
                </div>

                <!-- Right Sidebar (Komposisi & Metode Bayar) -->
                <div class="col-span-1 space-y-6">
                    <!-- Komposisi -->
                    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-slate-900 text-sm">Komposisi Sumber Omset</h3>
                                <p class="text-[9px] text-slate-500 mt-0.5">Proporsi Jasa Pekerjaan vs Penjualan Suku Cadang</p>
                            </div>
                            <button class="text-slate-400 hover:text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 2a10 10 0 0 1 10 10"></path></svg></button>
                        </div>
                        
                        <!-- Stacked Bar -->
                        <div class="flex w-full h-2 rounded-full overflow-hidden mb-5">
                            <div class="bg-blue-600 h-full" style="width: 46%"></div>
                            <div class="bg-slate-700 h-full" style="width: 49%"></div>
                            <div class="bg-amber-400 h-full" style="width: 5%"></div>
                        </div>

                        <div class="space-y-4">
                            <!-- Item 1 -->
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-blue-600 mt-1.5 shrink-0"></div>
                                    <div>
                                        <p class="text-[11px] font-bold text-slate-800 leading-none">Jasa Servis & Perawatan</p>
                                        <p class="text-[9px] text-slate-500 mt-1">Biaya mekanik & kalibrasi bengkel</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-[11px] font-bold text-slate-900">Rp 68.425.000</p>
                                    <p class="text-[9px] text-blue-600 font-bold">46.0%</p>
                                </div>
                            </div>
                            <!-- Item 2 -->
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-slate-700 mt-1.5 shrink-0"></div>
                                    <div>
                                        <p class="text-[11px] font-bold text-slate-800 leading-none">Suku Cadang & Oli Pelumas</p>
                                        <p class="text-[9px] text-slate-500 mt-1">Fast-moving, ban & genuine parts</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-[11px] font-bold text-slate-900">Rp 72.825.000</p>
                                    <p class="text-[9px] text-slate-700 font-bold">49.0%</p>
                                </div>
                            </div>
                            <!-- Item 3 -->
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-amber-400 mt-1.5 shrink-0"></div>
                                    <div>
                                        <p class="text-[11px] font-bold text-slate-800 leading-none">Cuci, Detailing & Aksesori</p>
                                        <p class="text-[9px] text-slate-500 mt-1">Layanan pelengkap SPK</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-[11px] font-bold text-slate-900">Rp 7.500.000</p>
                                    <p class="text-[9px] text-amber-600 font-bold">5.0%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Metode Bayar -->
                    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-slate-900 text-sm">Metode Pembayaran Kasir</h3>
                            <span class="text-[9px] font-bold text-blue-600">Total: Rp 148.75M</span>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <!-- Box 1 -->
                            <div class="bg-blue-50/50 border border-blue-100 rounded-lg p-3 text-center">
                                <svg class="mx-auto mb-1.5 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                <p class="text-[9px] text-slate-600 font-medium">QRIS / Instant</p>
                                <p class="text-[11px] font-black text-slate-800 mt-0.5">Rp 81.8 M</p>
                                <p class="text-[10px] text-blue-600 font-bold mt-1">55%</p>
                            </div>
                            <!-- Box 2 -->
                            <div class="bg-indigo-50/50 border border-indigo-100 rounded-lg p-3 text-center">
                                <svg class="mx-auto mb-1.5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                                <p class="text-[9px] text-slate-600 font-medium">EDC & Kartu</p>
                                <p class="text-[11px] font-black text-slate-800 mt-0.5">Rp 47.6 M</p>
                                <p class="text-[10px] text-indigo-600 font-bold mt-1">32%</p>
                            </div>
                            <!-- Box 3 -->
                            <div class="bg-emerald-50/50 border border-emerald-100 rounded-lg p-3 text-center">
                                <svg class="mx-auto mb-1.5 text-emerald-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="6" width="20" height="12" rx="2" ry="2"></rect><circle cx="12" cy="12" r="2"></circle><path d="M6 12h.01M18 12h.01"></path></svg>
                                <p class="text-[9px] text-slate-600 font-medium">Tunai Fisik</p>
                                <p class="text-[11px] font-black text-slate-800 mt-0.5">Rp 19.3 M</p>
                                <p class="text-[10px] text-emerald-600 font-bold mt-1">13%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Section: Transactions Table & Target -->
            <div class="grid grid-cols-4 gap-6">
                <!-- Data Table -->
                <div class="col-span-3 bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
                    <div class="p-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <div class="flex items-center gap-3">
                            <div class="bg-blue-100 text-blue-600 p-1.5 rounded shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Rekap Transaksi Terverifikasi Kasir</h3>
                                <p class="text-[10px] text-slate-500 mt-0.5">Faktur lunas dan terbit bukti pembayaran resmi hari ini</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <div class="relative">
                                <svg class="absolute left-2.5 top-2 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                <input type="text" placeholder="No. Faktur / No. Polisi..." class="bg-white border border-slate-200 rounded px-3 pl-7 py-1.5 text-[10px] w-48 focus:outline-none focus:border-blue-500">
                            </div>
                            <button class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 text-[10px] font-bold px-3 py-1.5 rounded flex items-center gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                                Filter Layanan
                            </button>
                        </div>
                    </div>

                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[9px] font-bold text-slate-500 uppercase tracking-wide border-b border-slate-100 bg-slate-50">
                                <th class="py-3 px-4">No. Faktur / Jam</th>
                                <th class="py-3 px-4">Kendaraan & Pelanggan</th>
                                <th class="py-3 px-4">Tipe Pengerjaan</th>
                                <th class="py-3 px-4">Rincian Jasa & Part</th>
                                <th class="py-3 px-4 text-right">Total Bayar</th>
                                <th class="py-3 px-4 text-center">Metode Bayar</th>
                                <th class="py-3 px-4 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-[10px]">
                            <!-- Row 1 -->
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-3 px-4">
                                    <a href="#" class="font-bold text-blue-600 hover:underline">INV/20241024/014</a>
                                    <p class="text-[9px] text-slate-500 mt-0.5 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 14:15 WIB</p>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex gap-2 items-center mb-1">
                                        <span class="bg-slate-800 text-white font-bold px-1.5 py-0.5 rounded text-[9px]">B 1234 SKL</span>
                                        <span class="font-bold text-slate-800">Toyota Innova Zenix</span>
                                    </div>
                                    <p class="text-[9px] text-slate-500">Pelanggan: Hendra Wijaya</p>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-blue-600 font-medium">Servis Berkala 40.000 KM</span>
                                </td>
                                <td class="py-3 px-4 text-[9px]">
                                    <p class="text-slate-600 mb-0.5">Jasa: <span class="font-bold text-slate-800">Rp 450.000</span></p>
                                    <p class="text-slate-600">Part: <span class="font-bold text-slate-800">Rp 820.000</span></p>
                                </td>
                                <td class="py-3 px-4 text-right font-black text-slate-900 text-[11px]">Rp 1.270.000</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="flex items-center justify-center gap-1.5 font-bold text-slate-700"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> QRIS BCA Instant</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <span class="bg-emerald-50 text-emerald-700 border border-emerald-100 px-2 py-0.5 rounded font-bold">Lunas</span>
                                </td>
                            </tr>
                            
                            <!-- Row 2 -->
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-3 px-4">
                                    <a href="#" class="font-bold text-blue-600 hover:underline">INV/20241024/013</a>
                                    <p class="text-[9px] text-slate-500 mt-0.5 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 13:42 WIB</p>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex gap-2 items-center mb-1">
                                        <span class="bg-slate-800 text-white font-bold px-1.5 py-0.5 rounded text-[9px]">D 8812 ADG</span>
                                        <span class="font-bold text-slate-800">Honda CR-V Turbo</span>
                                    </div>
                                    <p class="text-[9px] text-slate-500">Pelanggan: dr. Cindy Monica</p>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-amber-600 font-medium">Brake Pad & Rotor Lathe</span>
                                </td>
                                <td class="py-3 px-4 text-[9px]">
                                    <p class="text-slate-600 mb-0.5">Jasa: <span class="font-bold text-slate-800">Rp 300.000</span></p>
                                    <p class="text-slate-600">Part: <span class="font-bold text-slate-800">Rp 1.150.000</span></p>
                                </td>
                                <td class="py-3 px-4 text-right font-black text-slate-900 text-[11px]">Rp 1.450.000</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="flex items-center justify-center gap-1.5 font-bold text-slate-700"><span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span> Mandiri EDC Debit</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <span class="bg-emerald-50 text-emerald-700 border border-emerald-100 px-2 py-0.5 rounded font-bold">Lunas</span>
                                </td>
                            </tr>

                            <!-- Row 3 -->
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-3 px-4">
                                    <a href="#" class="font-bold text-blue-600 hover:underline">INV/20241024/012</a>
                                    <p class="text-[9px] text-slate-500 mt-0.5 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 12:10 WIB</p>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex gap-2 items-center mb-1">
                                        <span class="bg-slate-800 text-white font-bold px-1.5 py-0.5 rounded text-[9px]">B 2059 PYR</span>
                                        <span class="font-bold text-slate-800">Mitsubishi Pajero Dakar</span>
                                    </div>
                                    <p class="text-[9px] text-slate-500">Pelanggan: PT Surya Perkasa</p>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-purple-600 font-medium">Carbon Clean & Oli Total</span>
                                </td>
                                <td class="py-3 px-4 text-[9px]">
                                    <p class="text-slate-600 mb-0.5">Jasa: <span class="font-bold text-slate-800">Rp 650.000</span></p>
                                    <p class="text-slate-600">Part: <span class="font-bold text-slate-800">Rp 1.480.000</span></p>
                                </td>
                                <td class="py-3 px-4 text-right font-black text-slate-900 text-[11px]">Rp 2.130.000</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="flex items-center justify-center gap-1.5 font-bold text-slate-700"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> BCA Virtual Account</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <span class="bg-emerald-50 text-emerald-700 border border-emerald-100 px-2 py-0.5 rounded font-bold">Lunas</span>
                                </td>
                            </tr>

                            <!-- Row 4 -->
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-3 px-4">
                                    <a href="#" class="font-bold text-blue-600 hover:underline">INV/20241024/011</a>
                                    <p class="text-[9px] text-slate-500 mt-0.5 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 11:30 WIB</p>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex gap-2 items-center mb-1">
                                        <span class="bg-slate-800 text-white font-bold px-1.5 py-0.5 rounded text-[9px]">F 1421 AB</span>
                                        <span class="font-bold text-slate-800">Suzuki XL-7 Beta</span>
                                    </div>
                                    <p class="text-[9px] text-slate-500">Pelanggan: Bpk. Kurniawan</p>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-emerald-600 font-medium">Spooring 3D & Balancing</span>
                                </td>
                                <td class="py-3 px-4 text-[9px]">
                                    <p class="text-slate-600 mb-0.5">Jasa: <span class="font-bold text-slate-800">Rp 250.000</span></p>
                                    <p class="text-slate-600">Part: <span class="font-bold text-slate-800">Rp 45.000 (Timah)</span></p>
                                </td>
                                <td class="py-3 px-4 text-right font-black text-slate-900 text-[11px]">Rp 295.000</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="flex items-center justify-center gap-1.5 font-bold text-slate-700"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Tunai (Kasir 01)</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <span class="bg-emerald-50 text-emerald-700 border border-emerald-100 px-2 py-0.5 rounded font-bold">Lunas</span>
                                </td>
                            </tr>
                            
                            <!-- Row 5 -->
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-3 px-4">
                                    <a href="#" class="font-bold text-blue-600 hover:underline">INV/20241024/010</a>
                                    <p class="text-[9px] text-slate-500 mt-0.5 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 10:15 WIB</p>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex gap-2 items-center mb-1">
                                        <span class="bg-slate-800 text-white font-bold px-1.5 py-0.5 rounded text-[9px]">B 1872 WKS</span>
                                        <span class="font-bold text-slate-800">Toyota Yaris Cross</span>
                                    </div>
                                    <p class="text-[9px] text-slate-500">Pelanggan: Ibu Felicia S.</p>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-blue-600 font-medium">Ganti Oli Mesin + Fogging</span>
                                </td>
                                <td class="py-3 px-4 text-[9px]">
                                    <p class="text-slate-600 mb-0.5">Jasa: <span class="font-bold text-slate-800">Rp 120.000</span></p>
                                    <p class="text-slate-600">Part: <span class="font-bold text-slate-800">Rp 585.000</span></p>
                                </td>
                                <td class="py-3 px-4 text-right font-black text-slate-900 text-[11px]">Rp 705.000</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="flex items-center justify-center gap-1.5 font-bold text-slate-700"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> QRIS Mandiri</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <span class="bg-emerald-50 text-emerald-700 border border-emerald-100 px-2 py-0.5 rounded font-bold">Lunas</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="px-4 py-3 bg-[#F8FAFC] border-t border-slate-200 flex justify-between items-center text-[10px] text-slate-500 mt-auto">
                        <span>Menampilkan <span class="font-bold text-slate-800">1 - 5</span> dari <span class="font-bold text-slate-800">14</span> faktur lunas hari ini</span>
                        <div class="flex items-center gap-1">
                            <button class="w-6 h-6 rounded border border-slate-200 flex items-center justify-center bg-white"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg></button>
                            <button class="w-6 h-6 rounded bg-blue-600 text-white font-bold flex items-center justify-center shadow-sm">1</button>
                            <button class="w-6 h-6 rounded border border-slate-200 bg-white font-bold flex items-center justify-center">2</button>
                            <button class="w-6 h-6 rounded border border-slate-200 bg-white font-bold flex items-center justify-center">3</button>
                            <button class="w-6 h-6 rounded border border-slate-200 bg-white flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6" transform="matrix(-1 0 0 1 24 0)"></polyline></svg></button>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar (Targets & Top Services) -->
                <div class="col-span-1 space-y-6">
                    
                    <!-- Circular Target -->
                    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm text-center">
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide mb-4">PENCAPAIAN OMSET HARIAN</p>
                        
                        <!-- Donut Chart -->
                        <div class="relative w-32 h-32 mx-auto mb-4">
                            <!-- Background Circle -->
                            <svg class="w-full h-full" viewBox="0 0 36 36">
                                <path class="text-slate-100" stroke-width="4" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <!-- Progress Circle (97.8%) -->
                                <path class="text-blue-600" stroke-dasharray="97.8, 100" stroke-width="4" stroke-linecap="round" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                            </svg>
                            <!-- Inner Text -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-2xl font-black text-slate-900 leading-none">97.8%</span>
                                <span class="text-[9px] font-bold text-blue-600 mt-1">Tercapai</span>
                            </div>
                        </div>

                        <div class="space-y-2 text-[10px]">
                            <div class="flex justify-between items-center text-slate-500">
                                <span>Target Harian:</span>
                                <span class="font-bold text-slate-800">Rp 7.000.000</span>
                            </div>
                            <div class="flex justify-between items-center text-slate-500">
                                <span>Realisasi Saat Ini:</span>
                                <span class="font-bold text-blue-600">Rp 6.850.000</span>
                            </div>
                            <div class="flex justify-between items-center text-slate-500 pt-2 border-t border-slate-100">
                                <span>Sisa Defisit:</span>
                                <span class="font-bold text-emerald-600">Rp 150.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Top Services -->
                    <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-slate-900 text-sm">Top Layanan Profit</h3>
                            <svg class="text-amber-500" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Top 1 -->
                            <div>
                                <div class="flex items-start gap-2 mb-1.5">
                                    <span class="w-4 h-4 rounded-full bg-amber-100 text-amber-700 font-bold text-[9px] flex items-center justify-center shrink-0">1</span>
                                    <div>
                                        <p class="text-[11px] font-bold text-slate-800 leading-none">Tune Up & Carbon Clean</p>
                                        <p class="text-[10px] text-blue-600 font-bold mt-1">Rp 22.400.000</p>
                                    </div>
                                </div>
                                <div class="w-full bg-slate-100 h-1 rounded-full"><div class="bg-blue-600 h-1 rounded-full" style="width: 100%"></div></div>
                            </div>
                            <!-- Top 2 -->
                            <div>
                                <div class="flex items-start gap-2 mb-1.5">
                                    <span class="w-4 h-4 rounded-full bg-slate-100 text-slate-500 font-bold text-[9px] flex items-center justify-center shrink-0">2</span>
                                    <div>
                                        <p class="text-[11px] font-bold text-slate-800 leading-none">Overhaul Rem & Brake</p>
                                        <p class="text-[10px] text-blue-600 font-bold mt-1">Rp 18.150.000</p>
                                    </div>
                                </div>
                                <div class="w-full bg-slate-100 h-1 rounded-full"><div class="bg-blue-500 h-1 rounded-full" style="width: 80%"></div></div>
                            </div>
                            <!-- Top 3 -->
                            <div>
                                <div class="flex items-start gap-2 mb-1.5">
                                    <span class="w-4 h-4 rounded-full bg-slate-100 text-slate-500 font-bold text-[9px] flex items-center justify-center shrink-0">3</span>
                                    <div>
                                        <p class="text-[11px] font-bold text-slate-800 leading-none">Oli Mesin Sintetis & Filter</p>
                                        <p class="text-[10px] text-blue-600 font-bold mt-1">Rp 16.800.000</p>
                                    </div>
                                </div>
                                <div class="w-full bg-slate-100 h-1 rounded-full"><div class="bg-blue-400 h-1 rounded-full" style="width: 75%"></div></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Reconciliation Status -->
                    <div class="bg-emerald-50/50 border border-emerald-100 rounded-xl p-4">
                        <div class="flex items-center gap-1.5 text-emerald-700 font-bold text-[11px] mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            Status Rekonsiliasi Kasir
                        </div>
                        <p class="text-[9px] text-slate-600 mb-3 leading-relaxed">Kas fisik kasir 01 & 02 sesuai sistem. Tidak ada selisih (Balanced: Rp 0,00).</p>
                        <div class="flex justify-between items-center text-[9px]">
                            <span class="text-slate-500">Supervisor: <span class="font-bold text-slate-700">Bambang P.</span></span>
                            <span class="bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded font-bold uppercase tracking-wider text-[8px]">MATCHED</span>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

</body>
</html>