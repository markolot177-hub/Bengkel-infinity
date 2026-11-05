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
<body class="bg-[#F8FAFC] text-slate-800 h-screen flex overflow-hidden">

    <!-- OVERLAY SIDEBAR MOBILE -->
    <div id="mobile-sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-slate-900/50 z-30 hidden md:hidden transition-opacity"></div>

    <!-- SIDEBAR MEKANIK -->
    <aside id="sidebar-main" class="fixed md:static inset-y-0 left-0 w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out">
        <div>
            <div class="h-16 flex items-center justify-between px-6 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 text-[13px] leading-tight">BengkelCare</h1>
                        <p class="text-[9px] font-semibold text-slate-500">Workstation Mekanik</p>
                    </div>
                </div>
                <button onclick="toggleSidebar()" class="md:hidden text-slate-400 hover:text-slate-600">✕</button>
            </div>

            <nav class="px-3 space-y-1 mt-4">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Mekanik</p>
                <a href="/workstation-mekanik" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
                    🔧 Workstation Mekanik
                </a>
            </nav>
        </div>

        <div class="px-6 py-4 border-t border-slate-200">
            <a href="/logout" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold transition-colors">
                🚪 Keluar Sistem
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden w-full">

        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-8 shrink-0 z-10">
            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()" class="md:hidden text-slate-600 p-2 rounded-lg border border-slate-200 hover:bg-slate-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h2 class="font-bold text-slate-800 text-xs sm:text-sm truncate">Workstation Pengerjaan Mekanik</h2>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-[11px] sm:text-xs font-bold text-slate-700 uppercase">{{ session('nama') }} ({{ session('role') }})</span>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 sm:p-6 md:p-8 space-y-6">

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <span class="text-[10px] uppercase font-bold bg-emerald-100 px-2 py-0.5 rounded">Berhasil</span>
                </div>
            @endif

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-4 sm:p-6">
                <h3 class="font-bold text-slate-900 text-xs sm:text-sm mb-4">Daftar Antrean & Pengerjaan Kendaraan</h3>

                <div class="space-y-6">
                    @if(isset($bookings) && count($bookings) > 0)
                        @foreach($bookings as $b)
                        <div class="bg-[#F8FAFC] border border-slate-200 rounded-xl p-4 sm:p-5 space-y-4">
                            <div class="flex flex-col sm:flex-row justify-between items-start gap-2">
                                <div>
                                    <span class="bg-slate-900 text-white font-bold text-[10px] px-2.5 py-1 rounded inline-block mb-1">{{ $b->nopol }}</span>
                                    <h4 class="font-bold text-slate-900 text-sm sm:text-base">{{ $b->nama_pelanggan }} - <span class="text-blue-600">{{ $b->kendaraan }}</span></h4>
                                    <p class="text-xs text-slate-500 mt-0.5">Layanan: <span class="font-semibold text-slate-700">{{ $b->jenis_layanan }}</span> | No. Booking: {{ $b->no_booking }}</p>
                                    <p class="text-xs text-slate-600 mt-1 font-medium">Keluhan Pelanggan: {{ $b->keluhan ?? '-' }}</p>
                                </div>
                                <div>
                                    @if($b->status == 'Menunggu')
                                        <span class="bg-amber-100 text-amber-800 font-bold text-[10px] px-3 py-1 rounded-full whitespace-nowrap">Menunggu</span>
                                    @elseif($b->status == 'Dikerjakan')
                                        <span class="bg-blue-100 text-blue-800 font-bold text-[10px] px-3 py-1 rounded-full whitespace-nowrap">Sedang Dikerjakan</span>
                                    @else
                                        <span class="bg-emerald-100 text-emerald-800 font-bold text-[10px] px-3 py-1 rounded-full whitespace-nowrap">Selesai</span>
                                    @endif
                                </div>
                            </div>

                            <form action="{{ route('mekanik.update', $b->id) }}" method="POST" enctype="multipart/form-data" class="bg-white border border-slate-200 p-3 sm:p-4 rounded-xl space-y-3">
                                @csrf
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Ubah Status Pengerjaan:</label>
                                        <select name="status" class="w-full bg-[#F8FAFC] border border-slate-200 rounded p-2 text-xs focus:outline-none focus:border-blue-500">
                                            <option value="Menunggu" {{ $b->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="Dikerjakan" {{ $b->status == 'Dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                                            <option value="Selesai" {{ $b->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Upload Bukti / Lampiran (Foto/PDF):</label>
                                        <input type="file" name="lampiran" class="w-full text-xs text-slate-500 file:mr-4 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700">
                                        @error('lampiran')
                                           <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Catatan Pengerjaan Mekanik:</label>
                                    <textarea name="catatan_mekanik" rows="2" class="w-full bg-[#F8FAFC] border border-slate-200 rounded p-2 text-xs focus:outline-none focus:border-blue-500">{{ $b->catatan_mekanik }}</textarea>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2 rounded-lg shadow-sm transition-colors">
                                        Simpan Progres & Catatan
                                    </button>
                                </div>
                            </form>
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-12 text-slate-400 text-xs">
                            Belum ada kendaraan yang masuk ke workstation mekanik.
                        </div>
                    @endif
                </div>
            </div>

        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar-main');
            const overlay = document.getElementById('mobile-sidebar-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }
    </script>
</body>
</html>
