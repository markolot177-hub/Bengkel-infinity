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
<body class="bg-[#F8FAFC] text-slate-800 h-screen flex items-center justify-center">

    <div class="max-w-md w-full bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">

        <div class="text-center mb-8">
            <h1 class="font-black text-2xl text-slate-900">BengkelCare</h1>
            <p class="text-xs text-slate-500 mt-1">Sistem Manajemen & Servis Terpadu</p>
        </div>

        <!-- Tampilkan Error Jika Login Gagal -->
        <?php if($errors->any()): ?>
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-xs font-semibold">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <!-- FORM LOGIN UTAMA -->
        <form action="<?php echo e(route('login.proses')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?> <!-- Wajib ada untuk mencegah error 419 Page Expired -->

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">Email Akun</label>
                <input type="email" name="email" required placeholder="Cth: admin@bengkelcare.com" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-3 text-xs focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">Kata Sandi</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-3 text-xs focus:outline-none focus:border-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs p-3 rounded-lg shadow-sm transition-colors mt-2">
                Masuk ke Sistem BengkelCare
            </button>
        </form>

        

    </div>

</body>
</html>
<?php /**PATH /workspaces/Bengkel-infinity/resources/views/welcome.blade.php ENDPATH**/ ?>