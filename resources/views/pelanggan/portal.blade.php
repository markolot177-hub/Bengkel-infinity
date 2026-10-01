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
                <a href="{{ route('dashboard.admin') }}" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Dashboard Admin
                </a>
                <a href="{{ route('kasir') }}" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                    Monitoring Servis & Kasir
                </a>
                <a href="#" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    Workstation Mekanik
                </a>
                <!-- Menu Portal Pelanggan Aktif -->
                <a href="#" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
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
                <!-- Role Switcher (Simulasi) -->
                <div class="flex items-center bg-[#F8FAFC] p-1 rounded-lg border border-slate-200">
                    <span class="text-[10px] text-slate-500 font-semibold px-2">Peran:</span>
                    <button class="text-slate-500 hover:text-slate-700 text-[10px] font-semibold px-3 py-1">Admin</button>
                    <button class="text-slate-500 hover:text-slate-700 text-[10px] font-semibold px-3 py-1">Mekanik</button>
                    <button class="bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded shadow-sm">Pelanggan</button>
                </div>
                
                <button class="text-slate-400 hover:text-slate-600 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                </button>

                <!-- Profile Pelanggan -->
                <div class="flex items-center gap-3 border-l border-slate-200 pl-6 cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-slate-300 overflow-hidden border border-slate-200">
                        <img src="https://ui-avatars.com/api/?name=Hendrawan&background=E2E8F0&color=1E293B" alt="Avatar">
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-800 uppercase">Hendrawan</p>
                        <p class="text-[10px] text-slate-500 font-medium">Pelanggan</p>
                    </div>
                    <svg class="text-slate-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </div>
        </header>

        <!-- SCROLLABLE CONTENT -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            
            <!-- Welcome Banner -->
            <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm mb-6 flex justify-between items-center">
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center border border-blue-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a2 2 0 0 0-1.6-.8H5a2 2 0 0 0-2 2v7.55a1 1 0 0 0 .84.99L6 16m8 0a2 2 0 1 0-4 0m10 0a2 2 0 1 0-4 0"></path></svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1.5">
                            <span class="bg-blue-600 text-white text-[9px] font-bold px-2 py-0.5 rounded shadow-sm">SEDANG DIKERJAKAN</span>
                            <span class="bg-slate-900 text-white text-[10px] font-bold px-2 py-0.5 rounded tracking-wide">B 1892 ERT</span>
                            <span class="text-[10px] text-slate-500 font-medium">&bull; Bay 04 (Pit Hidrolik 2)</span>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 mb-0.5">Selamat Datang, Bapak Hendrawan</h2>
                        <p class="text-[11px] text-slate-500">Mitsubishi Xpander Ultimate 1.5L AT (2022) &bull; No. SPK: <span class="font-semibold text-slate-700">#SPK-240509-0082</span></p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        Booking Servis Baru
                    </button>
                    <button class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm flex items-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.2"></path></svg>
                        Perbarui Status
                    </button>
                </div>
            </div>

            <!-- Main Layout (2/3 and 1/3) -->
            <div class="grid grid-cols-3 gap-6 mb-8">
                
                <!-- Left Column (Progres & Inspeksi) -->
                <div class="col-span-2 space-y-6">
                    
                    <!-- Progress Tracker Box -->
                    <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                        <div class="flex justify-between items-center mb-8">
                            <div class="flex items-center gap-2">
                                <svg class="text-blue-600" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                <h3 class="font-bold text-slate-900">Monitoring Progres Servis Real-time</h3>
                            </div>
                            <span class="text-[10px] text-blue-600 bg-blue-50 px-2 py-1 rounded font-semibold flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-blue-600 rounded-full"></span> Penyelesaian ~12:30 WIB</span>
                        </div>

                        <!-- Stepper -->
                        <div class="relative flex justify-between items-start w-full px-4 mb-8">
                            <!-- Line Background -->
                            <div class="absolute top-4 left-8 right-8 h-0.5 bg-slate-200 -z-10"></div>
                            <!-- Line Active -->
                            <div class="absolute top-4 left-8 w-[40%] h-0.5 bg-blue-600 -z-10"></div>

                            <!-- Step 1 (Done) -->
                            <div class="flex flex-col items-center z-10 w-24">
                                <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-sm mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </div>
                                <p class="text-[10px] font-bold text-slate-800 text-center">1. Menunggu</p>
                                <p class="text-[9px] text-slate-500 text-center">10:15 WIB</p>
                                <p class="text-[9px] text-blue-600 font-semibold text-center mt-0.5">Terverifikasi</p>
                            </div>
                            <!-- Step 2 (Done) -->
                            <div class="flex flex-col items-center z-10 w-24">
                                <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-sm mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </div>
                                <p class="text-[10px] font-bold text-slate-800 text-center">2. Pemeriksaan</p>
                                <p class="text-[9px] text-slate-500 text-center">10:30 WIB</p>
                                <p class="text-[9px] text-blue-600 font-semibold text-center mt-0.5">24 Titik Cek</p>
                            </div>
                            <!-- Step 3 (Active) -->
                            <div class="flex flex-col items-center z-10 w-24">
                                <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-md ring-4 ring-blue-100 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                                </div>
                                <p class="text-[10px] font-bold text-blue-700 text-center">3. Pengerjaan</p>
                                <p class="text-[9px] text-slate-500 text-center">11:00 WIB</p>
                                <p class="text-[9px] text-blue-600 font-semibold text-center mt-0.5 animate-pulse">Proses Berjalan</p>
                            </div>
                            <!-- Step 4 (Pending) -->
                            <div class="flex flex-col items-center z-10 w-24 opacity-60">
                                <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 border border-slate-200 flex items-center justify-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </div>
                                <p class="text-[10px] font-medium text-slate-500 text-center">4. Sparepart</p>
                                <p class="text-[9px] text-slate-400 text-center">-</p>
                                <p class="text-[9px] text-slate-500 text-center mt-0.5">Stok Lengkap</p>
                            </div>
                            <!-- Step 5 (Pending) -->
                            <div class="flex flex-col items-center z-10 w-24 opacity-60">
                                <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 border border-slate-200 flex items-center justify-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                </div>
                                <p class="text-[10px] font-medium text-slate-500 text-center">5. Selesai</p>
                                <p class="text-[9px] text-slate-400 text-center">Est. 12:30</p>
                                <p class="text-[9px] text-slate-500 text-center mt-0.5">Quality Check</p>
                            </div>
                            <!-- Step 6 (Pending) -->
                            <div class="flex flex-col items-center z-10 w-24 opacity-60">
                                <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 border border-slate-200 flex items-center justify-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                </div>
                                <p class="text-[10px] font-medium text-slate-500 text-center">6. Diambil</p>
                                <p class="text-[9px] text-slate-400 text-center">Kasir/Penyerahan</p>
                                <p class="text-[9px] text-slate-500 text-center mt-0.5">Serah Terima</p>
                            </div>
                        </div>

                        <!-- Live Catatan -->
                        <div class="bg-blue-50 border border-blue-100 rounded-lg p-3.5 flex justify-between items-center">
                            <div class="flex gap-3 items-center">
                                <div class="text-blue-600 bg-white p-1.5 rounded shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-700">Live Catatan Teknisi <span class="text-slate-400 font-normal ml-1">11:22 WIB</span></p>
                                    <p class="text-[11px] text-slate-600 italic mt-0.5">"Pembersihan throttle body sedang berlangsung, pergantian oli mesin dan filter baru telah selesai dengan baik."</p>
                                </div>
                            </div>
                            <button class="bg-white text-blue-600 border border-blue-200 hover:bg-blue-50 text-[10px] font-bold px-3 py-1.5 rounded shadow-sm flex items-center gap-1.5 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
                                Lihat Kamera Bay
                            </button>
                        </div>
                    </div>

                    <!-- Tech Info & Checklist Grid -->
                    <div class="grid grid-cols-5 gap-6">
                        <!-- Tech Info (2/5) -->
                        <div class="col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-center mb-4">
                                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">TEKNISI PENANGGUNG JAWAB</p>
                                    <span class="bg-blue-50 text-blue-700 text-[9px] font-bold px-2 py-0.5 rounded flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> Grade Master</span>
                                </div>
                                <div class="flex gap-3 items-center mb-4">
                                    <div class="w-12 h-12 rounded-full bg-slate-200 overflow-hidden border border-slate-300 shrink-0">
                                        <img src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=CBD5E1&color=0F172A" alt="Teknisi">
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-sm">Ahmad Fauzi</h4>
                                        <p class="text-[10px] text-slate-500 mt-0.5">Teknisi Senior &bull; Spesialis Engine Tune-Up & Rem</p>
                                        <p class="text-[9px] text-blue-600 font-semibold mt-1 flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Sertifikasi ASE & Mitsubishi Level 3</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center border-t border-slate-100 pt-3">
                                <p class="text-[10px] text-slate-500">Service Advisor: <span class="font-bold text-slate-700">Bambang P.</span></p>
                                <a href="#" class="text-[10px] font-bold text-blue-600 hover:underline flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                    Hubungi Teknisi
                                </a>
                            </div>
                        </div>

                        <!-- Inspection Results (3/5) -->
                        <div class="col-span-3 bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-wide">HASIL CEK 24 TITIK AWAL</p>
                                <span class="bg-slate-100 text-slate-600 text-[9px] font-bold px-2 py-0.5 rounded">Kondisi Umum: Prima (92%)</span>
                            </div>
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <!-- Box 1 -->
                                <div class="bg-slate-50 border border-slate-100 p-2.5 rounded-lg">
                                    <p class="text-[9px] text-slate-500 mb-0.5">Ketebalan Kampas Rem</p>
                                    <p class="text-[11px] font-bold text-slate-800">Depan: 6.8mm | Blk: 4.1mm</p>
                                </div>
                                <!-- Box 2 -->
                                <div class="bg-slate-50 border border-slate-100 p-2.5 rounded-lg">
                                    <p class="text-[9px] text-slate-500 mb-0.5">Kondisi Aki (Voltase)</p>
                                    <p class="text-[11px] font-bold text-slate-800">12.6V &bull; Good (98%)</p>
                                </div>
                                <!-- Box 3 -->
                                <div class="bg-slate-50 border border-slate-100 p-2.5 rounded-lg">
                                    <p class="text-[9px] text-slate-500 mb-0.5">Tekanan Ban (PSI)</p>
                                    <p class="text-[11px] font-bold text-slate-800">D: 33 PSI | B: 35 PSI</p>
                                </div>
                                <!-- Box 4 -->
                                <div class="bg-slate-50 border border-slate-100 p-2.5 rounded-lg">
                                    <p class="text-[9px] text-slate-500 mb-0.5">Sistem Fluida & Radiator</p>
                                    <p class="text-[11px] font-bold text-blue-600">Normal &bull; Titik Didih 110°C</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center border-t border-slate-100 pt-3">
                                <p class="text-[10px] text-slate-500">Odometer: <span class="font-bold text-slate-700">42.150 KM</span></p>
                                <a href="#" class="text-[10px] font-bold text-blue-600 hover:underline">Unduh PDF Inspeksi</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Column (Estimasi Biaya) -->
                <div class="col-span-1 bg-white rounded-xl border border-slate-200 p-5 shadow-sm flex flex-col">
                    <div class="flex justify-between items-center mb-1">
                        <h3 class="font-bold text-slate-900 flex items-center gap-2">
                            <svg class="text-slate-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            Estimasi Biaya
                        </h3>
                        <span class="bg-blue-50 text-blue-700 text-[9px] font-bold px-2 py-0.5 rounded">Live Transparan</span>
                    </div>
                    <p class="text-[9px] text-slate-500 mb-5 border-b border-slate-100 pb-3">Harga suku cadang dan jasa diupdate langsung saat item diproses oleh mekanik.</p>
                    
                    <div class="flex-1 space-y-4">
                        <!-- Item 1 -->
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[11px] font-bold text-slate-800">Jasa Servis Berkala 40.000 KM</p>
                                <p class="text-[9px] text-slate-500 mt-0.5">Paket Tune Up & Inspeksi 24 Titik</p>
                            </div>
                            <p class="text-[11px] font-bold text-slate-800">Rp 250.000</p>
                        </div>
                        <!-- Item 2 -->
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[11px] font-bold text-slate-800">Oli Mesin Fully Synthetic 0W-20</p>
                                <p class="text-[9px] text-slate-500 mt-0.5">4 Liter (Rp 120.000/liter)</p>
                            </div>
                            <p class="text-[11px] font-bold text-slate-800">Rp 480.000</p>
                        </div>
                        <!-- Item 3 -->
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[11px] font-bold text-slate-800">Filter Oli Original Mitsubishi</p>
                                <p class="text-[9px] text-slate-500 mt-0.5">Part No: MD360935</p>
                            </div>
                            <p class="text-[11px] font-bold text-slate-800">Rp 65.000</p>
                        </div>
                        <!-- Item 4 -->
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-[11px] font-bold text-slate-800">Brake Cleaner & Treatment</p>
                                <p class="text-[9px] text-slate-500 mt-0.5">Pembersih Kampas 500ml</p>
                            </div>
                            <p class="text-[11px] font-bold text-slate-800">Rp 55.000</p>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-dashed border-slate-200 space-y-2">
                        <div class="flex justify-between text-[11px] text-slate-600">
                            <span>Subtotal Part & Bahan</span>
                            <span class="font-bold">Rp 600.000</span>
                        </div>
                        <div class="flex justify-between text-[11px] text-slate-600">
                            <span>Subtotal Jasa Teknisi</span>
                            <span class="font-bold">Rp 250.000</span>
                        </div>
                        <div class="flex justify-between text-[11px] text-blue-600">
                            <span>Diskon Member Silver</span>
                            <span class="font-bold">- Rp 0</span>
                        </div>
                        
                        <div class="flex justify-between items-end pt-3 mt-1 border-t border-slate-100">
                            <div>
                                <h4 class="text-xs font-bold text-slate-900">Total Estimasi Sementara</h4>
                                <p class="text-[9px] text-slate-500">Termasuk PPN 11%</p>
                            </div>
                            <h2 class="text-xl font-black text-blue-600 tracking-tight">Rp 850.000</h2>
                        </div>
                    </div>

                    <button class="w-full mt-6 bg-slate-900 hover:bg-black text-white font-bold py-3 rounded-lg text-[11px] shadow-sm flex items-center justify-center gap-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3h18v18H3z"></path><path d="M12 8v8"></path><path d="M8 12h8"></path></svg>
                        Bayar Instan via QRIS / Kasir
                    </button>
                    <p class="text-center text-[8px] text-slate-400 mt-2">Pembayaran dapat diselesaikan saat mobil selesai & serah terima kunci di kasir.</p>
                </div>
            </div>

            <!-- Garasi Section -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Garasi Saya & Riwayat Kendaraan</h3>
                        <p class="text-[11px] text-slate-500">Kelola daftar kendaraan keluarga Anda dan riwayat faktur digital pemeliharaan.</p>
                    </div>
                    <div class="flex bg-white border border-slate-200 rounded-lg p-0.5 text-[10px] font-semibold">
                        <button class="bg-slate-100 text-slate-800 px-4 py-1.5 rounded shadow-sm">Garasi Saya (2)</button>
                        <button class="text-slate-500 hover:text-slate-800 px-4 py-1.5">Riwayat Servis & Nota</button>
                        <button class="text-slate-500 hover:text-slate-800 px-4 py-1.5">Booking Baru</button>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-5">
                    <!-- Car 1 (Active) -->
                    <div class="bg-blue-50/50 border border-blue-100 rounded-xl p-5 relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="bg-blue-600 text-white text-[8px] font-bold px-1.5 py-0.5 rounded uppercase mb-2 inline-block">SEDANG DI BENGKEL</span>
                                <h4 class="font-bold text-slate-900 text-sm">Mitsubishi Xpander Ultimate</h4>
                                <span class="bg-slate-900 text-white px-2 py-0.5 rounded text-[10px] font-bold mt-1 inline-block">B 1892 ERT</span>
                            </div>
                            <div class="text-blue-500 bg-white p-2 rounded-full border border-blue-100 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a2 2 0 0 0-1.6-.8H5a2 2 0 0 0-2 2v7.55a1 1 0 0 0 .84.99L6 16m8 0a2 2 0 1 0-4 0m10 0a2 2 0 1 0-4 0"></path></svg>
                            </div>
                        </div>
                        <div class="space-y-1.5 text-[10px] text-slate-600 mt-4 mb-5">
                            <div class="flex justify-between"><span>Tahun Pembuatan:</span> <span class="font-bold text-slate-800">2022</span></div>
                            <div class="flex justify-between"><span>Transmisi:</span> <span class="font-bold text-slate-800">Automatic (CVT)</span></div>
                            <div class="flex justify-between"><span>Jadwal Servis Berikutnya:</span> <span class="font-bold text-slate-800">50.000 KM / Nov 2024</span></div>
                        </div>
                        <button class="w-full text-blue-600 bg-white border border-blue-200 hover:bg-blue-50 font-bold py-2 rounded text-[10px] transition-colors">Lihat Detail Spesifikasi</button>
                    </div>

                    <!-- Car 2 (Standby) -->
                    <div class="bg-white border border-slate-200 rounded-xl p-5">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <span class="bg-slate-100 text-slate-500 text-[8px] font-bold px-1.5 py-0.5 rounded uppercase mb-2 inline-block">DI RUMAH (STANDBY)</span>
                                <h4 class="font-bold text-slate-900 text-sm">Honda HR-V 1.5 SE</h4>
                                <span class="bg-slate-900 text-white px-2 py-0.5 rounded text-[10px] font-bold mt-1 inline-block">B 4091 PKZ</span>
                            </div>
                            <div class="text-slate-400 bg-slate-50 p-2 rounded-full border border-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a2 2 0 0 0-1.6-.8H5a2 2 0 0 0-2 2v7.55a1 1 0 0 0 .84.99L6 16m8 0a2 2 0 1 0-4 0m10 0a2 2 0 1 0-4 0"></path></svg>
                            </div>
                        </div>
                        <div class="space-y-1.5 text-[10px] text-slate-500 mt-4 mb-5">
                            <div class="flex justify-between"><span>Tahun Pembuatan:</span> <span class="font-bold text-slate-800">2021</span></div>
                            <div class="flex justify-between"><span>Odometer Terakhir:</span> <span class="font-bold text-slate-800">28.400 KM</span></div>
                            <div class="flex justify-between"><span>Servis Terakhir:</span> <span class="font-bold text-slate-800">15 Jan 2024 (Rutin)</span></div>
                        </div>
                        <button class="w-full text-white bg-blue-600 hover:bg-blue-700 font-bold py-2 rounded text-[10px] shadow-sm transition-colors">Jadwalkan Servis Ini</button>
                    </div>

                    <!-- Add New Car -->
                    <div class="bg-slate-50/50 border border-dashed border-slate-300 rounded-xl p-5 flex flex-col items-center justify-center text-center hover:bg-slate-50 transition-colors cursor-pointer group">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </div>
                        <h4 class="font-bold text-slate-800 text-sm mb-1">Tambah Kendaraan Baru</h4>
                        <p class="text-[10px] text-slate-500 mb-3 px-4">Daftarkan mobil atau motor lain untuk monitoring servis serba mudah.</p>
                        <span class="text-[10px] font-bold text-blue-600 group-hover:underline">Registrasi Unit Sekarang &rarr;</span>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>
</html>
