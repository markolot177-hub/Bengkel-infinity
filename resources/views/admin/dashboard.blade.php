<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F4F7FA] text-slate-800 h-screen flex overflow-hidden">

    <!-- SIDEBAR SESUAI USER FLOW ADMIN -->
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 z-20">
        <div>
            <!-- Logo & Brand -->
            <div class="h-16 flex items-center px-6 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 text-[13px] leading-tight">BengkelCare</h1>
                        <p class="text-[9px] font-semibold text-slate-500">Panel Kontrol Administrator</p>
                    </div>
                </div>
            </div>

            <!-- Navigasi Menu Sesuai User Flow -->
            <nav class="px-3 space-y-1 mt-4">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Utama (User Flow)</p>

                <a href="/dashboard-admin" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
                    🏠 Dashboard Admin
                </a>

                <a href="/kasir" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">
                    🚗 Kelola Data Servis & Kasir
                </a>

                <a href="/workstation-mekanik" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">
                    🔧 Workstation & Pengerjaan
                </a>

                <a href="/manajemen-stok" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">
                    📦 Kelola Data Kendaraan & Stok
                </a>

                <a href="/laporan-pendapatan" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">
                    📊 Lihat Laporan Keuangan
                </a>

                <a href="/portal-pelanggan" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">
                    👥 Kelola Data Pengguna
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer & Logout -->
        <div class="px-6 py-4 border-t border-slate-200 space-y-2">
            <div class="text-[10px] text-slate-400">Sesi Login: <span class="text-emerald-600 font-bold">Aktif</span></div>
            <a href="/" class="flex items-center gap-3 px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold transition-colors">
                🚪 Logout / Keluar Sistem
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- TOP NAVBAR -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <div class="flex items-center gap-3">
                <span class="bg-blue-100 text-blue-800 text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase">Status: Berhasil Login</span>
                <h2 class="font-bold text-slate-800 text-sm">Dashboard Utama Administrator</h2>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-slate-300 overflow-hidden border border-slate-200">
                    <img src="https://ui-avatars.com/api/?name=Andi+Syarip&background=E2E8F0&color=1E293B" alt="Avatar">
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-800">ANDI SYARIP</p>
                    <p class="text-[10px] text-slate-500 font-medium">Administrator / Kepala Bengkel</p>
                </div>
            </div>
        </header>

        <!-- DASHBOARD BODY (USER FLOW VISUALIZATION) -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8 space-y-6">

            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-6 text-white shadow-sm flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-black">Selamat Datang di Panel Kontrol BengkelCare</h2>
                    <p class="text-xs text-blue-100 mt-1">Sistem terintegrasi untuk kelola data pengguna, kendaraan, servis, dan laporan secara real-time.</p>
                </div>
                <div class="flex gap-2">
                    <a href="/kasir" class="bg-white text-blue-700 font-bold text-xs px-4 py-2.5 rounded-xl shadow-sm hover:bg-blue-50">
                        + Buka Kasir POS
                    </a>
                </div>
            </div>

            <!-- Quick Action Cards (User Flow Menu Utama) -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">

                <!-- Kelola Pengguna -->
                <a href="/portal-pelanggan" class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm hover:border-blue-400 transition-all group">
                    <div class="text-blue-600 mb-3 text-lg">👤</div>
                    <h3 class="font-bold text-slate-900 text-sm group-hover:text-blue-600">Kelola Data Pengguna</h3>
                    <p class="text-[11px] text-slate-500 mt-1">Tambah, edit, atau hapus akun pelanggan & staf.</p>
                </a>

                <!-- Kelola Kendaraan -->
                <a href="/manajemen-stok" class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm hover:border-blue-400 transition-all group">
                    <div class="text-blue-600 mb-3 text-lg">🚙</div>
                    <h3 class="font-bold text-slate-900 text-sm group-hover:text-blue-600">Kelola Kendaraan & Stok</h3>
                    <p class="text-[11px] text-slate-500 mt-1">Manajemen data unit, garasi, dan suku cadang.</p>
                </a>

                <!-- Kelola Servis -->
                <a href="/kasir" class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm hover:border-blue-400 transition-all group">
                    <div class="text-blue-600 mb-3 text-lg">⚙️</div>
                    <h3 class="font-bold text-slate-900 text-sm group-hover:text-blue-600">Kelola Data Servis (POS)</h3>
                    <p class="text-[11px] text-slate-500 mt-1">Monitoring antrean, pengerjaan, & pembayaran.</p>
                </a>

                <!-- Lihat Laporan -->
                <a href="/laporan-pendapatan" class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm hover:border-blue-400 transition-all group">
                    <div class="text-blue-600 mb-3 text-lg">📈</div>
                    <h3 class="font-bold text-slate-900 text-sm group-hover:text-blue-600">Lihat Laporan Keuangan</h3>
                    <p class="text-[11px] text-slate-500 mt-1">Analitik omset harian, bulanan, & valuasi stok.</p>
                </a>

            </div>

            <!-- System Status & Flow Check -->
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                <h3 class="font-bold text-slate-900 text-sm mb-3">Status Sistem & Logika Aksi</h3>
                <div class="space-y-2 text-xs text-slate-600">
                    <p class="flex items-center gap-2">✅ <strong class="text-slate-800">Autentikasi Login:</strong> Berhasil melewati validasi kredensial dan masuk ke dashboard admin.</p>
                    <p class="flex items-center gap-2">✅ <strong class="text-slate-800">Manajemen Aksi CRUD:</strong> Semua modul (Stok, Booking, Kasir, Mekanik) siap mengeksekusi tambah, ubah, dan hapus data.</p>
                    <p class="flex items-center gap-2">✅ <strong class="text-slate-800">Pilihan Aksi Lain:</strong> Administrator dapat dengan mudah berpindah antar menu atau melakukan <a href="/" class="text-red-600 font-bold hover:underline">Logout</a> kapan pun.</p>
                </div>
            </div>

        </main>
    </div>

</body>
</html>
