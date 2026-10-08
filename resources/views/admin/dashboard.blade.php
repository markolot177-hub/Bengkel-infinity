<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F4F7FA] text-slate-800 h-screen flex overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between hidden md:flex z-20">
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
                <a href="{{ route('dashboard.admin') }}" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Dashboard Admin
                </a>
                
                <!-- TAUTAN MENU KASIR SUDAH DIUBAH KE route('kasir') -->
                <a href="{{ route('kasir') }}" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
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

        <!-- Sidebar Footer -->
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
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 z-10 shrink-0">
            <!-- Search -->
            <div class="relative w-96">
                <svg class="absolute left-3 top-1.5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="text" placeholder="Cari No. Polisi (cth: B 2841 SKL), No. Rangka, atau ID Pelanggan..." class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg pl-9 pr-3 py-1.5 text-xs focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
            </div>

            <!-- Right Nav -->
            <div class="flex items-center gap-6">
                <!-- Role Switcher -->
                <div class="flex items-center bg-[#F8FAFC] p-1 rounded-lg border border-slate-200">
                    <span class="text-[10px] text-slate-500 font-semibold px-2">Peran:</span>
                    <button class="bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded shadow-sm">Admin</button>
                    <button class="text-slate-500 hover:text-slate-700 text-[10px] font-semibold px-3 py-1">Mekanik</button>
                    <button class="text-slate-500 hover:text-slate-700 text-[10px] font-semibold px-3 py-1">Pelanggan</button>
                </div>
                
                <!-- Notifications -->
                <button class="text-slate-400 hover:text-slate-600 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                </button>

                <!-- Profile -->
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

        <!-- SCROLLABLE CONTENT AREA -->
        <main class="flex-1 overflow-y-auto p-8">
            
            <!-- Page Header -->
            <div class="flex justify-between items-end mb-6">
                <div>
                    <div class="flex items-center gap-2 text-[10px] font-bold text-blue-600 uppercase tracking-widest mb-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> LIVE OPERATIONAL TELEMETRY <span class="text-slate-400 normal-case tracking-normal font-medium">&bull; Shift Pagi (08:00 - 17:00 WIB)</span>
                    </div>
                    <h2 class="text-2xl font-bold text-slate-900">Ikhtisar & Kontrol Bengkel Pusat</h2>
                    <p class="text-xs text-slate-500 mt-1">Monitoring alur pengerjaan unit bay, status inventaris kritis, dan otorisasi booking.</p>
                </div>
                <div class="flex gap-3">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Tambah Servis Baru
                    </button>
                    <button class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        Kasir & Faktur
                    </button>
                    <button class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                        Cetak Laporan
                    </button>
                </div>
            </div>

            <!-- Summary Cards Grid -->
            <div class="grid grid-cols-5 gap-5 mb-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">ANTREAN HARI INI</p>
                            <div class="flex items-baseline gap-1 mt-1">
                                <h3 class="text-2xl font-black text-slate-800">18</h3>
                                <span class="text-[10px] text-slate-500 font-medium">Kendaraan</span>
                            </div>
                        </div>
                        <div class="bg-blue-50 p-2 rounded-lg text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between text-[10px] font-medium text-slate-500">
                        <span class="flex items-center gap-1 text-blue-600"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> 4 Booking via App</span>
                        <span>Total Harian</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl border border-blue-200 p-4 shadow-sm flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute bottom-0 left-0 h-1 bg-slate-100 w-full"><div class="h-full bg-blue-600 w-[87%]"></div></div>
                    
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[10px] font-bold text-blue-600 uppercase tracking-wide">SEDANG DIKERJAKAN</p>
                            <div class="flex items-baseline gap-1 mt-1">
                                <h3 class="text-2xl font-black text-slate-800">7</h3>
                                <span class="text-[10px] text-slate-500 font-medium">Aktif di Bay</span>
                            </div>
                        </div>
                        <div class="bg-blue-50 p-2 rounded-lg text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 text-right text-[10px] font-bold text-blue-600">87%</div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">SELESAI HARI INI</p>
                            <div class="flex items-baseline gap-1 mt-1">
                                <h3 class="text-2xl font-black text-slate-800">12</h3>
                                <span class="text-[10px] text-slate-500 font-medium">Unit Lolos QC</span>
                            </div>
                        </div>
                        <div class="bg-slate-100 p-2 rounded-lg text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between text-[10px] font-medium text-slate-500">
                        <span>9 Diambil &bull; 3 Parkir Luar</span>
                        <span class="text-blue-600 font-bold">Siap Serah</span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">OMSET HARI INI</p>
                            <div class="flex items-baseline gap-1 mt-1">
                                <h3 class="text-xl font-black text-slate-800 tracking-tight">Rp 8.450.000</h3>
                            </div>
                        </div>
                        <div class="bg-blue-50 p-2 rounded-lg text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between text-[10px] font-medium text-slate-500">
                        <span class="flex items-center text-green-600 font-bold"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg> +14.2%</span>
                        <span>vs Target Shift</span>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">KRU MEKANIK</p>
                            <div class="flex items-baseline gap-1 mt-1">
                                <h3 class="text-2xl font-black text-slate-800">5<span class="text-base text-slate-400 font-medium">/6</span></h3>
                                <span class="text-[10px] text-blue-600 font-bold ml-1">Bertugas</span>
                            </div>
                        </div>
                        <div class="bg-blue-50 p-2 rounded-lg text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between text-[10px] font-medium text-slate-500">
                        <span>1 Mekanik Izin Sakit</span>
                        <span class="bg-blue-50 text-blue-600 px-1.5 py-0.5 rounded font-bold">Kapasitas 83%</span>
                    </div>
                </div>
            </div>

            <!-- Kanban Board Section -->
            <div class="bg-[#F8FAFC] border border-blue-100 rounded-2xl p-5 mb-8">
                <!-- Header -->
                <div class="flex justify-between items-center mb-5">
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-600 text-white p-1.5 rounded-lg shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect></svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Monitoring Alur Servis Unit Real-Time</h3>
                            <p class="text-[11px] text-slate-500">Visualisasi progres pengerjaan di seluruh bay 1-8 berdasarkan SPK aktif.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-[11px] font-medium text-slate-600">
                        <span>Filter Unit:</span>
                        <div class="flex bg-white border border-slate-200 rounded-lg p-0.5">
                            <button class="bg-blue-600 text-white font-bold px-3 py-1 rounded shadow-sm">Semua (19)</button>
                            <button class="px-3 py-1 hover:text-slate-900">Mobil (12)</button>
                            <button class="px-3 py-1 hover:text-slate-900">Motor (7)</button>
                        </div>
                    </div>
                </div>

                <!-- Board Columns Grid -->
                <div class="grid grid-cols-6 gap-4 items-start">
                    
                    <!-- Column 1: Menunggu -->
                    <div class="bg-slate-100/50 border border-slate-200 rounded-xl p-3">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[11px] font-bold text-slate-600 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-slate-400"></span> Menunggu</span>
                            <span class="bg-slate-200 text-slate-600 text-[10px] font-bold px-2 py-0.5 rounded-full">3</span>
                        </div>
                        <div class="bg-white border border-slate-200 p-3 rounded-lg shadow-sm mb-3">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-sm text-slate-800">B 1234 SKT</h4>
                                <span class="bg-slate-100 text-slate-600 text-[9px] font-bold px-1.5 py-0.5 rounded">Bay Antri</span>
                            </div>
                            <p class="text-[11px] font-bold text-slate-700">Toyota Avanza 1.3 G</p>
                            <p class="text-[10px] text-slate-500 mb-3">Pelanggan: Hendra Wijaya</p>
                            <div class="flex justify-between items-center pt-2 border-t border-slate-100 text-[10px]">
                                <span class="text-slate-500 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Menunggu PJ</span>
                                <span class="text-blue-600 font-bold">18m antri</span>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2: Pemeriksaan -->
                    <div class="bg-blue-50/50 border border-blue-100 rounded-xl p-3">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[11px] font-bold text-blue-700 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-blue-400"></span> Pemeriksaan</span>
                            <span class="bg-blue-100 text-blue-700 text-[10px] font-bold px-2 py-0.5 rounded-full">2</span>
                        </div>
                        <div class="bg-white border border-blue-100 p-3 rounded-lg shadow-sm">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-sm text-slate-800">B 9012 WZX</h4>
                                <span class="bg-blue-50 text-blue-600 text-[9px] font-bold px-1.5 py-0.5 rounded">Bay 01</span>
                            </div>
                            <p class="text-[11px] font-bold text-slate-700">Honda HR-V 1.5 Prestige</p>
                            <p class="text-[10px] text-slate-500 mb-2">Pelanggan: dr. Clarissa</p>
                            <div class="bg-blue-50 text-blue-800 text-[10px] p-1.5 rounded mb-3 font-medium">
                                <span class="font-bold">Diagnosa:</span> Bunyi dengung gardan & check engine
                            </div>
                            <div class="flex justify-between items-center pt-2 border-t border-slate-100 text-[10px]">
                                <span class="text-slate-600 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Agus Santoso</span>
                                <span class="text-blue-600 font-bold">14 menit</span>
                            </div>
                        </div>
                    </div>

                    <!-- Column 3: Pengerjaan (Active) -->
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-3">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[11px] font-bold text-blue-800 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span> Pengerjaan</span>
                            <span class="bg-blue-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">4</span>
                        </div>
                        <div class="bg-white border-2 border-blue-200 p-3 rounded-lg shadow-md mb-3 relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>
                            <div class="flex justify-between items-start mb-2 pl-2">
                                <h4 class="font-bold text-sm text-slate-800">D 4588 ABN</h4>
                                <span class="bg-blue-100 text-blue-700 text-[9px] font-bold px-1.5 py-0.5 rounded">Bay 02 - Pit</span>
                            </div>
                            <p class="text-[11px] font-bold text-slate-700 pl-2">Mitsubishi Pajero Dakar</p>
                            <p class="text-[10px] text-slate-500 mb-2 pl-2">Pelanggan: PT Graha Tirta</p>
                            
                            <div class="pl-2 mb-3">
                                <div class="flex justify-between text-[9px] font-bold text-slate-600 mb-1">
                                    <span>Tune-up & Ganti Kampas</span>
                                    <span class="text-blue-600">65%</span>
                                </div>
                                <div class="w-full bg-slate-100 h-1.5 rounded-full"><div class="bg-blue-500 h-1.5 rounded-full" style="width: 65%"></div></div>
                            </div>
                            <div class="flex justify-between items-center pt-2 border-t border-slate-100 text-[10px] pl-2">
                                <span class="text-slate-600 font-bold flex items-center gap-1">Doni & Fajar</span>
                                <span class="text-slate-800 font-bold">01j 15m</span>
                            </div>
                        </div>
                    </div>

                    <!-- Column 4: Menunggu Part -->
                    <div class="bg-red-50/50 border border-red-100 rounded-xl p-3">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[11px] font-bold text-red-600 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-red-500"></span> Menunggu Part</span>
                            <span class="bg-red-100 text-red-600 text-[10px] font-bold px-2 py-0.5 rounded-full">2</span>
                        </div>
                         <div class="bg-white border border-red-200 p-3 rounded-lg shadow-sm">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-sm text-slate-800">B 7741 BCF</h4>
                                <span class="bg-red-100 text-red-700 text-[9px] font-bold px-1.5 py-0.5 rounded">Hold Bay 04</span>
                            </div>
                            <p class="text-[11px] font-bold text-slate-700">Toyota Kijang Innova Reborn</p>
                            <p class="text-[10px] text-slate-500 mb-2">Pelanggan: Anton Suryo</p>
                            <div class="bg-red-50 text-red-700 text-[9px] p-1.5 rounded mb-3 font-medium">
                                <span class="font-bold">Kurang:</span> Shockbreaker Depan Kiri OEM (Inden Kurir)
                            </div>
                            <div class="flex justify-between items-center pt-2 border-t border-slate-100 text-[10px]">
                                <span class="text-slate-600">Yudi Irawan</span>
                                <span class="text-red-600 font-bold">ETA 14:00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Column 5: Selesai (QC OK) -->
                    <div class="bg-green-50/50 border border-green-100 rounded-xl p-3">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[11px] font-bold text-green-700 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-green-500"></span> Selesai (QC OK)</span>
                            <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-full">3</span>
                        </div>
                        <div class="bg-white border border-green-200 p-3 rounded-lg shadow-sm">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-sm text-slate-800">F 1944 KZ</h4>
                                <span class="bg-blue-100 text-blue-700 text-[9px] font-bold px-1.5 py-0.5 rounded">Siap Kasir</span>
                            </div>
                            <p class="text-[11px] font-bold text-slate-700">Daihatsu Sigra 1.2 R</p>
                            <p class="text-[10px] text-slate-500 mb-3">Pelanggan: Sdr. Gunawan</p>
                            <div class="flex justify-between items-center pt-2 border-t border-slate-100 text-[10px]">
                                <span class="text-slate-500">Mekanik: Doni K.</span>
                                <span class="text-blue-600 font-bold text-xs">Rp 620.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Column 6: Diambil -->
                    <div class="bg-slate-100/50 border border-slate-200 rounded-xl p-3">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[11px] font-bold text-slate-600 flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-slate-400"></span> Diambil</span>
                            <span class="bg-slate-200 text-slate-600 text-[10px] font-bold px-2 py-0.5 rounded-full">9</span>
                        </div>
                        <div class="bg-white border border-slate-200 p-3 rounded-lg shadow-sm opacity-60">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-bold text-sm text-slate-800 line-through">B 2841 SKL</h4>
                                <span class="bg-slate-100 text-slate-500 text-[9px] font-bold px-1.5 py-0.5 rounded">Lunas</span>
                            </div>
                            <p class="text-[11px] font-bold text-slate-500">Toyota Hilux 2.4 D-4D</p>
                            <p class="text-[10px] text-slate-400 mb-3">Pelanggan: PT Logistik Sentosa</p>
                            <div class="flex justify-between items-center pt-2 border-t border-slate-100 text-[9px]">
                                <span class="text-slate-500">Jam Ambil: 11:24 WIB</span>
                                <svg class="text-green-500" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Section (Tables & Lists) -->
            <div class="grid grid-cols-3 gap-6">
                <!-- Left: Booking Requests -->
                <div class="col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-5 border-b border-slate-100 pb-3">
                        <div class="flex items-center gap-2">
                            <svg class="text-blue-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                            <h3 class="text-sm font-bold text-slate-900">Permintaan Booking Masuk (Approval Cepat)</h3>
                            <span class="bg-blue-600 text-white text-[9px] font-bold px-2 py-0.5 rounded-full">4 Baru</span>
                        </div>
                        <a href="#" class="text-[11px] font-semibold text-blue-600 hover:underline flex items-center gap-1">Lihat Semua Jadwal &rarr;</a>
                    </div>
                    
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] font-bold text-slate-500 uppercase tracking-wide border-b border-slate-100">
                                <th class="pb-3 font-medium">Pelanggan & Kontak</th>
                                <th class="pb-3 font-medium">Kendaraan & Plat</th>
                                <th class="pb-3 font-medium">Rencana Servis</th>
                                <th class="pb-3 font-medium">Jadwal Kedatangan</th>
                                <th class="pb-3 font-medium text-right">Aksi Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Table Row -->
                            <tr>
                                <td class="py-3">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-[10px] font-bold">AW</div>
                                        <div>
                                            <p class="text-[11px] font-bold text-slate-800">Aditya Wicaksana</p>
                                            <p class="text-[10px] text-slate-500">0812-9899-4412</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-[11px] font-bold text-slate-800">B 1892 PQA</p>
                                    <p class="text-[10px] text-slate-500">Honda CR-V Turbo (2020)</p>
                                </td>
                                <td><span class="bg-blue-50 text-blue-700 border border-blue-100 text-[10px] font-semibold px-2 py-1 rounded">Tune-Up & Rem</span></td>
                                <td>
                                    <p class="text-[11px] font-bold text-slate-800">Hari ini, 13:30 WIB</p>
                                    <p class="text-[10px] text-blue-600 font-medium">Est. Durasi: 2 Jam</p>
                                </td>
                                <td class="text-right">
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white text-[10px] font-bold px-3 py-1.5 rounded shadow-sm transition-colors">Terima & Tugaskan</button>
                                    <button class="text-slate-600 hover:text-slate-900 text-[10px] font-bold px-2 py-1.5">Reschedule</button>
                                </td>
                            </tr>
                            <!-- Table Row -->
                            <tr>
                                <td class="py-3">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-[10px] font-bold">SN</div>
                                        <div>
                                            <p class="text-[11px] font-bold text-slate-800">Siti Nurhaliza</p>
                                            <p class="text-[10px] text-slate-500">0857-1120-9908</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-[11px] font-bold text-slate-800">B 6620 ZFD</p>
                                    <p class="text-[10px] text-slate-500">Honda Vario 160 (2023)</p>
                                </td>
                                <td><span class="bg-blue-50 text-blue-700 border border-blue-100 text-[10px] font-semibold px-2 py-1 rounded">Servis Rutin & CVT</span></td>
                                <td>
                                    <p class="text-[11px] font-bold text-slate-800">Hari ini, 14:00 WIB</p>
                                    <p class="text-[10px] text-blue-600 font-medium">Est. Durasi: 45 Menit</p>
                                </td>
                                <td class="text-right">
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white text-[10px] font-bold px-3 py-1.5 rounded shadow-sm transition-colors">Terima & Tugaskan</button>
                                    <button class="text-slate-600 hover:text-slate-900 text-[10px] font-bold px-2 py-1.5">Reschedule</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Right: Critical Stock -->
                <div class="bg-white rounded-xl border border-red-100 p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex items-center gap-2 text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                            <h3 class="text-sm font-bold text-slate-900">Stok Sparepart Kritis</h3>
                        </div>
                        <span class="bg-red-100 text-red-700 text-[9px] font-bold px-2 py-0.5 rounded-full">3 Item Tipis</span>
                    </div>
                    <p class="text-[10px] text-slate-500 mb-4 pb-3 border-b border-slate-100 leading-relaxed">Komponen dengan sisa persediaan di bawah ambang batas minimum servis bengkel.</p>
                    
                    <div class="space-y-4">
                        <!-- Item -->
                        <div>
                            <div class="flex justify-between items-start mb-1">
                                <div>
                                    <p class="text-[11px] font-bold text-slate-800">Kampas Rem Depan Avanza</p>
                                    <p class="text-[9px] text-slate-500">Part No: 04465-BZ010</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[11px] font-black text-red-600">Sisa 2 Set</p>
                                    <p class="text-[9px] text-slate-400">Min. 10 Set</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center bg-slate-50 p-1.5 rounded mt-2 text-[9px]">
                                <span class="text-slate-500">Supplier: PT Astra Auto Parts</span>
                                <a href="#" class="text-blue-600 font-bold">Reorder PO</a>
                            </div>
                        </div>
                        
                        <!-- Item -->
                        <div>
                            <div class="flex justify-between items-start mb-1">
                                <div>
                                    <p class="text-[11px] font-bold text-slate-800">Oli Shell Helix Ultra 5W-40</p>
                                    <p class="text-[9px] text-slate-500">Drum / Botol 1 Liter</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-[11px] font-black text-red-600">Sisa 4 Liter</p>
                                    <p class="text-[9px] text-slate-400">Min. 24 Liter</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center bg-slate-50 p-1.5 rounded mt-2 text-[9px]">
                                <span class="text-slate-500">Distributor: Shell Lubricants ID</span>
                                <a href="#" class="text-blue-600 font-bold">Reorder PO</a>
                            </div>
                        </div>
                    </div>

                    <button class="w-full mt-5 bg-blue-50 text-blue-700 hover:bg-blue-100 font-bold py-2.5 rounded-lg text-xs flex justify-center items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        Buka Gudang & Manajemen Stok
                    </button>
                </div>
            </div>

        </main>
    </div>

</body>
</html>