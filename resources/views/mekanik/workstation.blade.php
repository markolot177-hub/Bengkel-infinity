<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workstation Mekanik - BengkelCare</title>
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
                <a href="{{ route('kasir') }}" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    Monitoring Servis & Kasir
                </a>
                
                <!-- Menu Mekanik Aktif -->
                <a href="#" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
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
                    <button class="text-slate-500 hover:text-slate-700 text-[10px] font-semibold px-3 py-1">Admin</button>
                    <button class="bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded shadow-sm">Mekanik</button>
                    <button class="text-slate-500 hover:text-slate-700 text-[10px] font-semibold px-3 py-1">Pelanggan</button>
                </div>
                
                <button class="text-slate-400 hover:text-slate-600 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                </button>

                <!-- Profile Mekanik -->
                <div class="flex items-center gap-3 border-l border-slate-200 pl-6 cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-slate-300 overflow-hidden border border-slate-200">
                        <img src="https://ui-avatars.com/api/?name=Tejar+Saeful&background=E2E8F0&color=1E293B" alt="Avatar">
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-800 uppercase">TEJAR SAEFUL</p>
                        <p class="text-[10px] text-slate-500 font-medium">MEKANIK</p>
                    </div>
                    <svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
        </header>

        <!-- SCROLLABLE CONTENT -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            
            <!-- Mekanik Dashboard Banner -->
            <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm mb-6 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-slate-900 text-white font-bold rounded-xl flex items-center justify-center text-lg shadow-sm">
                        TS
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <h2 class="text-base font-black text-slate-900 uppercase">TEJAR SAEFUL</h2>
                            <span class="bg-blue-100 text-blue-700 text-[9px] font-bold px-1.5 py-0.5 rounded">MEK-038</span>
                            <span class="text-[10px] text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full font-bold flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-blue-600 rounded-full animate-pulse"></span> Sedang Mengerjakan</span>
                        </div>
                        <p class="text-[11px] text-slate-500 flex items-center gap-1.5">
                            <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span class="font-semibold text-slate-700">Bay 03</span> - Stall Mesin & Servis Berkala &bull; Shift Pagi (08:00 - 17:00 WIB)
                        </p>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <div class="bg-slate-50 border border-slate-100 px-4 py-2 rounded-lg flex flex-col items-center justify-center">
                        <span class="text-[9px] text-slate-500 font-bold uppercase tracking-wider mb-0.5 flex items-center gap-1">
                            <svg class="text-blue-500" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            Waktu Pengerjaan
                        </span>
                        <span class="text-base font-black text-slate-900">01:42:20</span>
                    </div>
                    <div class="bg-slate-50 border border-slate-100 px-4 py-2 rounded-lg flex flex-col items-center justify-center">
                        <span class="text-[9px] text-slate-500 font-bold uppercase tracking-wider mb-0.5">Target Hari Ini</span>
                        <span class="text-base font-black text-slate-900">2 <span class="text-slate-400 text-sm">/ 5 Mobil</span></span>
                    </div>
                    <button class="bg-slate-100 border border-slate-200 hover:bg-slate-200 text-slate-700 text-xs font-bold px-4 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg>
                        Jeda
                    </button>
                </div>
            </div>

            <!-- Main Layout (1/3 Left, 2/3 Right) -->
            <div class="grid grid-cols-3 gap-6 mb-8">
                
                <!-- KIRI: Antrean Penugasan -->
                <div class="col-span-1 space-y-4">
                    
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 h-full flex flex-col">
                        <!-- Header Antrean -->
                        <div class="flex justify-between items-center mb-1">
                            <h3 class="font-bold text-slate-900 flex items-center gap-2">
                                <svg class="text-blue-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                Antrean Penugasan
                            </h3>
                            <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-0.5 rounded">3 Kendaraan</span>
                        </div>
                        <p class="text-[9px] text-slate-500 mb-4">Pilih kendaraan untuk melihat instruksi kerja atau serah terima unit stall.</p>

                        <!-- List Antrean -->
                        <div class="flex-1 space-y-3">
                            
                            <!-- Card 1 (Active) -->
                            <div class="bg-blue-50/30 border-2 border-blue-500 rounded-lg p-3 relative cursor-pointer">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex gap-2 items-center">
                                        <span class="bg-slate-900 text-white font-bold px-2 py-1 rounded text-[11px]">B 2841 PKL</span>
                                        <span class="text-[9px] font-bold text-blue-600 bg-blue-100 px-1.5 py-0.5 rounded">Aktif di Bay</span>
                                    </div>
                                    <span class="text-[9px] font-bold text-red-600 bg-red-100 px-1.5 py-0.5 rounded">Prioritas Tinggi</span>
                                </div>
                                <h4 class="text-[11px] font-bold text-slate-900">Toyota Yaris 1.5 S CVT (2021)</h4>
                                <p class="text-[10px] text-slate-500 mb-2 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Ibu Rina Melati &bull; SPK-9921</p>
                                <div class="flex justify-between items-center border-t border-blue-100 pt-2 text-[10px]">
                                    <span class="text-slate-600 font-semibold flex items-center gap-1.5"><svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg> Servis 10K + Cek Rem</span>
                                    <span class="text-blue-700 font-bold">Est: 14:30 WIB</span>
                                </div>
                            </div>

                            <!-- Card 2 (Next) -->
                            <div class="bg-white border border-slate-200 hover:border-blue-300 rounded-lg p-3 cursor-pointer transition-colors">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex gap-2 items-center">
                                        <span class="bg-slate-100 text-slate-700 font-bold px-2 py-1 rounded text-[11px] border border-slate-200">D 1940 ABF</span>
                                        <span class="text-[9px] font-medium text-slate-500">Berikutnya</span>
                                    </div>
                                    <span class="text-[9px] font-bold text-slate-500 bg-slate-100 px-1.5 py-0.5 rounded">Sedang</span>
                                </div>
                                <h4 class="text-[11px] font-bold text-slate-800">Honda HR-V 1.5 SE (2020)</h4>
                                <p class="text-[10px] text-slate-500 mb-2 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Bpk. Hendra Gunawan &bull; SPK-9923</p>
                                <div class="flex justify-between items-center border-t border-slate-100 pt-2 text-[10px]">
                                    <span class="text-slate-500 font-medium flex items-center gap-1.5"><svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg> Tune Up + Spooring Balancing</span>
                                    <span class="text-slate-600 font-bold">Est: 60 Menit</span>
                                </div>
                            </div>

                            <!-- Card 3 (Queue) -->
                            <div class="bg-white border border-slate-200 hover:border-blue-300 rounded-lg p-3 cursor-pointer transition-colors opacity-80">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex gap-2 items-center">
                                        <span class="bg-slate-100 text-slate-700 font-bold px-2 py-1 rounded text-[11px] border border-slate-200">B 1109 WQR</span>
                                        <span class="text-[9px] font-medium text-slate-500">Antrean</span>
                                    </div>
                                    <span class="text-[9px] font-bold text-slate-500 bg-slate-100 px-1.5 py-0.5 rounded">Rutin</span>
                                </div>
                                <h4 class="text-[11px] font-bold text-slate-800">Mitsubishi Xpander Ultimate (2022)</h4>
                                <p class="text-[10px] text-slate-500 mb-2 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Bpk. Dimas Wardhana &bull; SPK-9929</p>
                                <div class="flex justify-between items-center border-t border-slate-100 pt-2 text-[10px]">
                                    <span class="text-slate-500 font-medium flex items-center gap-1.5"><svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg> Flushing AC + Penggantian Filter Kabin</span>
                                    <span class="text-slate-600 font-bold">Est: 45 Menit</span>
                                </div>
                            </div>
                        </div>

                        <!-- SA Help Alert -->
                        <div class="mt-4 bg-blue-50/50 border border-blue-100 rounded-lg p-3">
                            <div class="flex gap-2 items-start">
                                <svg class="text-blue-500 shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                <div>
                                    <h4 class="text-[10px] font-bold text-slate-800">Butuh Bantuan Service Advisor?</h4>
                                    <p class="text-[9px] text-slate-500 mt-0.5 mb-1.5 leading-relaxed">Jika menemukan kerusakan tambahan di luar keluhan awal, mintalah approval SA melalui tombol Tambah Temuan.</p>
                                    <a href="#" class="text-[10px] font-bold text-blue-600 hover:underline flex items-center gap-1">Panggil SA Bambang Pamungkas &rarr;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KANAN: Main Workspace (Formulir Kerja) -->
                <div class="col-span-2 space-y-4">
                    
                    <!-- 1. Stepper Status -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div class="p-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                            <h3 class="font-bold text-slate-900 text-sm flex items-center gap-2">
                                <svg class="text-blue-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                Status Pengerjaan Real-Time
                            </h3>
                            <span class="text-[9px] text-slate-400">Klik tahap untuk mengubah status</span>
                        </div>
                        <div class="p-3 bg-white border-b border-slate-100">
                            <div class="flex rounded-lg overflow-hidden border border-slate-200 divide-x divide-slate-200 text-center text-[10px]">
                                <!-- Step 1 (Done) -->
                                <button class="flex-1 bg-slate-50 py-2.5 hover:bg-slate-100 text-slate-600">
                                    <svg class="mx-auto mb-1 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    <span class="block font-medium">Menunggu</span><span class="block text-[8px] text-slate-400">08:15 WIB</span>
                                </button>
                                <!-- Step 2 (Done) -->
                                <button class="flex-1 bg-blue-50/50 py-2.5 hover:bg-blue-50 text-slate-700">
                                    <svg class="mx-auto mb-1 text-blue-500" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    <span class="block font-bold text-slate-800">Pemeriksaan</span><span class="block text-[8px] text-blue-600 font-bold">Selesai (SS-40)</span>
                                </button>
                                <!-- Step 3 (Active) -->
                                <button class="flex-1 bg-blue-600 text-white py-2.5 font-bold shadow-inner">
                                    <svg class="mx-auto mb-1 text-white animate-spin-slow" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.92-10.26l5.33 3.46"></path></svg>
                                    <span class="block">Pengerjaan</span><span class="block text-[8px] text-blue-200">Sedang Berjalan</span>
                                </button>
                                <!-- Step 4 (Pending) -->
                                <button class="flex-1 bg-white py-2.5 hover:bg-slate-50 text-slate-500">
                                    <span class="block font-bold text-slate-400 mb-1">4</span>
                                    <span class="block font-medium">Sparepart</span><span class="block text-[8px] text-slate-400">Gudang Ready</span>
                                </button>
                                <!-- Step 5 (Pending) -->
                                <button class="flex-1 bg-white py-2.5 hover:bg-slate-50 text-slate-500">
                                    <span class="block font-bold text-slate-400 mb-1">5</span>
                                    <span class="block font-medium">Selesai</span><span class="block text-[8px] text-slate-400">Tahap Akhir</span>
                                </button>
                            </div>
                        </div>
                        <div class="bg-slate-50 px-4 py-2 flex justify-between text-[9px] text-slate-500">
                            <span><span class="text-blue-600 font-bold">&bull; Status saat ini:</span> Pengerjaan Servis Aktif</span>
                            <span>Diperbarui oleh Budi Santoso (09:12 WIB)</span>
                        </div>
                    </div>

                    <!-- 2. Info Kendaraan Utama -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex gap-4 items-center">
                                <div class="bg-slate-900 text-white font-bold text-lg px-4 py-2 rounded-lg tracking-wider border border-slate-700 shadow-sm">
                                    B 2841 PKL
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-900 text-base">Toyota Yaris 1.5 S CVT</h3>
                                    <p class="text-[11px] text-slate-500 mt-0.5">Tahun 2021 &bull; Odometer: 19.850 KM &bull; Transmisi Otomatis</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-[9px] text-slate-500">Pelanggan</p>
                                <p class="text-[11px] font-bold text-slate-800">Ibu Rina Melati</p>
                                <a href="#" class="text-[10px] font-bold text-blue-600 hover:underline">0812-9921-9871</a>
                            </div>
                        </div>

                        <!-- Keluhan Red Box -->
                        <div class="bg-red-50/50 border border-red-100 rounded-lg p-4 relative overflow-hidden">
                            <div class="absolute top-0 left-0 w-1 h-full bg-red-500"></div>
                            <div class="flex items-center gap-2 mb-1.5 pl-2">
                                <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                <h4 class="text-[10px] font-bold text-red-700 uppercase tracking-wide">KELUHAN UTAMA PELANGGAN (SERVICE ADVISOR NOTE)</h4>
                            </div>
                            <p class="text-[11px] text-slate-700 pl-2 italic leading-relaxed">
                                "Rem bunyi berdecit saat kecepatan tinggi dan deselerasi mendadak. Ada sedikit getaran pada pedal gas saat rpm 2.000. Minta sekalian ganti oli mesin rutin paket 10.000 KM beserta filter."
                            </p>
                        </div>
                    </div>

                    <!-- 3. Formulir Inspeksi -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <div class="flex justify-between items-center mb-4 pb-3 border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <svg class="text-blue-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="M16 13H8"></path><path d="M16 17H8"></path><path d="M10 9H8"></path></svg>
                                <div>
                                    <h3 class="text-sm font-bold text-slate-900">Formulir Pemeriksaan Kendaraan (Multi-Point Inspection)</h3>
                                    <p class="text-[10px] text-slate-500">Centang kondisi fisik komponen dan berikan rekomendasi tindak lanjut.</p>
                                </div>
                            </div>
                            <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-1 rounded">5 Poin Kritis Terverifikasi</span>
                        </div>

                        <div class="space-y-3">
                            <!-- Item 1 -->
                            <div class="flex justify-between items-center bg-slate-50/50 border border-slate-100 p-3 rounded-lg">
                                <div class="flex gap-3 items-start">
                                    <div class="text-blue-600 bg-white p-1.5 rounded shadow-sm border border-slate-200 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><circle cx="12" cy="14" r="4"></circle><line x1="12" y1="6" x2="12.01" y2="6"></line></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-[11px] font-bold text-slate-800">Oli Mesin & Filter Oli</h4>
                                        <p class="text-[10px] text-slate-500 mt-0.5">Viskositas hitam pekat, level pada batas minimum dipstick. Rekomendasi ganti.</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="bg-red-50 text-red-600 text-[9px] font-bold px-2 py-1 rounded-full flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Perlu Penggantian</span>
                                    <button class="text-slate-400 hover:text-slate-600"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></button>
                                </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="flex justify-between items-center bg-slate-50/50 border border-slate-100 p-3 rounded-lg">
                                <div class="flex gap-3 items-start">
                                    <div class="text-blue-600 bg-white p-1.5 rounded shadow-sm border border-slate-200 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-[11px] font-bold text-slate-800">Kampas Rem Depan & Belakang</h4>
                                        <p class="text-[10px] text-slate-500 mt-0.5">Kampas depan aus 80% (tersisa &plusmn;2mm), rotor piringan kotor. Kampas belakang tebal 60%.</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="bg-red-50 text-red-600 text-[9px] font-bold px-2 py-1 rounded-full flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Aus 80% (Ganti Baru)</span>
                                    <button class="text-slate-400 hover:text-slate-600"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></button>
                                </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="flex justify-between items-center bg-slate-50/50 border border-slate-100 p-3 rounded-lg">
                                <div class="flex gap-3 items-start">
                                    <div class="text-blue-600 bg-white p-1.5 rounded shadow-sm border border-slate-200 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-[11px] font-bold text-slate-800">Tekanan Angin & Kondisi Ban</h4>
                                        <p class="text-[10px] text-slate-500 mt-0.5">Tekanan 4 roda disesuaikan ke 32 PSI standar pabrikan. Alur ban masih 75%.</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="bg-blue-50 text-blue-700 text-[9px] font-bold px-2 py-1 rounded-full flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Normal (32 PSI)</span>
                                    <button class="text-slate-400 hover:text-slate-600"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></button>
                                </div>
                            </div>
                            
                            <!-- Item 4 -->
                            <div class="flex justify-between items-center bg-slate-50/50 border border-slate-100 p-3 rounded-lg">
                                <div class="flex gap-3 items-start">
                                    <div class="text-blue-600 bg-white p-1.5 rounded shadow-sm border border-slate-200 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect><rect x="4" y="6" width="16" height="16" rx="2" ry="2"></rect><line x1="8" y1="14" x2="16" y2="14"></line><line x1="12" y1="10" x2="12" y2="18"></line></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-[11px] font-bold text-slate-800">Aki / Battery & Alternator</h4>
                                        <p class="text-[10px] text-slate-500 mt-0.5">Tegangan beban 12.6V, alternator charging 14.1V, terminal bersih bebas korosi.</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="bg-blue-50 text-blue-700 text-[9px] font-bold px-2 py-1 rounded-full flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Sehat (12.6V)</span>
                                    <button class="text-slate-400 hover:text-slate-600"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></button>
                                </div>
                            </div>

                            <!-- Item 5 -->
                            <div class="flex justify-between items-center bg-slate-50/50 border border-slate-100 p-3 rounded-lg">
                                <div class="flex gap-3 items-start">
                                    <div class="text-blue-600 bg-white p-1.5 rounded shadow-sm border border-slate-200 mt-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-[11px] font-bold text-slate-800">Suspensi & Kaki-kaki Depan/Belakang</h4>
                                        <p class="text-[10px] text-slate-500 mt-0.5">Bushing arm solid, shock absorber kering tidak ada rembesan oli, link stabilizer normal.</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="bg-blue-50 text-blue-700 text-[9px] font-bold px-2 py-1 rounded-full flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Normal Baik</span>
                                    <button class="text-slate-400 hover:text-slate-600"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Penggunaan Suku Cadang -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="text-blue-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Penggunaan Suku Cadang (Sparepart Inventori)</h3>
                                <p class="text-[10px] text-slate-500">Suku cadang yang diambil langsung terpotong dari gudang stok BengkelCare.</p>
                            </div>
                        </div>

                        <table class="w-full text-left mb-4">
                            <thead>
                                <tr class="text-[9px] font-bold text-slate-500 uppercase tracking-wide border-b border-slate-100">
                                    <th class="py-2.5">Kode & Nama Part</th>
                                    <th class="py-2.5 text-center">QTY</th>
                                    <th class="py-2.5 text-right">Harga Satuan</th>
                                    <th class="py-2.5 text-right">Total Subtotal</th>
                                    <th class="py-2.5 text-center">Status Barang</th>
                                    <th class="py-2.5 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-[11px]">
                                <tr>
                                    <td class="py-3">
                                        <p class="font-bold text-slate-800">Oli Mesin TMO Full Synthetic 5W-30</p>
                                        <p class="text-[9px] text-slate-500 mt-0.5">TMO-5W30-4L &bull; Rak A-02</p>
                                    </td>
                                    <td class="py-3 text-center font-bold text-slate-800">4 Liter</td>
                                    <td class="py-3 text-right text-slate-600">Rp 125.000</td>
                                    <td class="py-3 text-right font-bold text-slate-800">Rp 500.000</td>
                                    <td class="py-3 text-center"><span class="bg-blue-50 text-blue-600 border border-blue-100 px-2 py-0.5 rounded text-[9px] font-bold">Terpasang</span></td>
                                    <td class="py-3 text-right"><button class="text-slate-400 hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></td>
                                </tr>
                                <tr>
                                    <td class="py-3">
                                        <p class="font-bold text-slate-800">Kampas Rem Depan Bendix Stealth</p>
                                        <p class="text-[9px] text-slate-500 mt-0.5">BDX-DB1831 &bull; Rak B-14</p>
                                    </td>
                                    <td class="py-3 text-center font-bold text-slate-800">1 Set</td>
                                    <td class="py-3 text-right text-slate-600">Rp 385.000</td>
                                    <td class="py-3 text-right font-bold text-slate-800">Rp 385.000</td>
                                    <td class="py-3 text-center"><span class="bg-blue-600 text-white px-2 py-0.5 rounded text-[9px] font-bold shadow-sm">Proses Pasang</span></td>
                                    <td class="py-3 text-right"><button class="text-slate-400 hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></td>
                                </tr>
                                <tr>
                                    <td class="py-3">
                                        <p class="font-bold text-slate-800">Filter Oli Original Toyota Yaris</p>
                                        <p class="text-[9px] text-slate-500 mt-0.5">TY-90915-YZZF1 &bull; Rak A-03</p>
                                    </td>
                                    <td class="py-3 text-center font-bold text-slate-800">1 Pcs</td>
                                    <td class="py-3 text-right text-slate-600">Rp 48.000</td>
                                    <td class="py-3 text-right font-bold text-slate-800">Rp 48.000</td>
                                    <td class="py-3 text-center"><span class="bg-blue-50 text-blue-600 border border-blue-100 px-2 py-0.5 rounded text-[9px] font-bold">Terpasang</span></td>
                                    <td class="py-3 text-right"><button class="text-slate-400 hover:text-red-500"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="bg-slate-50 border border-slate-100 rounded-lg p-3 flex justify-between items-center">
                            <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">Total Nilai Sparepart yang Diambil:</span>
                            <span class="text-base font-black text-slate-900">Rp 933.000</span>
                        </div>
                    </div>

                    <!-- 5. Catatan Pengerjaan -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <div class="flex items-center gap-2 mb-3">
                            <svg class="text-blue-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Catatan Pengerjaan Teknisi</h3>
                                <p class="text-[10px] text-slate-500">Tuliskan detail perbaikan, tindakan pembersihan piringan cakram, atau instruksi pemakaian untuk dicetak pada berkas invoice/kasir.</p>
                            </div>
                        </div>
                        <textarea rows="3" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-3 text-[11px] text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 mb-5 leading-relaxed">Kampas rem depan diganti baru dengan tipe Bendix Stealth. Piringan rem depan dibersihkan dari kerak karat dan residu gesekan. Penggantian oli mesin 4L TMO 5W-30 beserta filter oli baru selesai dilakukan. Uji jalan di area bengkel: bunyi berdecit hilang total, pengereman halus responsif, getaran pedal normal.</textarea>
                        
                        <!-- Actions -->
                        <div class="flex justify-between items-center border-t border-slate-100 pt-5">
                            <button class="bg-slate-50 border border-slate-200 hover:bg-slate-100 text-slate-700 text-[11px] font-bold px-4 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                                <svg class="text-slate-500" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                Unggah Foto Bukti Servis (3 Foto)
                            </button>
                            <div class="flex gap-3">
                                <button class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-[11px] font-bold px-4 py-2.5 rounded-lg shadow-sm transition-colors">
                                    Simpan Draft
                                </button>
                                <button class="bg-slate-900 hover:bg-black text-white text-[11px] font-bold px-5 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    Simpan Catatan & Lapor Servis Selesai
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

</body>
</html>