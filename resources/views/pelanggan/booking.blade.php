<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Booking Servis - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F4F7FA] text-slate-800 h-screen flex overflow-hidden">

    <!-- SIDEBAR KHUSUS PELANGGAN -->
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
                <a href="/portal-pelanggan" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">Status & Riwayat Servis</a>
                <a href="/booking-servis" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">Buat Booking Servis</a>
                <a href="/" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">Katalog Harga & Suku Cadang</a>
            </nav>
        </div>
        <div class="px-6 py-4 border-t border-slate-200">
            <a href="/" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold">Keluar Akun</a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <h2 class="font-bold text-slate-800 text-sm">Formulir Booking Servis Mandiri</h2>
            <div class="flex items-center gap-3">
    <span class="text-xs font-bold text-slate-700 uppercase">{{ session('nama') }} ({{ session('role') }})</span>
</div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-8">

            <div class="max-w-3xl mx-auto">
                @if(session('success'))
                    <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex justify-between items-center">
                        <span>{{ session('success') }}</span>
                        <span class="text-[10px] uppercase font-bold bg-emerald-100 px-2 py-0.5 rounded">Berhasil</span>
                    </div>
                @endif

                <div class="mb-6">
                    <h2 class="text-xl font-black text-slate-900">Daftarkan Jadwal Servis Kendaraan</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Isi data kendaraan dan keluhan Anda di bawah ini agar langsung masuk ke antrean bengkel.</p>
                </div>

                <!-- Form Card -->
                <form action="{{ route('booking.store') }}" method="POST" class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 space-y-5">
                    @csrf

                    <!-- Nama Pelanggan (Hidden/Auto atau Text Input) -->
                    <input type="hidden" name="nama_pelanggan" value="Rina Melati">

                    <!-- Nomor Polisi -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Nomor Polisi Kendaraan</label>
                        <input type="text" name="nopol" required placeholder="Contoh: B 2841 PKL" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">
                    </div>

                    <!-- Model Kendaraan -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Model Kendaraan</label>
                        <input type="text" name="kendaraan" required placeholder="Contoh: Honda Vario 125 / Toyota Yaris" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">
                    </div>

                    <!-- Jenis Layanan -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Jenis Layanan / Paket Servis</label>
                        <select name="jenis_layanan" required class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">
                            <option value="Servis Berkala / Tune Up">Servis Berkala / Tune Up</option>
                            <option value="Ganti Oli Mesin & Filter">Ganti Oli Mesin & Filter</option>
                            <option value="Perbaikan Rem (Kampas & Piringan)">Perbaikan Rem (Kampas & Piringan)</option>
                            <option value="Perbaikan Mesin / Kelistrikan">Perbaikan Mesin / Kelistrikan</option>
                        </select>
                    </div>

                    <!-- Tanggal dan Waktu -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Tanggal Kedatangan</label>
                            <input type="date" name="tanggal_kedatangan" required class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Estimasi Waktu Sesi</label>
                            <select name="sesi_waktu" required class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">
                                <option value="Sesi Pagi (09:00 - 11:00 WIB)">Sesi Pagi (09:00 - 11:00 WIB)</option>
                                <option value="Sesi Siang (13:00 - 15:00 WIB)">Sesi Siang (13:00 - 15:00 WIB)</option>
                                <option value="Sesi Sore (15:30 - 17:30 WIB)">Sesi Sore (15:30 - 17:30 WIB)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Keluhan -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Keluhan Kendaraan</label>
                        <textarea name="keluhan" rows="3" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500" placeholder="Tuliskan keluhan kendaraan Anda secara rinci..."></textarea>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="pt-3 border-t border-slate-100 flex justify-end gap-3">
                        <a href="/portal-pelanggan" class="px-4 py-2.5 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 text-xs font-bold transition-colors">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-lg text-xs font-bold shadow-sm transition-colors">
                            Kirim Permintaan Booking
                        </button>
                    </div>

                </form>
            </div>

        </main>
    </div>

</body>
</html>
