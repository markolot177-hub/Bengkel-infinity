<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BengkelCare - Workshop Terminal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F8FAFC] min-h-screen flex flex-col relative text-slate-800">

    <header class="p-6 flex justify-between items-center absolute top-0 w-full z-10">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-white border border-slate-200 rounded-md flex items-center justify-center text-blue-600 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
            </div>
            <div>
                <h1 class="font-bold text-slate-900 text-sm leading-none mb-1">BengkelCare</h1>
                <p class="text-[9px] font-bold text-slate-500 uppercase tracking-widest">Workshop Terminal</p>
            </div>
        </div>
        <div class="bg-blue-50 text-blue-700 px-3 py-1.5 rounded-full text-xs font-semibold flex items-center gap-2 border border-blue-100">
            <span class="w-2 h-2 rounded-full bg-blue-600"></span> Server Online
        </div>
    </header>

    <div class="absolute top-24 w-full flex justify-center z-10">
        <div class="bg-white px-5 py-2.5 rounded-full shadow-sm border border-slate-200 flex items-center gap-4 text-xs">
            <div class="flex items-center gap-2 text-slate-600">
                <div class="bg-blue-50 text-blue-600 p-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                </div>
                <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wide">Sistem Operasional &bull;</span> 
                <span class="text-slate-800 font-bold">Cabang Pusat - Bay 1-8</span>
                <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-[10px] font-semibold">Enterprise v3.4</span>
            </div>
            <div class="w-px h-4 bg-slate-200"></div>
            <div class="flex items-center gap-2 text-slate-500 text-[11px] font-medium">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span> Database Terkoneksi (Latency: 14ms)
            </div>
            <div class="flex items-center gap-1 text-slate-600 bg-slate-50 px-2 py-1 rounded border border-slate-100 text-[11px] font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                ISO/IEC 27001 Terverifikasi
            </div>
        </div>
    </div>

    <main class="flex-1 flex items-center justify-center p-4 mt-20">
        <div class="bg-white w-full max-w-[520px] rounded-2xl shadow-sm border border-slate-200 p-10">
            
            <div class="flex justify-between items-start mb-2">
                <h2 class="text-[22px] font-bold text-slate-900">Masuk ke Akun Anda</h2>
                <span class="bg-blue-100 text-blue-700 text-[10px] font-bold px-3 py-1 rounded-full">Multi-Role Portal</span>
            </div>
            <p class="text-[13px] text-slate-500 mb-6 leading-relaxed">Satu gerbang masuk untuk Admin Bengkel, Teknisi/Mekanik, dan Pelanggan. Sistem otomatis mendeteksi hak akses akun Anda.</p>

            <!-- ACTION FORM KE ROUTE DASHBOARD ADMIN -->
            <form action="{{ route('dashboard.admin') }}" method="GET">
                <div class="mb-4">
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="text-[13px] font-bold text-slate-800">Email / ID Karyawan / No. Handphone</label>
                        <a href="#" class="text-[11px] font-semibold text-blue-600 hover:underline">Format ID?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        </div>
                        <input type="text" value="admin@bengkelcare.id" class="bg-[#F8FAFC] border border-slate-200 text-slate-900 text-sm rounded-lg block w-full pl-10 p-3 focus:outline-none focus:border-blue-500" placeholder="Masukkan ID">
                    </div>
                </div>

                <div class="mb-5">
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="text-[13px] font-bold text-slate-800">Kata Sandi / PIN Keamanan</label>
                        <a href="#" class="text-[11px] font-semibold text-blue-600 hover:underline">Lupa kata sandi?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        </div>
                        <input type="password" value="Adm1n@2024!" class="bg-[#F8FAFC] border border-slate-200 text-slate-900 text-sm rounded-lg block w-full pl-10 pr-10 p-3 focus:outline-none focus:border-blue-500" placeholder="••••••••">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input id="remember" type="checkbox" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="remember" class="ml-2 text-xs font-medium text-slate-600">Ingat sesi di perangkat terminal ini</label>
                    </div>
                    <span class="text-[10px] text-slate-400 font-medium">Enkripsi SHA-256</span>
                </div>

                <button type="submit" class="w-full text-white bg-[#0F172A] hover:bg-black font-semibold rounded-lg text-sm px-5 py-3.5 text-center flex justify-center items-center gap-2 transition-colors">
                    Masuk ke Sistem BengkelCare
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
            </form>

            <div class="mt-6 mb-6 flex items-center justify-center w-full">
                <hr class="w-full border-slate-100">
                <span class="px-3 text-[10px] text-slate-400 font-bold tracking-wider whitespace-nowrap uppercase">Atau Masuk Cepat</span>
                <hr class="w-full border-slate-100">
            </div>

            <button class="w-full text-blue-700 bg-[#F4F7FF] border border-blue-100 hover:bg-blue-50 font-semibold rounded-lg text-sm px-5 py-3.5 text-center flex justify-center items-center gap-2 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                Masuk via WhatsApp OTP <span class="font-normal text-slate-500">(Langsung ke Nomor HP)</span>
            </button>

            <div class="mt-7 bg-[#F8FAFC] rounded-xl p-4 border border-slate-100">
                <div class="flex justify-between items-center mb-1">
                    <div class="flex items-center gap-1.5 text-xs font-bold text-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        Registrasi Cabang / Lupa Akses Karyawan
                    </div>
                    <a href="#" class="text-[11px] font-semibold text-blue-600 hover:underline flex items-center gap-1">
                        Buka Layanan WhatsApp Care
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                    </a>
                </div>
                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Perlu pendaftaran teknisi pit baru atau sinkronisasi printer struk thermal bengkel? Hubungi Tim IT Technical Support BengkelCare di ekstensi #104.</p>
            </div>

        </div>
    </main>

    <footer class="px-8 pb-6 pt-4 flex justify-between items-center text-[10px] font-medium text-slate-500">
        <div>
            BengkelCare Cloud Edition &bull; Build v4.8.2-auto
        </div>
        <div class="flex gap-4">
            <a href="#" class="hover:text-slate-800">Status Layanan</a>
            <a href="#" class="hover:text-slate-800">Bantuan Teknis</a>
            <span>&copy; 2024 BengkelCare ID. All rights reserved.</span>
        </div>
    </footer>

</body>
</html>