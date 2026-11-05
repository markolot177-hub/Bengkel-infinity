<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F8FAFC] text-slate-800 min-h-screen flex items-center justify-center p-4 sm:p-6">

    <div class="max-w-md w-full bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm">

        <div class="text-center mb-6 sm:mb-8">
            <h1 class="font-black text-2xl sm:text-3xl text-slate-900">BengkelCare</h1>
            <p class="text-xs text-slate-500 mt-1">Sistem Manajemen & Servis Terpadu</p>
        </div>

        <!-- Tampilkan Error Jika Login Gagal -->
        @if($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-xs font-semibold">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- FORM LOGIN UTAMA -->
        <form action="{{ route('login.proses') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">Username / Email</label>
                <input type="text" name="email" required placeholder="Masukkan username atau email Anda" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-3 text-xs focus:outline-none focus:border-blue-500" value="{{ old('email') }}">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">Kata Sandi</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required placeholder="••••••••" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-3 pr-10 text-xs focus:outline-none focus:border-blue-500">
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs p-3 rounded-lg shadow-sm transition-colors mt-2">
                Masuk ke Sistem BengkelCare
            </button>
        </form>

    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                `;
            }
        }
    </script>
</body>
</html>
