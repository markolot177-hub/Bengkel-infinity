<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring & Kasir (POS) - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-[#F8FAFC] text-slate-800 h-screen flex overflow-hidden">

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
                        <p class="text-[9px] font-semibold text-slate-500">Sistem Manajemen Bengkel</p>
                    </div>
                </div>
            </div>

            <nav class="px-3 space-y-1 mt-4">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>
                <a href="/manajemen-stok" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">📦 Manajemen sparepart</a>
                <a href="/kasir" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">🛒 Monitoring & Kasir (POS)</a>
                <a href="/laporan-pendapatan" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">📊 Laporan Keuangan</a>
            </nav>
        </div>
        <div class="px-6 py-4 border-t border-slate-200">
            <a href="/logout" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold">🚪 Keluar Sistem</a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <h2 class="font-bold text-slate-800 text-sm">Sistem Point of Sale (POS) & Kasir</h2>
            <div class="flex items-center gap-3">
                <span class="text-xs font-bold text-slate-700">ANDI SYARIP (Kasir)</span>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-8 space-y-6">

            <?php if(session('success')): ?>
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex justify-between items-center">
                    <span><?php echo e(session('success')); ?></span>
                    <span class="text-[10px] uppercase font-bold bg-emerald-100 px-2 py-0.5 rounded">Berhasil</span>
                </div>
            <?php endif; ?>

            <!-- TAMBAH KENDARAAN OLEH KASIR -->
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm">
                <h3 class="font-bold text-slate-900 text-sm mb-3">➕ Tambah Kendaraan (Walk-in)</h3>
                <form action="<?php echo e(route('booking.store')); ?>" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-3">
                    <?php echo csrf_field(); ?>
                    <div>
                        <input type="text" name="nopol" required placeholder="No. Polisi (D 1234 A)" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <input type="text" name="nama_pelanggan" required placeholder="Nama Pelanggan" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <input type="text" name="kendaraan" required placeholder="Kendaraan (Vario 125)" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <input type="text" name="jenis_layanan" required placeholder="Jenis Servis" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <input type="hidden" name="tanggal_kedatangan" value="<?php echo e(date('Y-m-d')); ?>">
                    <input type="hidden" name="sesi_waktu" value="Langsung">
                    <div>
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs p-2.5 rounded-lg shadow-sm transition-colors">
                            Masuk Antrean
                        </button>
                    </div>
                </form>
            </div>

            <!-- TABEL ANTRIAN & POS -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 bg-white">
                    <h3 class="font-bold text-slate-800 text-sm">Daftar Servis & Transaksi Kasir (POS)</h3>
                </div>

                <div class="overflow-x-auto pb-20">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 text-[10px] font-bold uppercase tracking-wider border-b border-slate-100">
                                <th class="py-3 px-6">Pelanggan & Kendaraan</th>
                                <th class="py-3 px-6">Catatan Mekanik</th>
                                <th class="py-3 px-6">Status Servis</th>
                                <th class="py-3 px-6 text-right">Aksi Kasir</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs font-medium text-slate-700">
                            <?php if(isset($bookings) && count($bookings) > 0): ?>
                                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="py-4 px-6">
                                            <span class="font-bold text-slate-900 block"><?php echo e($b->nama_pelanggan); ?> <span class="bg-slate-900 text-white text-[9px] px-1.5 py-0.5 rounded ml-1"><?php echo e($b->nopol); ?></span></span>
                                            <span class="text-slate-500 text-[11px]"><?php echo e($b->kendaraan); ?> - <?php echo e($b->no_booking); ?></span>
                                        </td>
                                        <td class="py-4 px-6"><?php echo e($b->catatan_mekanik ?? 'Belum ada catatan.'); ?></td>
                                        <td class="py-4 px-6">
                                            <?php if($b->status == 'Menunggu'): ?>
                                                <span class="bg-amber-100 text-amber-800 font-bold text-[10px] px-2.5 py-1 rounded-full">Menunggu</span>
                                            <?php elseif($b->status == 'Dikerjakan'): ?>
                                                <span class="bg-blue-100 text-blue-800 font-bold text-[10px] px-2.5 py-1 rounded-full">Sedang Dikerjakan</span>
                                            <?php else: ?>
                                                <span class="bg-emerald-100 text-emerald-800 font-bold text-[10px] px-2.5 py-1 rounded-full">Lunas (Rp <?php echo e(number_format($b->total_biaya, 0, ',', '.')); ?>)</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="py-4 px-6 text-right">
                                            <?php if($b->status != 'Selesai'): ?>
                                                <button type="button" onclick="togglePos(<?php echo e($b->id); ?>)" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-[11px] px-4 py-2 rounded-lg shadow-sm">
                                                    🛒 Buka POS / Proses Pembayaran
                                                </button>
                                            <?php else: ?>
                                                <div class="flex items-center justify-end gap-2">
                                                    <span class="text-emerald-600 font-bold text-[11px]">Selesai</span>
                                                    <button type="button" onclick="window.print()" class="bg-slate-800 hover:bg-black text-white font-bold text-[10px] px-3 py-1.5 rounded shadow-sm">🖨️ Cetak Struk</button>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                    <?php if($b->status != 'Selesai'): ?>
                                        <tr id="pos-<?php echo e($b->id); ?>" class="hidden bg-slate-50/50 border-b border-slate-200">
                                            <td colspan="4" class="p-6">
                                                <form action="<?php echo e(route('kasir.bayar', $b->id)); ?>" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white border border-slate-200 p-5 rounded-xl shadow-sm">
                                                    <?php echo csrf_field(); ?>
                                                    <div>
                                                        <h4 class="font-bold text-slate-800 text-xs mb-3 border-b border-slate-100 pb-2">1. Pilih Suku Cadang (Inventori)</h4>
                                                        <div class="flex gap-2 mb-4">
                                                            <select id="select-item-<?php echo e($b->id); ?>" class="w-full bg-[#F8FAFC] border border-slate-200 rounded p-2 text-xs focus:outline-none focus:border-blue-500">
                                                                <option value="" disabled selected>-- Pilih Sparepart --</option>
                                                                <?php if(isset($stocks)): ?>
                                                                    <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($stock->id); ?>" data-nama="<?php echo e($stock->nama_barang); ?>" data-harga="<?php echo e($stock->harga_jual); ?>">
                                                                            <?php echo e($stock->nama_barang); ?> (Sisa: <?php echo e($stock->jumlah_stok); ?>) - Rp <?php echo e(number_format($stock->harga_jual, 0, ',', '.')); ?>

                                                                        </option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </select>
                                                            <input type="number" id="qty-<?php echo e($b->id); ?>" value="1" min="1" class="w-16 bg-[#F8FAFC] border border-slate-200 rounded p-2 text-xs text-center" placeholder="Qty">
                                                            <button type="button" onclick="addItem(<?php echo e($b->id); ?>)" class="bg-slate-800 text-white font-bold px-3 py-2 rounded text-[10px] hover:bg-black">Tambah</button>
                                                        </div>
                                                        <div class="bg-[#F8FAFC] border border-slate-200 p-3 rounded h-32 overflow-y-auto">
                                                            <ul id="cart-list-<?php echo e($b->id); ?>" class="space-y-1"></ul>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <h4 class="font-bold text-slate-800 text-xs mb-3 border-b border-slate-100 pb-2">2. Biaya Jasa & Konfirmasi Pembayaran</h4>
                                                        <div class="mb-3">
                                                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Biaya Jasa Servis (Rp):</label>
                                                            <input type="number" name="biaya_jasa" id="biaya-jasa-<?php echo e($b->id); ?>" value="0" min="0" oninput="updateTotal(<?php echo e($b->id); ?>)" class="w-full bg-[#F8FAFC] border border-slate-200 rounded p-2 text-xs focus:outline-none focus:border-blue-500">
                                                        </div>

                                                        <div class="mb-5">
                                                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Metode Pembayaran:</label>
                                                            <select name="metode_pembayaran" required class="w-full bg-[#F8FAFC] border border-slate-200 rounded p-2 text-xs focus:outline-none focus:border-blue-500">
                                                                <option value="Tunai">Tunai / Cash</option>
                                                                <option value="QRIS">QRIS</option>
                                                                <option value="Transfer Bank">Transfer Bank / VA</option>
                                                            </select>
                                                        </div>

                                                        <div class="bg-blue-50 border border-blue-100 rounded-lg p-3 flex justify-between items-center mb-4">
                                                            <span class="font-bold text-blue-800 text-xs">Total Pembayaran:</span>
                                                            <span id="grand-total-<?php echo e($b->id); ?>" class="font-black text-blue-600 text-lg">Rp 0</span>
                                                        </div>

                                                        <div class="flex justify-end gap-2">
                                                            <button type="button" onclick="togglePos(<?php echo e($b->id); ?>)" class="bg-white border border-slate-300 text-slate-600 font-bold px-4 py-2 rounded text-[11px] hover:bg-slate-50">Batal</button>
                                                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-5 py-2 rounded shadow-sm text-[11px]">Terima Pembayaran & Cetak Struk</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="py-12 text-center text-slate-400 text-xs">Belum ada antrean servis.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <script>
        function togglePos(id) {
            const row = document.getElementById('pos-' + id);
            if (row) {
                row.classList.toggle('hidden');
            }
        }

        function addItem(bookingId) {
            const select = document.getElementById('select-item-' + bookingId);
            const qtyInput = document.getElementById('qty-' + bookingId);
            const qty = parseInt(qtyInput.value);

            if (!select || select.value === "" || isNaN(qty) || qty < 1) {
                alert("Harap pilih barang dan masukkan jumlah yang valid.");
                return;
            }

            const option = select.options[select.selectedIndex];
            const id = option.value;
            const nama = option.getAttribute('data-nama');
            const harga = parseInt(option.getAttribute('data-harga'));
            const subtotal = harga * qty;

            const list = document.getElementById('cart-list-' + bookingId);

            const li = document.createElement('li');
            li.className = "flex justify-between items-center text-[11px] mb-1 pb-1 border-b border-slate-200 text-slate-700";
            li.innerHTML = `
                <span>${nama} <span class="font-bold text-blue-600">(x${qty})</span></span>
                <span class="font-bold">Rp ${subtotal.toLocaleString('id-ID')}</span>
                <input type="hidden" name="barang_id[]" value="${id}">
                <input type="hidden" name="qty[]" value="${qty}">
                <input type="hidden" class="subtotal-val-${bookingId}" value="${subtotal}">
            `;

            list.appendChild(li);
            updateTotal(bookingId);

            qtyInput.value = 1;
            select.selectedIndex = 0;
        }

        function updateTotal(bookingId) {
            const subtotals = document.querySelectorAll('.subtotal-val-' + bookingId);
            let totalPart = 0;

            subtotals.forEach(el => {
                totalPart += parseInt(el.value);
            });

            const jasaInput = document.getElementById('biaya-jasa-' + bookingId);
            let jasa = jasaInput ? parseInt(jasaInput.value) : 0;
            if(isNaN(jasa)) jasa = 0;

            const grandTotal = totalPart + jasa;
            const grandTotalEl = document.getElementById('grand-total-' + bookingId);
            if(grandTotalEl) {
                grandTotalEl.innerText = "Rp " + grandTotal.toLocaleString('id-ID');
            }
        }
    </script>
</body>
</html>
<?php /**PATH C:\Users\X1\OneDrive\Desktop\src\Bengkel-infinity\resources\views/admin/kasir.blade.php ENDPATH**/ ?>