<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan & Pendapatan - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }

        @media print {
            @page {
                margin: 1cm;
                size: A4;
            }
            body {
                background: white !important;
                -webkit-print-color-adjust: exact;
            }
            aside, header, button, #mobile-sidebar-overlay, form, nav[aria-label="Breadcrumb"] {
                display: none !important;
            }
            main {
                padding: 0 !important;
                margin: 0 !important;
                width: 100% !important;
            }
            .rounded-xl { border-radius: 0 !important; }
            .shadow-sm { box-shadow: none !important; }
            .border { border: 1px solid #e2e8f0 !important; }

            #kop-surat-print {
                display: block !important;
                text-align: center;
                margin-bottom: 20px;
                border-bottom: 2px solid #000;
                padding-bottom: 10px;
            }
        }

        #kop-surat-print { display: none; }
    </style>
</head>
<body class="bg-[#F4F7FA] text-slate-800 h-screen flex overflow-hidden">

    <!-- OVERLAY SIDEBAR MOBILE -->
    <div id="mobile-sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-slate-900/50 z-30 hidden md:hidden transition-opacity"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar-main" class="fixed md:static inset-y-0 left-0 w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out">
        <div>
            <div class="h-16 flex items-center justify-between px-6 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 text-[13px] leading-tight">BengkelCare</h1>
                        <p class="text-[9px] font-semibold text-slate-500">Sistem Servis Terpadu</p>
                    </div>
                </div>
                <button onclick="toggleSidebar()" class="md:hidden text-slate-400 hover:text-slate-600">✕</button>
            </div>

            <nav class="px-3 space-y-1 mt-4">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>
                <a href="/dashboard-admin" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">Dashboard Utama</a>

                @if(Route::has('admin.pengguna.index'))
                <a href="{{ route('admin.pengguna.index') }}" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">Kelola Data Pengguna</a>
                @endif
                <a href="/manajemen-stok" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">Manajemen sparepart</a>
                <a href="/laporan-pendapatan" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">Laporan Keuangan</a>
            </nav>
        </div>
        <div class="px-6 py-4 border-t border-slate-200">
            <a href="/logout" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold">🚪 Keluar Sistem</a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden w-full">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-8 shrink-0 z-10">
            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()" class="md:hidden text-slate-600 p-2 rounded-lg border border-slate-200 hover:bg-slate-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h2 class="font-bold text-slate-800 text-xs sm:text-sm truncate">Laporan Keuangan & Analitik Pendapatan</h2>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-[11px] sm:text-xs font-bold text-slate-700 uppercase">{{ session('nama') }} ({{ session('role') }})</span>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 sm:p-6 md:p-8 space-y-6">

            <!-- BREADCRUMB NAVIGASI -->
            <nav class="flex px-4 py-2.5 text-slate-500 bg-white border border-slate-200 rounded-xl shadow-sm text-xs font-medium" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="/dashboard-admin" class="inline-flex items-center text-slate-500 hover:text-blue-600">
                            <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l1.293 1.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-slate-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-blue-600 font-bold">Laporan Keuangan</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- KOP SURAT (HANYA PRINT) -->
            <div id="kop-surat-print">
                <h1 style="font-size: 24px; font-weight: 900; margin: 0;">BENGKELCARE CIWIDEY</h1>
                <p style="font-size: 14px; margin: 5px 0;">Jl. Barutunggul, Ciwidey, Kabupaten Bandung</p>
                <p style="font-size: 14px; font-weight: bold; margin: 10px 0 0 0;">LAPORAN KEUANGAN DAN TRANSAKSI KASIR</p>
                @if($tglMulai && $tglSelesai)
                    <p style="font-size: 12px; margin: 5px 0 0 0;">Periode: {{ \Carbon\Carbon::parse($tglMulai)->format('d/m/Y') }} s/d {{ \Carbon\Carbon::parse($tglSelesai)->format('d/m/Y') }}</p>
                @endif
                <p style="font-size: 12px; margin: 0;">Dicetak pada: {{ date('d/m/Y H:i') }} WIB</p>
            </div>

            <!-- KARTU RINGKASAN KEUANGAN -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-5">
                <div class="bg-white rounded-xl border border-blue-200 p-4 sm:p-5 shadow-sm bg-gradient-to-br from-blue-50/50 to-white">
                    <p class="text-[10px] font-bold text-blue-600 uppercase tracking-wide">Total Uang Masuk Hari Ini</p>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mt-2">Rp {{ number_format($totalUangHarian ?? 0, 0, ',', '.') }}</h3>
                    <p class="text-[11px] text-slate-500 mt-1">Terhitung dari transaksi lunas hari ini.</p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-4 sm:p-5 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Total Omset Bulan Ini</p>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 mt-2">Rp {{ number_format($totalOmsetBulanIni ?? 0, 0, ',', '.') }}</h3>
                    <p class="text-[11px] text-emerald-600 font-bold mt-1">Akumulasi bulan berjalan</p>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-4 sm:p-5 shadow-sm sm:col-span-2 md:col-span-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wide">Total Keseluruhan Omset</p>
                    <h3 class="text-2xl sm:text-3xl font-black text-blue-600 mt-2">Rp {{ number_format($totalSemuaOmset ?? 0, 0, ',', '.') }}</h3>
                    <p class="text-[11px] text-slate-500 mt-1">Seluruh riwayat transaksi lunas.</p>
                </div>
            </div>

            <!-- FORM FILTER RENTANG TANGGAL -->
            <div class="bg-white rounded-xl border border-slate-200 p-4 sm:p-6 shadow-sm">
                <h3 class="font-bold text-slate-900 text-xs sm:text-sm mb-3">📅 Filter Laporan Berdasarkan Tanggal</h3>
                <form action="/laporan-pendapatan" method="GET" class="flex flex-col sm:flex-row items-end gap-3">
                    <div class="w-full sm:w-auto flex-1">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Dari Tanggal:</label>
                        <input type="date" name="tgl_mulai" value="{{ $tglMulai ?? '' }}" required class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 font-semibold focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="w-full sm:w-auto flex-1">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Sampai Tanggal:</label>
                        <input type="date" name="tgl_selesai" value="{{ $tglSelesai ?? '' }}" required class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 font-semibold focus:outline-none focus:border-blue-500">
                    </div>
                    <div class="flex gap-2 w-full sm:w-auto">
                        <button type="submit" class="flex-1 sm:flex-none bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-5 py-2.5 rounded-lg shadow-sm transition-colors flex items-center justify-center gap-1.5">
                            🔍 Tampilkan
                        </button>
                        @if($tglMulai || $tglSelesai)
                            <a href="/laporan-pendapatan" class="flex-1 sm:flex-none bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs px-4 py-2.5 rounded-lg transition-colors flex items-center justify-center">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- TABEL RIWAYAT TRANSAKSI KASIR -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mt-6">
                <div class="p-4 sm:p-5 border-b border-slate-100 bg-slate-50 flex justify-between items-center flex-wrap gap-3">
                    <div>
                        <h3 class="text-xs sm:text-sm font-bold text-slate-900">Riwayat Rinci Transaksi Kasir (Lunas)</h3>
                        @if($tglMulai && $tglSelesai)
                            <p class="text-[11px] text-blue-600 font-bold mt-0.5">
                                Periode: {{ \Carbon\Carbon::parse($tglMulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($tglSelesai)->format('d/m/Y') }}
                                | Total Periode: <span class="text-emerald-600">Rp {{ number_format($totalHasilFilter ?? 0, 0, ',', '.') }}</span>
                            </p>
                        @endif
                    </div>
                    <button onclick="cetakLaporanDenganLoading(this)" class="bg-slate-800 text-white font-bold text-[10px] px-3 py-1.5 rounded shadow-sm hover:bg-black transition-all flex items-center gap-1">
                        🖨️ Cetak Laporan
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left min-w-[600px]">
                        <thead>
                            <tr class="text-[10px] font-bold text-slate-500 uppercase tracking-wide border-b border-slate-100 bg-slate-50">
                                <th class="py-3 px-4 sm:px-6">ID Transaksi / Nopol</th>
                                <th class="py-3 px-4 sm:px-6">Catatan Transaksi</th>
                                <th class="py-3 px-4 sm:px-6">Metode</th>
                                <th class="py-3 px-4 sm:px-6">Waktu Selesai</th>
                                <th class="py-3 px-4 sm:px-6 text-right">Total Biaya</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs">
                            @forelse($transaksiSelesai as $trx)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-4 px-4 sm:px-6">
                                    <span class="font-bold text-slate-900 block">TRX-{{ $trx->id_transaksi ?? $trx->id }}</span>
                                    <span class="bg-slate-900 text-white text-[9px] px-1.5 py-0.5 rounded">{{ explode(' ', $trx->keterangan)[2] ?? '-' }}</span>
                                </td>
                                <td class="py-4 px-4 sm:px-6 font-semibold text-slate-800">
                                    {{ $trx->keterangan }}
                                </td>
                                <td class="py-4 px-4 sm:px-6">
                                    <span class="bg-blue-50 text-blue-700 font-bold px-2 py-1 rounded text-[10px]">{{ $trx->metode_pembayaran ?? 'Tunai' }}</span>
                                </td>
                                <td class="py-4 px-4 sm:px-6 text-slate-500 whitespace-nowrap">{{ \Carbon\Carbon::parse($trx->tgl_transaksi)->format('d/m/Y H:i') }} WIB</td>
                                <td class="py-4 px-4 sm:px-6 text-right font-black text-emerald-600 text-xs sm:text-sm whitespace-nowrap">Rp {{ number_format($trx->total_biaya, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-slate-400 text-xs">
                                    @if($tglMulai && $tglSelesai)
                                        Tidak ditemukan transaksi pada rentang tanggal yang dipilih.
                                    @else
                                        Belum ada transaksi pembayaran kasir yang selesai.
                                    @endif
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <!-- SCRIPT UTAMA & INDIKATOR LOADING -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar-main');
            const overlay = document.getElementById('mobile-sidebar-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function cetakLaporanDenganLoading(btn) {
            const originalHTML = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="animate-spin h-3.5 w-3.5 text-white inline-block mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Menyiapkan Dokumen...
            `;

            setTimeout(() => {
                window.print();
                btn.disabled = false;
                btn.innerHTML = originalHTML;
            }, 500);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function () {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn && !submitBtn.disabled) {
                        submitBtn.disabled = true;
                        submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
                        submitBtn.innerHTML = `
                            <svg class="animate-spin -ml-1 mr-1.5 h-3.5 w-3.5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memproses...
                        `;
                    }
                });
            });
        });
    </script>
</body>
</html>