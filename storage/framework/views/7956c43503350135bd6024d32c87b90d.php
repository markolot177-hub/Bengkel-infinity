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

    <!-- SIDEBAR ADMIN -->
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
                        <p class="text-[9px] font-semibold text-slate-500">Panel Administrator</p>
                    </div>
                </div>
            </div>

            <!-- Navigasi Menu -->
            <nav class="px-3 space-y-1 mt-4">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>

                <a href="/dashboard-admin" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">
                    🏠 Dashboard Utama
                </a>

                <a href="<?php echo e(route('admin.pengguna.index')); ?>" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">
                    👥 Kelola Data Pengguna
                </a>

                <a href="/kasir" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">
                    🚗 Kelola Data Servis
                </a>

                <a href="/manajemen-stok" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">
                    🚙 Kelola Data Kendaraan
                </a>
            </nav>
        </div>

        <div class="px-6 py-4 border-t border-slate-200">
            <a href="/logout" class="flex items-center gap-3 px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold transition-colors">
                🚪 Logout Sistem
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <h2 class="font-bold text-slate-800 text-sm">Dashboard Utama Administrator</h2>
            <div class="flex items-center gap-3">
    <span class="text-xs font-bold text-slate-700 uppercase"><?php echo e(session('nama')); ?> (<?php echo e(session('role')); ?>)</span>
</div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
                <!-- Omset Hari Ini -->
                <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="font-bold text-slate-500 text-[11px] uppercase tracking-wider">Omset Hari Ini</h3>
                        <div class="bg-emerald-100 text-emerald-600 p-1.5 rounded-lg text-sm">💰</div>
                    </div>
                    <div class="text-2xl font-black text-slate-800">Rp <?php echo e(number_format($omsetHariIni, 0, ',', '.')); ?></div>
                    <p class="text-[11px] text-emerald-600 mt-2 font-bold">Total transaksi harian</p>
                </div>

                <!-- Total Jumlah Stok -->
                <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="font-bold text-slate-500 text-[11px] uppercase tracking-wider">Total Sparepart (Stok)</h3>
                        <div class="bg-blue-100 text-blue-600 p-1.5 rounded-lg text-sm">📦</div>
                    </div>
                    <div class="text-2xl font-black text-slate-800"><?php echo e(number_format($totalStok, 0, ',', '.')); ?> <span class="text-sm font-medium text-slate-500">Item</span></div>
                    <p class="text-[11px] text-slate-500 mt-2 font-medium">Tersedia di inventori</p>
                </div>

                <!-- Peringatan Stok Menipis -->
                <div class="<?php echo e($stokMenipis > 0 ? 'bg-red-50 border-red-200' : 'bg-slate-50 border-slate-200'); ?> rounded-xl border p-5 shadow-sm relative overflow-hidden">
                    <div class="flex justify-between items-center mb-3 relative z-10">
                        <h3 class="font-bold <?php echo e($stokMenipis > 0 ? 'text-red-600' : 'text-slate-500'); ?> text-[11px] uppercase tracking-wider">Stok Menipis (<= 5)</h3>
                        <div class="<?php echo e($stokMenipis > 0 ? 'bg-red-100 text-red-600' : 'bg-slate-200 text-slate-600'); ?> p-1.5 rounded-lg text-sm">⚠️</div>
                    </div>
                    <div class="text-2xl font-black <?php echo e($stokMenipis > 0 ? 'text-red-700' : 'text-slate-700'); ?> relative z-10">
                        <?php echo e($stokMenipis); ?> <span class="text-sm font-medium">Barang</span>
                    </div>
                    <?php if($stokMenipis > 0): ?>
                        <p class="text-[11px] text-red-600 mt-2 font-bold relative z-10">Butuh restock segera!</p>
                    <?php else: ?>
                        <p class="text-[11px] text-slate-500 mt-2 font-bold relative z-10">Stok aman terkendali</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Grafik Penjualan Dinamis -->
                <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-slate-900 text-sm">Grafik Pendapatan (7 Hari Terakhir)</h3>
                        <span class="text-[10px] font-bold bg-slate-100 text-slate-500 px-2 py-1 rounded">Update Realtime</span>
                    </div>

                    <div class="h-48 flex items-end justify-between gap-2 border-b border-slate-100 pb-2">
                        <?php $__currentLoopData = $grafik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="w-full bg-blue-300 hover:bg-blue-600 rounded-t-md relative group cursor-pointer transition-all min-h-[5%]" style="height: <?php echo e($g['tinggi_persen']); ?>%;">
                            <span class="absolute -top-7 left-1/2 -translate-x-1/2 text-[10px] font-bold text-slate-700 bg-white shadow-sm border border-slate-200 px-1.5 py-0.5 rounded hidden group-hover:block z-10">
                                <?php echo e($g['total_format']); ?>

                            </span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="flex justify-between mt-3 text-[10px] text-slate-400 font-bold uppercase tracking-wider">
                        <?php $__currentLoopData = $grafik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span><?php echo e($g['hari']); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

               <div class="space-y-4">
                        <?php $__empty_1 = true; $__currentLoopData = $barangHampirHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex justify-between items-center border-b border-slate-100 pb-3">
                            <div>
                                <!-- Menggunakan nama_barang dan harga_jual sesuai database -->
                                <p class="text-xs font-bold text-slate-800"><?php echo e($barang->nama_barang ?? 'Nama Barang'); ?></p>
                                <p class="text-[10px] text-slate-500">Harga: Rp <?php echo e(number_format($barang->harga_jual ?? 0, 0, ',', '.')); ?></p>
                            </div>
                            <!-- Menggunakan jumlah_stok -->
                            <span class="bg-red-100 text-red-700 text-[10px] font-extrabold px-2 py-1 rounded">Sisa <?php echo e($barang->jumlah_stok ?? 0); ?></span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="text-center py-6">
                            <p class="text-xs text-slate-400">Tidak ada stok yang menipis saat ini.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>
</html>
<?php /**PATH C:\Users\X1\OneDrive\Desktop\src\Bengkel-infinity\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>