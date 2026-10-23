<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garasi Kendaraan Saya - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F4F7FA] text-slate-800 h-screen flex overflow-hidden">

    <!-- SIDEBAR KHUSUS PELANGGAN -->
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
                        <p class="text-[9px] font-semibold text-slate-500">Portal Layanan Mandiri</p>
                    </div>
                </div>
            </div>

            <!-- Cabang / Lokasi Bengkel Pilihan -->
            <div class="px-5 py-4">
                <div class="bg-blue-50 text-blue-700 px-3 py-2 rounded-lg text-xs font-semibold flex justify-between items-center border border-blue-100">
                    <div class="flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        CABANG PUSAT
                    </div>
                    <span class="bg-white px-1.5 py-0.5 rounded text-[10px] border border-blue-200">Aktif</span>
                </div>
            </div>

            <!-- Menu Navigasi Khusus Pelanggan -->
            <nav class="px-3 space-y-1 mt-2">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Pelanggan</p>

                <a href="/portal-pelanggan" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 hover:text-blue-600 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    Status & Riwayat Servis
                </a>

                <a href="/booking-servis" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 hover:text-blue-600 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    Buat Booking Servis
                </a>

                <!-- Garasi Kendaraan Saya (Aktif) -->
                <a href="/garasi-saya" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9L18 10l-2-4H8L6 10l-2.5 1.1C2.7 11.3 2 12.1 2 13v3c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><circle cx="17" cy="17" r="2"></circle></svg>
                    Garasi Kendaraan Saya
                </a>

                <a href="/" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 hover:text-blue-600 px-3 py-2.5 rounded-lg text-xs font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    Katalog Harga & Suku Cadang
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="px-6 py-4 border-t border-slate-200">
            <div class="flex items-center justify-between text-[10px] text-slate-500 mb-1">
                <span>Status Akun</span>
                <span class="text-emerald-600 font-bold flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> Terverifikasi</span>
            </div>
            <p class="text-[9px] text-slate-400 mb-4">ID: CUST-9921</p>

            <a href="/logout" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Keluar Akun
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- TOP NAVBAR -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <div class="relative w-96">
                <svg class="absolute left-3 top-1.5 text-slate-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="text" placeholder="Cari kendaraan di garasi Anda..." class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg pl-9 pr-3 py-1.5 text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div class="flex items-center gap-6">
                <div class="flex items-center gap-3 border-l border-slate-200 pl-6 cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-slate-300 overflow-hidden border border-slate-200">
                        <img src="https://ui-avatars.com/api/?name=Rina+Melati&background=E2E8F0&color=1E293B" alt="Avatar">
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-800 uppercase">RINA MELATI</p>
                        <p class="text-[10px] text-slate-500 font-medium">PELANGGAN SETIA</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- SCROLLABLE CONTENT -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-xl font-black text-slate-900">Garasi Kendaraan Saya</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Kelola data mobil atau motor Anda untuk memudahkan pendaftaran booking servis berkala.</p>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2.5 rounded-lg shadow-sm transition-colors flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    Tambah Kendaraan Baru
                </button>
            </div>

            <!-- Grid Kendaraan -->
            <div class="grid grid-cols-3 gap-6">

                <!-- Kartu Kendaraan 1 (Aktif Servis) -->
                <div class="bg-white rounded-xl border border-blue-200 shadow-sm overflow-hidden flex flex-col justify-between">
                    <div class="p-5 border-b border-slate-100 bg-blue-50/40">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-slate-900 text-white font-bold text-xs px-2.5 py-1 rounded">B 2841 PKL</span>
                            <span class="bg-blue-600 text-white text-[9px] font-bold px-2 py-0.5 rounded-full">Sedang Servis</span>
                        </div>
                        <h3 class="font-black text-slate-900 text-base">Toyota Yaris 1.5 S CVT</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Tahun: 2021 &bull; Transmisi: Otomatis</p>
                    </div>

                    <div class="p-5 space-y-2 text-xs">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Terakhir Servis:</span>
                            <span class="font-bold text-slate-800">15 Apr 2026</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Odometer Terakhir:</span>
                            <span class="font-bold text-slate-800">19.850 KM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Status Garansi Part:</span>
                            <span class="font-bold text-emerald-600">Aktif (6 Bulan)</span>
                        </div>
                    </div>

                    <div class="p-4 bg-slate-50 border-t border-slate-100 flex gap-2">
                        <a href="/portal-pelanggan" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center font-bold text-xs py-2 rounded-lg transition-colors">
                            Lihat Live Status
                        </a>
                        <button class="bg-white border border-slate-200 hover:bg-slate-100 text-slate-700 font-bold text-xs px-3 py-2 rounded-lg transition-colors">
                            Edit
                        </button>
                    </div>
                </div>

                <!-- Kartu Kendaraan 2 -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between">
                    <div class="p-5 border-b border-slate-100 bg-slate-50">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-slate-900 text-white font-bold text-xs px-2.5 py-1 rounded">B 1492 CYS</span>
                            <span class="bg-slate-200 text-slate-700 text-[9px] font-bold px-2 py-0.5 rounded-full">Tersedia di Garasi</span>
                        </div>
                        <h3 class="font-black text-slate-900 text-base">Honda Brio Satya E</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Tahun: 2023 &bull; Transmisi: Manual</p>
                    </div>

                    <div class="p-5 space-y-2 text-xs">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Terakhir Servis:</span>
                            <span class="font-bold text-slate-800">10 Jan 2026</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Odometer Terakhir:</span>
                            <span class="font-bold text-slate-800">5.400 KM</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Status Garansi Part:</span>
                            <span class="font-bold text-emerald-600">Aktif (Resmi)</span>
                        </div>
                    </div>

                    <div class="p-4 bg-slate-50 border-t border-slate-100 flex gap-2">
                        <a href="/booking-servis" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center font-bold text-xs py-2 rounded-lg transition-colors">
                            Booking Servis
                        </a>
                        <button class="bg-white border border-slate-200 hover:bg-slate-100 text-slate-700 font-bold text-xs px-3 py-2 rounded-lg transition-colors">
                            Edit
                        </button>
                    </div>
                </div>

            </div>

        </main>
    </div>

</body>
</html>
