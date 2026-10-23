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
<body class="bg-[#F8FAFC] text-slate-800 h-screen flex overflow-hidden">

    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 z-20">
        <div>
            <div class="h-16 flex items-center px-6 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 text-[13px] leading-tight">BengkelCare</h1>
                        <p class="text-[9px] font-semibold text-slate-500">Portal Layanan Mandiri</p>
                    </div>
                </div>
            </div>

            <nav class="px-3 space-y-1 mt-4">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Pelanggan</p>
                <a href="/portal-pelanggan" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">Status & Riwayat Servis</a>
                <a href="/booking-servis" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">Buat Booking Servis</a>
                <a href="/" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">Katalog Harga & Suku Cadang</a>
            </nav>
        </div>
        <div class="px-6 py-4 border-t border-slate-200">
            <a href="/" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold">Keluar Akun</a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <h2 class="font-bold text-slate-800 text-sm">Portal Status Servis Pelanggan</h2>
            <div class="flex items-center gap-3">
                <span class="text-xs font-bold text-slate-700 uppercase">{{ session('nama') }} ({{ session('role') }})</span>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-8 space-y-6">

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <span class="text-[10px] uppercase font-bold bg-emerald-100 px-2 py-0.5 rounded">Berhasil</span>
                </div>
            @endif

            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-6 text-white shadow-sm flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-black">Status Kendaraan & Riwayat Booking</h2>
                    <p class="text-xs text-blue-100 mt-1">Pantau progres pengerjaan mekanik dan rincian biaya secara transparan.</p>
                </div>
                <a href="/booking-servis" class="bg-white text-blue-700 hover:bg-blue-50 font-bold text-xs px-5 py-3 rounded-xl shadow-sm">
                    + Buat Booking Baru
                </a>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 space-y-4">
                <h3 class="font-bold text-slate-900 text-sm">Daftar Kendaraan & Progres Servis</h3>

                @if(isset($bookings) && count($bookings) > 0)
                    @foreach($bookings as $b)
                    <div class="bg-[#F8FAFC] border border-slate-200 rounded-xl p-5 space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="bg-slate-900 text-white font-bold text-[10px] px-2 py-0.5 rounded">{{ $b->nopol }}</span>
                                <h4 class="font-bold text-slate-900 text-sm mt-1">{{ $b->kendaraan }}</h4>
                                <p class="text-xs text-slate-500">Layanan: {{ $b->jenis_layanan }} | Keluhan: {{ $b->keluhan ?? '-' }}</p>
                            </div>
                            <div class="text-right">
                                <span class="text-[10px] text-slate-400 font-bold block">NO. BOOKING</span>
                                <span class="text-xs font-extrabold text-blue-600">{{ $b->no_booking }}</span>
                            </div>
                        </div>

                        <!-- Status & Catatan Mekanik -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-3 border-t border-slate-200">
                            <div>
                                <span class="text-[10px] text-slate-500 font-bold uppercase block mb-1">Status Saat Ini:</span>
                                @if($b->status == 'Menunggu')
                                    <span class="bg-amber-100 text-amber-800 font-bold text-[10px] px-2.5 py-1 rounded-full">Menunggu Antrean</span>
                                @elseif($b->status == 'Dikerjakan')
                                    <span class="bg-blue-100 text-blue-800 font-bold text-[10px] px-2.5 py-1 rounded-full">Sedang Dikerjakan Mekanik</span>
                                @else
                                    <span class="bg-emerald-100 text-emerald-800 font-bold text-[10px] px-2.5 py-1 rounded-full">Selesai / Lunas (Rp {{ number_format($b->total_biaya, 0, ',', '.') }})</span>
                                @endif
                            </div>
                            <div>
                                <span class="text-[10px] text-slate-500 font-bold uppercase block mb-1">Catatan Mekanik:</span>
                                <p class="text-xs font-medium text-slate-700 bg-white p-2.5 rounded-lg border border-slate-200">
                                    {{ $b->catatan_mekanik ?? 'Belum ada catatan dari mekanik.' }}
                                </p>
                            </div>
                        </div>

                        <!-- LAMPIRAN / BUKTI FOTO DARI MEKANIK -->
                        <div class="pt-2 border-t border-slate-200">
                            <span class="text-[10px] text-slate-500 font-bold uppercase block mb-2">Lampiran / Bukti Pengerjaan Mekanik:</span>
                            @if($b->lampiran)
                                <div class="flex items-center gap-4">
                                    <a href="{{ asset('uploads/lampiran/' . $b->lampiran) }}" target="_blank">
                                        <img src="{{ asset('uploads/lampiran/' . $b->lampiran) }}" alt="Bukti Servis" class="w-28 h-20 object-cover rounded-lg border border-slate-300 shadow-sm hover:opacity-90 transition-opacity">
                                    </a>
                                    <div>
                                        <a href="{{ asset('uploads/lampiran/' . $b->lampiran) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-[11px] px-3.5 py-2 rounded-lg shadow-sm inline-block transition-colors">
                                            🔍 Lihat Foto Ukuran Penuh
                                        </a>
                                        <p class="text-[10px] text-slate-400 mt-1">Klik gambar atau tombol untuk melihat detail foto.</p>
                                    </div>
                                </div>
                            @else
                                <p class="text-xs text-slate-400 italic">Belum ada lampiran foto yang diunggah oleh mekanik.</p>
                            @endif
                        </div>

                    </div>
                    @endforeach
                @else
                    <div class="text-center py-12 text-slate-400 text-xs">Belum ada riwayat booking atau kendaraan dalam antrean.</div>
                @endif
            </div>

        </main>
    </div>

</body>
</html>
