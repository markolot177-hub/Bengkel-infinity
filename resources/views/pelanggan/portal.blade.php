<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pelanggan - BengkelCare</title>
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
                
                <a href="/dashboard-admin" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 hover:text-blue-600 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Dashboard Admin
                </a>

                <a href="/kasir" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 hover:text-blue-600 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    Monitoring Servis & Kasir
                </a>
                
                <a href="/workstation-mekanik" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 hover:text-blue-600 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    Workstation Mekanik
                </a>

                <!-- Portal Pelanggan (AKTIF) -->
                <a href="/portal-pelanggan" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    Portal Pelanggan
                </a>

                <a href="/manajemen-stok" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 hover:text-blue-600 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    Manajemen Stok
                </a>

                <a href="/laporan-pendapatan" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 hover:text-blue-600 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    Laporan Keuangan
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="px-6 py-4 border-t border-slate-200">
            <div class="flex items-center justify-between text-[10px] text-slate-500 mb-1">
                <span>Status Jaringan Bengkel</span>
                <span class="text-blue-600 font-bold flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> Aktif</span>
            </div>
            <p class="text-[9px] text-slate-400 mb-4">Versi Sistem: 3.4.2 Enterprise</p>
            
            <a href="/" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Keluar
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        
        <!-- TOP NAVBAR -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <div class="relative w-96">
                <svg class="absolute left-3 top-1.5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="text" placeholder="Cari riwayat servis, nomor polisi, atau konsultasi..." class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg pl-9 pr-3 py-1.5 text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div class="flex items-center gap-6">
                <!-- Role Switcher -->
                <div class="flex items-center bg-[#F8FAFC] p-1 rounded-lg border border-slate-200">
                    <span class="text-[10px] text-slate-500 font-semibold px-2">Peran:</span>
                    <button class="text-slate-500 hover:text-slate-700 text-[10px] font-semibold px-3 py-1">Admin</button>
                    <button class="text-slate-500 hover:text-slate-700 text-[10px] font-semibold px-3 py-1">Mekanik</button>
                    <button class="bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded shadow-sm">Pelanggan</button>
                </div>
                
                <button class="text-slate-400 hover:text-slate-600 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-blue-600 rounded-full border-2 border-white"></span>
                </button>

                <!-- Profile Pelanggan -->
                <div class="flex items-center gap-3 border-l border-slate-200 pl-6 cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-slate-300 overflow-hidden border border-slate-200">
                        <img src="https://ui-avatars.com/api/?name=Rina+Melati&background=E2E8F0&color=1E293B" alt="Avatar">
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-800 uppercase">RINA MELATI</p>
                        <p class="text-[10px] text-slate-500 font-medium">PELANGGAN SETIA</p>
                    </div>
                    <svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
        </header>

        <!-- SCROLLABLE CONTENT -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            
            <!-- Customer Welcome Banner -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-6 text-white shadow-md mb-6 flex justify-between items-center">
                <div>
                    <span class="bg-blue-500/40 text-blue-100 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider mb-2 inline-block border border-blue-400/30">ID Pelanggan: CUST-9921</span>
                    <h2 class="text-xl font-black mb-1">Selamat Datang, Ibu Rina Melati!</h2>
                    <p class="text-xs text-blue-100 leading-relaxed max-w-xl">Pantau progres servis kendaraan Anda secara real-time dari garasi atau rumah, periksa riwayat perawatan berkala, dan unduh faktur digital dengan mudah.</p>
                </div>
                <div class="hidden lg:flex gap-3">
                    <button class="bg-white text-blue-700 hover:bg-blue-50 text-xs font-bold px-4 py-2.5 rounded-xl shadow-sm transition-colors flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Unduh E-Invoice Terakhir
                    </button>
                    <button class="bg-blue-500/30 hover:bg-blue-500/50 border border-blue-400/30 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-colors flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        Konsultasi SA
                    </button>
                </div>
            </div>

            <!-- Grid Layout (2/3 Left, 1/3 Right) -->
            <div class="grid grid-cols-3 gap-6 mb-8">
                
                <!-- KIRI: Status Servis Aktif & Riwayat -->
                <div class="col-span-2 space-y-6">
                    
                    <!-- Live Tracking Card -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <div class="flex justify-between items-center mb-4 pb-3 border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 bg-blue-600 rounded-full animate-ping"></span>
                                <h3 class="text-sm font-bold text-slate-900">Live Status Pengerjaan Kendaraan Aktif</h3>
                            </div>
                            <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-0.5 rounded">SPK-9921</span>
                        </div>

                        <!-- Car info summary banner -->
                        <div class="bg-slate-50 border border-slate-100 rounded-lg p-4 mb-5 flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <div class="bg-slate-900 text-white font-bold text-xs px-3 py-1.5 rounded">
                                    B 2841 PKL
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Toyota Yaris 1.5 S CVT (2021)</h4>
                                    <p class="text-[10px] text-slate-500">Mekanik Penanggung Jawab: <span class="font-semibold text-slate-700">Tejar Saeful (Bay 03)</span></p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-[9px] text-slate-400 block">Estimasi Selesai</span>
                                <span class="text-xs font-bold text-blue-600">14:30 WIB</span>
                            </div>
                        </div>

                        <!-- Progress Tracker -->
                        <div class="relative px-2 py-4">
                            <div class="absolute left-6 right-6 top-8 h-1 bg-slate-100 z-0"></div>
                            <div class="absolute left-6 top-8 h-1 bg-blue-600 z-0 w-3/4 transition-all"></div>
                            
                            <div class="grid grid-cols-4 relative z-10 text-center text-[10px]">
                                <div>
                                    <div class="w-7 h-7 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-xs shadow-sm mb-1.5">✓</div>
                                    <p class="font-bold text-slate-800">Check-In & SA Note</p>
                                    <span class="text-[8px] text-slate-400">08:15 WIB</span>
                                </div>
                                <div>
                                    <div class="w-7 h-7 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-xs shadow-sm mb-1.5">✓</div>
                                    <p class="font-bold text-slate-800">Inspeksi Multi-Point</p>
                                    <span class="text-[8px] text-slate-400">09:00 WIB</span>
                                </div>
                                <div>
                                    <div class="w-7 h-7 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-xs shadow-sm mb-1.5 ring-4 ring-blue-100 animate-pulse">⟳</div>
                                    <p class="font-bold text-blue-600">Pengerjaan & Part</p>
                                    <span class="text-[8px] text-blue-500 font-semibold">Sedang Berjalan</span>
                                </div>
                                <div>
                                    <div class="w-7 h-7 mx-auto bg-white border-2 border-slate-200 text-slate-400 rounded-full flex items-center justify-center font-bold text-xs mb-1.5">4</div>
                                    <p class="font-medium text-slate-500">Selesai & Kasir</p>
                                    <span class="text-[8px] text-slate-400">Menunggu</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-t border-slate-100 flex justify-between items-center text-[11px]">
                            <span class="text-slate-500">Keluhan: Rem berdecit, getaran RPM 2.000, & Servis Rutin 10K.</span>
                            <a href="#detail-servis" class="text-blue-600 font-bold hover:underline flex items-center gap-1">Lihat Detail Pekerjaan &rarr;</a>
                        </div>
                    </div>

                    <!-- Riwayat Servis Kendaraan -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Riwayat Perawatan & Servis Berkala</h3>
                                <p class="text-[10px] text-slate-500">Catatan riwayat servis kendaraan terdaftar atas nama Ibu Rina Melati.</p>
                            </div>
                            <button class="text-xs font-bold text-blue-600 hover:underline">Lihat Semua (4 Unit)</button>
                        </div>

                        <div class="space-y-3">
                            <!-- Riwayat 1 -->
                            <div class="border border-slate-200 rounded-lg p-3.5 hover:border-blue-300 transition-colors">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex items-center gap-2">
                                        <span class="bg-slate-100 text-slate-800 font-bold px-2 py-0.5 rounded text-[11px]">B 2841 PKL</span>
                                        <span class="text-[10px] font-semibold text-slate-600">Toyota Yaris 1.5 S</span>
                                    </div>
                                    <span class="bg-emerald-50 text-emerald-700 text-[9px] font-bold px-2 py-0.5 rounded">Selesai Dibayar</span>
                                </div>
                                <div class="grid grid-cols-3 text-[10px] text-slate-500 mb-2.5 bg-slate-50 p-2 rounded">
                                    <div><span class="font-semibold text-slate-700">Tanggal:</span> 12 Okt 2026</div>
                                    <div><span class="font-semibold text-slate-700">Odometer:</span> 19.850 KM</div>
                                    <div><span class="font-semibold text-slate-700">Cabang:</span> Cabang Pusat</div>
                                </div>
                                <div class="flex justify-between items-center text-[11px]">
                                    <span class="text-slate-600 font-medium">Paket Servis 10K + Ganti Oli TMO + Kampas Rem Depan</span>
                                    <div class="flex items-center gap-3">
                                        <span class="font-black text-slate-900">Rp 933.000</span>
                                        <button class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-[10px] font-bold px-3 py-1 rounded transition-colors">Nota PDF</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Riwayat 2 -->
                            <div class="border border-slate-200 rounded-lg p-3.5 hover:border-blue-300 transition-colors">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex items-center gap-2">
                                        <span class="bg-slate-100 text-slate-800 font-bold px-2 py-0.5 rounded text-[11px]">B 2841 PKL</span>
                                        <span class="text-[10px] font-semibold text-slate-600">Toyota Yaris 1.5 S</span>
                                    </div>
                                    <span class="bg-emerald-50 text-emerald-700 text-[9px] font-bold px-2 py-0.5 rounded">Selesai Dibayar</span>
                                </div>
                                <div class="grid grid-cols-3 text-[10px] text-slate-500 mb-2.5 bg-slate-50 p-2 rounded">
                                    <div><span class="font-semibold text-slate-700">Tanggal:</span> 15 Apr 2026</div>
                                    <div><span class="font-semibold text-slate-700">Odometer:</span> 10.000 KM</div>
                                    <div><span class="font-semibold text-slate-700">Cabang:</span> Cabang Pusat</div>
                                </div>
                                <div class="flex justify-between items-center text-[11px]">
                                    <span class="text-slate-600 font-medium">Servis Berkala 10.000 KM + Tune Up Ringan</span>
                                    <div class="flex items-center gap-3">
                                        <span class="font-black text-slate-900">Rp 450.000</span>
                                        <button class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-[10px] font-bold px-3 py-1 rounded transition-colors">Nota PDF</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- KANAN: Kendaraan Terdaftar & Konsultasi SA -->
                <div class="col-span-1 space-y-6">
                    
                    <!-- Garasi Kendaraan Saya -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-sm font-bold text-slate-900">Garasi Kendaraan Saya</h3>
                            <button class="text-blue-600 text-xs font-bold hover:underline">+ Tambah Unit</button>
                        </div>
                        <p class="text-[10px] text-slate-500 mb-4">Daftar mobil yang terhubung dengan akun Anda.</p>

                        <div class="space-y-3">
                            <div class="bg-blue-50/50 border border-blue-200 rounded-lg p-3.5 relative">
                                <span class="absolute top-3 right-3 bg-blue-600 text-white text-[8px] font-bold px-1.5 py-0.5 rounded">Aktif di Servis</span>
                                <h4 class="font-bold text-xs text-slate-900">Toyota Yaris 1.5 S CVT</h4>
                                <p class="text-[10px] text-slate-500 mt-0.5">No. Polisi: <span class="font-bold text-slate-800">B 2841 PKL</span></p>
                                <p class="text-[10px] text-slate-500">Tahun: 2021 &bull; Transmisi: Otomatis</p>
                            </div>

                            <div class="bg-slate-50 border border-slate-200 rounded-lg p-3.5 hover:border-slate-300 transition-colors">
                                <h4 class="font-bold text-xs text-slate-900">Honda Brio Satya E</h4>
                                <p class="text-[10px] text-slate-500 mt-0.5">No. Polisi: <span class="font-bold text-slate-800">B 1492 CYS</span></p>
                                <p class="text-[10px] text-slate-500">Tahun: 2023 &bull; Transmisi: Manual</p>
                            </div>
                        </div>
                    </div>

                    <!-- Hubungi Service Advisor -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <h3 class="text-sm font-bold text-slate-900 mb-1">Service Advisor Anda</h3>
                        <p class="text-[10px] text-slate-500 mb-4">Konsultasikan keluhan atau jadwalkan booking servis dengan SA yang menangani unit Anda.</p>

                        <div class="flex items-center gap-3 bg-slate-50 border border-slate-100 p-3 rounded-xl mb-4">
                            <div class="w-10 h-10 rounded-full bg-slate-300 overflow-hidden shrink-0 border border-slate-200">
                                <img src="https://ui-avatars.com/api/?name=Bambang+Pamungkas&background=CBD5E1&color=1E293B" alt="SA">
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900">andi syarip</h4>
                                <p class="text-[10px] text-blue-600 font-semibold">SA Cabang Pusat (Bay 1-8)</p>
                                <p class="text-[9px] text-slate-400">WhatsApp: 0851-5097-6669</p>
                            </div>
                        </div>

                        <a href="https://wa.me/6285150976669" target="_blank" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold py-2.5 rounded-lg shadow-sm flex items-center justify-center gap-2 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                            Chat WhatsApp Service Advisor
                        </a>
                    </div>

                </div>

            </div>

        </main>
    </div>

</body>
</html>