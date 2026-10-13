<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan & Pendapatan - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F4F7FA] text-slate-800 h-screen flex overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 z-20">
        <div>
            <div class="h-16 flex items-center px-6 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 text-[13px] leading-tight">BengkelCare</h1>
                        <p class="text-[9px] font-semibold text-slate-500">Sistem Servis Terpadu</p>
                    </div>
                </div>
            </div>

            <nav class="px-3 space-y-1 mt-4">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>
                <a href="/manajemen-stok" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">📦 Manajemen Stok</a>
                <a href="/kasir" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">🛒 Monitoring & Kasir</a>
                <a href="/laporan-pendapatan" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">📊 Laporan Keuangan</a>
            </nav>
        </div>
        <div class="px-6 py-4 border-t border-slate-200">
            <a href="/logout" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold">🚪 Keluar Sistem</a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <h2 class="font-bold text-slate-800 text-sm">Laporan Keuangan & Analitik Pendapatan</h2>
            <div class="flex items-center gap-3">
                <span class="text-xs font-bold text-slate-700">ANDI SYARIP (Admin)</span>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-8 space-y-6">

            <!-- KARTU RINGKASAN KEUANGAN -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="bg-white rounded-xl border border-blue-200 p-5 shadow-sm bg-gradient-to-br from-blue-50/50 to-white">
                    <p class="text-[10px] font-bold text-blue-600 uppercase tracking-wide">Total Uang Masuk Hari Ini</p>
                    <h3 class="text-3xl font-black text-slate-900 mt-2">Rp <?php echo e(number_format($totalUangHarian ?? 0, 0, ',', '.')); ?></h3>
                    <p class="text-[11px] text-slate-500 mt-1">Terhitung dari transaksi lunas hari ini.</p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Total Omset Bulan Ini</p>
                    <h3 class="text-3xl font-black text-slate-900 mt-2">Rp <?php echo e(number_format($totalOmsetBulanIni ?? 0, 0, ',', '.')); ?></h3>
                    <p class="text-[11px] text-emerald-600 font-bold mt-1">Akumulasi bulan berjalan</p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Total Keseluruhan Omset</p>
                    <h3 class="text-3xl font-black text-blue-600 mt-2">Rp <?php echo e(number_format($totalSemuaOmset ?? 0, 0, ',', '.')); ?></h3>
                    <p class="text-[11px] text-slate-500 mt-1">Seluruh riwayat transaksi lunas.</p>
                </div>
            </div>

            <!-- TABEL RIWAYAT TRANSAKSI KASIR -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 bg-slate-50 flex justify-between items-center">
                    <h3 class="text-sm font-bold text-slate-900">Riwayat Rinci Transaksi Kasir (Lunas)</h3>
                    <button onclick="window.print()" class="bg-slate-800 text-white font-bold text-[10px] px-3 py-1.5 rounded shadow-sm">🖨️ Cetak Laporan</button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] font-bold text-slate-500 uppercase tracking-wide border-b border-slate-100 bg-slate-50">
                                <th class="py-3 px-6">No. Booking / Nopol</th>
                                <th class="py-3 px-6">Pelanggan & Kendaraan</th>
                                <th class="py-3 px-6">Metode Pembayaran</th>
                                <th class="py-3 px-6">Waktu Selesai</th>
                                <th class="py-3 px-6 text-right">Total Biaya</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs">
                            <?php $__empty_1 = true; $__currentLoopData = $transaksiSelesai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-4 px-6">
                                    <span class="font-bold text-slate-900 block"><?php echo e($trx->no_booking); ?></span>
                                    <span class="bg-slate-900 text-white text-[9px] px-1.5 py-0.5 rounded"><?php echo e($trx->nopol); ?></span>
                                </td>
                                <td class="py-4 px-6 font-semibold text-slate-800">
                                    <?php echo e($trx->nama_pelanggan); ?> <br>
                                    <span class="text-slate-500 text-[11px] font-normal"><?php echo e($trx->kendaraan); ?> (<?php echo e($trx->jenis_layanan); ?>)</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="bg-blue-50 text-blue-700 font-bold px-2 py-1 rounded text-[10px]"><?php echo e($trx->metode_pembayaran ?? 'Tunai'); ?></span>
                                </td>
                                <td class="py-4 px-6 text-slate-500"><?php echo e($trx->updated_at->format('d/m/Y H:i')); ?> WIB</td>
                                <td class="py-4 px-6 text-right font-black text-emerald-600 text-sm">Rp <?php echo e(number_format($trx->total_biaya, 0, ',', '.')); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="py-12 text-center text-slate-400 text-xs">Belum ada transaksi pembayaran kasir yang selesai.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
<?php /**PATH C:\Users\X1\OneDrive\Desktop\src\Bengkel-infinity\resources\views/admin/keuangan.blade.php ENDPATH**/ ?>