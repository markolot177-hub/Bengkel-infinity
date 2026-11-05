<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring & Kasir (POS) - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }

        #modal-preview {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.8);
            z-index: 50;
            display: none;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(4px);
            padding: 10px;
        }

        .preview-container {
            background: #fff;
            width: 100%;
            max-width: 80mm;
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
        }

        #struk-content {
            width: 58mm;
            margin: 0 auto;
            padding: 15px 10px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 11px;
            color: #000;
            line-height: 1.2;
            background: white;
        }

        .struk-divider {
            border-bottom: 1px dashed #000;
            margin: 5px 0;
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .flex-between { display: flex; justify-content: space-between; }

        @page {
            size: 58mm 140mm;
            margin: 0;
        }

        @media print {
            html, body {
                width: 58mm !important;
                height: auto !important;
                margin: 0 !important;
                padding: 0 !important;
                display: block !important;
                overflow: visible !important;
                background: #fff !important;
            }

            body > *:not(#modal-preview) {
                display: none !important;
            }

            #modal-preview {
                display: block !important;
                position: static !important;
                inset: auto !important;
                width: 58mm !important;
                background: transparent !important;
                backdrop-filter: none !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .preview-container {
                width: 58mm !important;
                max-height: none !important;
                overflow: visible !important;
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
                display: block !important;
            }

            .print\:hidden {
                display: none !important;
            }

            #struk-content-wrapper {
                padding: 0 !important;
                margin: 0 !important;
                display: block !important;
            }

            #struk-content {
                width: 58mm !important;
                margin: 0 !important;
                padding: 2mm 3mm !important;
                box-sizing: border-box !important;
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body class="bg-[#F8FAFC] text-slate-800 h-screen flex overflow-hidden">

    <!-- MODAL PREVIEW STRUK SEBELUM PRINT -->
    <div id="modal-preview">
        <div class="preview-container">
            <div class="bg-slate-100 p-3 flex justify-between items-center border-b border-slate-200 sticky top-0 print:hidden">
                <span class="font-bold text-xs text-slate-700">Preview Struk Kasir</span>
                <button onclick="tutupPreview()" class="text-red-500 hover:bg-red-50 p-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>

            <div id="struk-content-wrapper" class="bg-white flex justify-center py-4">
                <div id="struk-content">
                    <div class="text-center">
                        <h2 style="margin: 0; font-size: 16px; font-weight: bold;">BENGKELCARE</h2>
                        <div style="font-size: 9px; margin-top: 2px;">SMK Budi Bakti Ciwidey</div>
                        <div style="font-size: 9px;">Jl. Barutunggul, Ciwidey</div>
                        <div style="font-size: 9px;">Kabupaten Bandung</div>
                    </div>

                    <div class="struk-divider"></div>

                    <div style="font-size: 9px;">
                        <div class="flex-between"><span>Tgl:</span> <span id="struk-tgl">-</span></div>
                        <div class="flex-between"><span>No :</span> <span id="struk-notrans">-</span></div>
                        <div class="flex-between"><span>Plg:</span> <span id="struk-pelanggan">-</span></div>
                        <div class="flex-between"><span>Nopol:</span> <span id="struk-nopol">-</span></div>
                    </div>

                    <div class="struk-divider"></div>

                    <div style="font-size: 10px;" id="struk-items"></div>

                    <div class="struk-divider"></div>

                    <div style="font-size: 11px;">
                        <div class="flex-between" style="font-weight: bold; font-size: 13px;">
                            <span>TOTAL:</span>
                            <span id="struk-total">-</span>
                        </div>
                        <div class="flex-between">
                            <span>TUNAI:</span>
                            <span id="struk-bayar">-</span>
                        </div>
                        <div class="flex-between">
                            <span>KEMBALI:</span>
                            <span id="struk-kembali">-</span>
                        </div>
                    </div>

                    <div class="struk-divider"></div>

                    <div class="text-center" style="font-size: 9px; margin-top: 5px;">
                        <div>Terima Kasih</div>
                        <div>Barang yang dibeli tidak</div>
                        <div>dapat dikembalikan.</div>
                        <div style="margin-top: 5px;">* BengkelCare *</div>
                    </div>
                </div>
            </div>

            <div class="p-4 border-t border-slate-200 bg-white sticky bottom-0 print:hidden">
                <button id="btn-print-struk" onclick="cetakStrukDenganLoading(this)" class="w-full bg-slate-900 hover:bg-black text-white font-bold py-2.5 rounded-lg text-sm shadow-md transition-colors flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                    Print Struk Sekarang
                </button>
            </div>
        </div>
    </div>

    <!-- OVERLAY SIDEBAR MOBILE -->
    <div id="mobile-sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-slate-900/50 z-30 hidden md:hidden transition-opacity"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar-main" class="fixed md:static inset-y-0 left-0 w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out print:hidden">
        <div>
            <div class="h-16 flex items-center justify-between px-6 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 text-[13px] leading-tight">BengkelCare</h1>
                        <p class="text-[9px] font-semibold text-slate-500">Sistem Manajemen Bengkel</p>
                    </div>
                </div>
                <button onclick="toggleSidebar()" class="md:hidden text-slate-400 hover:text-slate-600">✕</button>
            </div>

            <nav class="px-3 space-y-1 mt-4">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>
                <a href="/kasir" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">🛒 Monitoring & Kasir (POS)</a>
            </nav>
        </div>
        <div class="px-6 py-4 border-t border-slate-200">
            <a href="/logout" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold">🚪 Keluar Sistem</a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden w-full print:hidden">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-8 shrink-0 z-10">
            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()" class="md:hidden text-slate-600 p-2 rounded-lg border border-slate-200 hover:bg-slate-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h2 class="font-bold text-slate-800 text-xs sm:text-sm truncate">Sistem Point of Sale (POS) & Kasir</h2>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-[11px] sm:text-xs font-bold text-slate-700 uppercase">{{ session('nama') }} ({{ session('role') }})</span>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 sm:p-6 md:p-8 space-y-6">

            <!-- BREADCRUMB NAVIGASI -->
            <nav class="flex px-4 py-2.5 text-slate-500 bg-white border border-slate-200 rounded-xl shadow-sm text-xs font-medium print:hidden" aria-label="Breadcrumb">
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
                            <span class="text-blue-600 font-bold">Monitoring & Kasir (POS)</span>
                        </div>
                    </li>
                </ol>
            </nav>

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <span class="text-[10px] uppercase font-bold bg-emerald-100 px-2 py-0.5 rounded">Berhasil</span>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl text-xs font-semibold flex justify-between items-center">
                    <span>{{ session('error') }}</span>
                    <span class="text-[10px] uppercase font-bold bg-red-100 px-2 py-0.5 rounded">Gagal</span>
                </div>
            @endif
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl text-xs">
                    <ul class="list-disc pl-4">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- TAMBAH KENDARAAN OLEH KASIR -->
            <div class="bg-white rounded-xl border border-slate-200 p-4 sm:p-6 shadow-sm">
                <h3 class="font-bold text-slate-900 text-xs sm:text-sm mb-3">➕ Tambah Kendaraan (Walk-in)</h3>
                <form action="{{ route('booking.store') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-3">
                    @csrf
                    <div>
                        <input type="text" name="nopol" required placeholder="No. Polisi (D 1234 A)" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <input type="text" name="nama_pelanggan" required placeholder="Nama Pelanggan" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <input type="text" name="kendaraan" required placeholder="Kendaraan (Vario 125)" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <input type="text" name="jenis_layanan" required placeholder="Jenis Servis" class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs focus:outline-none focus:border-blue-500">
                    </div>
                    <input type="hidden" name="tanggal_kedatangan" value="{{ date('Y-m-d') }}">
                    <input type="hidden" name="sesi_waktu" value="Langsung">
                    <div class="sm:col-span-2 md:col-span-1">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs p-2.5 rounded-lg shadow-sm transition-colors flex items-center justify-center">
                            Masuk Antrean
                        </button>
                    </div>
                </form>
            </div>

            <!-- TABEL ANTRIAN & POS -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-4 sm:px-6 py-4 border-b border-slate-100 bg-white">
                    <h3 class="font-bold text-slate-800 text-xs sm:text-sm">Daftar Servis & Transaksi Kasir (POS)</h3>
                </div>

                <div class="overflow-x-auto pb-20">
                    <table class="w-full text-left border-collapse min-w-[650px]">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 text-[10px] font-bold uppercase tracking-wider border-b border-slate-100">
                                <th class="py-3 px-4 sm:px-6">Pelanggan & Kendaraan</th>
                                <th class="py-3 px-4 sm:px-6">Catatan Mekanik</th>
                                <th class="py-3 px-4 sm:px-6">Status Servis</th>
                                <th class="py-3 px-4 sm:px-6 text-right">Aksi Kasir</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs font-medium text-slate-700">
                            @if(isset($bookings) && count($bookings) > 0)
                                @foreach($bookings as $b)
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="py-4 px-4 sm:px-6">
                                            <span class="font-bold text-slate-900 block">{{ $b->nama_pelanggan }} <span class="bg-slate-900 text-white text-[9px] px-1.5 py-0.5 rounded ml-1">{{ $b->nopol }}</span></span>
                                            <span class="text-slate-500 text-[11px]">{{ $b->kendaraan }} - {{$b->no_booking ?? ''}}</span>
                                        </td>
                                        <td class="py-4 px-4 sm:px-6">{{ $b->catatan_mekanik ?? 'Belum ada catatan.' }}</td>
                                        <td class="py-4 px-4 sm:px-6">
                                            @if($b->status == 'Menunggu')
                                                <span class="bg-amber-100 text-amber-800 font-bold text-[10px] px-2.5 py-1 rounded-full whitespace-nowrap">Menunggu</span>
                                            @elseif($b->status == 'Dikerjakan')
                                                <span class="bg-blue-100 text-blue-800 font-bold text-[10px] px-2.5 py-1 rounded-full whitespace-nowrap">Sedang Dikerjakan</span>
                                            @elseif($b->status == 'Selesai')
                                                <span class="bg-orange-100 text-orange-800 font-bold text-[10px] px-2.5 py-1 rounded-full whitespace-nowrap">Selesai Dikerjakan - Belum Bayar</span>
                                            @else
                                                <span class="bg-emerald-100 text-emerald-800 font-bold text-[10px] px-2.5 py-1 rounded-full whitespace-nowrap">Lunas (Rp {{ number_format($b->total_biaya ?? 0, 0, ',', '.') }})</span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-4 sm:px-6 text-right">
                                            @if($b->status != 'Lunas')
                                                <button type="button" onclick="togglePos({{ $b->id ?? $b->id_servis }})" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-[11px] px-4 py-2 rounded-lg shadow-sm whitespace-nowrap">
                                                    🛒 Buka POS
                                                </button>
                                            @else
                                                <div class="flex items-center justify-end gap-2">
                                                    <span class="text-emerald-600 font-bold text-[11px]">Lunas</span>
                                                    @php
                                                        $dbIdServis = $b->id ?? $b->id_servis;
                                                        $transaksi = \Illuminate\Support\Facades\DB::table('transaksi')->where('id_servis', $dbIdServis)->first();

                                                        $detailItems = [];
                                                        $jasaPrint = 0;
                                                        $dbTotal = $b->total_biaya ?? 0;
                                                        $dbTunai = $b->uang_bayar ?? $dbTotal;
                                                        $dbKembali = $b->uang_kembali ?? 0;

                                                        if ($transaksi) {
                                                            $dbTotal = $transaksi->total_biaya;
                                                            $dbTunai = $transaksi->jumlah_bayar;
                                                            $dbKembali = $transaksi->kembalian;

                                                            $idTrans = $transaksi->id_transaksi ?? $transaksi->id ?? null;

                                                            if($idTrans) {
                                                                $details = \Illuminate\Support\Facades\DB::table('detail_transaksi')->where('id_transaksi', $idTrans)->get();
                                                                foreach($details as $d) {
                                                                    $nama = $d->nama_item ?? $d->nama_barang ?? 'Item';
                                                                    $subtotal = $d->subtotal ?? ($d->harga_satuan * $d->jumlah) ?? 0;

                                                                    if (stripos($nama, 'jasa') !== false) {
                                                                        $jasaPrint += $subtotal;
                                                                    } else {
                                                                        $detailItems[] = [
                                                                            'nama' => $nama,
                                                                            'qty' => $d->jumlah ?? 1,
                                                                            'subtotal' => $subtotal
                                                                        ];
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        $barangPrint = json_encode($detailItems);
                                                    @endphp

                                                    <button type="button"
                                                            data-jasa="{{ $jasaPrint }}"
                                                            data-items="{{ $barangPrint }}"
                                                            data-dbtotal="{{ $dbTotal }}"
                                                            data-dbtunai="{{ $dbTunai }}"
                                                            data-dbkembali="{{ $dbKembali }}"
                                                            onclick="bukaPreview('{{ $b->no_booking ?? 'TRX-'.$dbIdServis }}', '{{ $b->nama_pelanggan }}', '{{ $b->nopol }}', this)"
                                                            class="bg-slate-800 hover:bg-black text-white font-bold text-[10px] px-3 py-1.5 rounded shadow-sm whitespace-nowrap">
                                                        👁️ Lihat & Cetak Struk
                                                    </button>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>

                                    @if($b->status != 'Lunas')
                                        <!-- AREA KASIR POS -->
                                        <tr id="pos-{{ $b->id ?? $b->id_servis }}" class="hidden bg-slate-50/50 border-b border-slate-200">
                                            <td colspan="4" class="p-3 sm:p-6">
                                                <form action="{{ route('kasir.bayar', $b->id ?? $b->id_servis) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 bg-white border border-slate-200 p-4 sm:p-5 rounded-xl shadow-sm">
                                                    @csrf
                                                    <div>
                                                        <h4 class="font-bold text-slate-800 text-xs mb-3 border-b border-slate-100 pb-2">1. Pilih Suku Cadang</h4>
                                                        <div class="flex gap-2 mb-4 flex-wrap sm:flex-nowrap">
                                                            <select id="select-item-{{ $b->id ?? $b->id_servis }}" class="w-full bg-[#F8FAFC] border border-slate-200 rounded p-2 text-xs focus:outline-none focus:border-blue-500">
                                                                <option value="" disabled selected>-- Pilih Sparepart --</option>
                                                                @if(isset($stocks))
                                                                    @foreach($stocks as $stock)
                                                                        <option value="{{ $stock->id ?? $stock->id_sparepart }}" data-nama="{{ $stock->nama_barang }}" data-harga="{{ $stock->harga_jual }}">
                                                                            {{ $stock->nama_barang }} (Sisa: {{ $stock->jumlah_stok }}) - Rp {{ number_format($stock->harga_jual, 0, ',', '.') }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            <input type="number" id="qty-{{ $b->id ?? $b->id_servis }}" value="1" min="1" class="w-16 bg-[#F8FAFC] border border-slate-200 rounded p-2 text-xs text-center" placeholder="Qty">
                                                            <button type="button" onclick="addItem('{{ $b->id ?? $b->id_servis }}')" class="bg-slate-800 text-white font-bold px-3 py-2 rounded text-[10px]">Tambah</button>
                                                        </div>
                                                        <div class="bg-[#F8FAFC] border border-slate-200 p-3 rounded h-32 overflow-y-auto">
                                                            <ul id="cart-list-{{ $b->id ?? $b->id_servis }}" class="space-y-1"></ul>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <h4 class="font-bold text-slate-800 text-xs mb-3 border-b border-slate-100 pb-2">2. Konfirmasi Pembayaran</h4>
                                                        <div class="mb-3">
                                                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Biaya Jasa Servis (Rp):</label>
                                                            <input type="number" name="biaya_jasa" id="biaya-jasa-{{ $b->id ?? $b->id_servis }}" value="0" min="0" oninput="updateTotal('{{ $b->id ?? $b->id_servis }}')" class="w-full bg-[#F8FAFC] border border-slate-200 rounded p-2 text-xs">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Metode Pembayaran:</label>
                                                            <select name="metode_pembayaran" id="metode-{{ $b->id ?? $b->id_servis }}" onchange="toggleCashInput('{{ $b->id ?? $b->id_servis }}')" required class="w-full bg-[#F8FAFC] border border-slate-200 rounded p-2 text-xs">
                                                                <option value="Tunai">Tunai / Cash</option>
                                                                <option value="QRIS">QRIS</option>
                                                            </select>
                                                        </div>

                                                        <div id="wrapper-cash-{{ $b->id ?? $b->id_servis }}" class="space-y-3 mb-4 bg-slate-50 border border-slate-200 p-3 rounded-lg">
                                                            <div>
                                                                <label class="block text-[10px] font-bold text-slate-600 uppercase mb-1">Uang Diberikan (Rp):</label>
                                                                <input type="number" name="uang_bayar" id="uang-bayar-{{ $b->id ?? $b->id_servis }}" min="0" oninput="hitungKembalian('{{ $b->id ?? $b->id_servis }}')" placeholder="Contoh: 100000" class="w-full bg-white border border-slate-200 rounded p-2 text-xs font-bold">
                                                            </div>
                                                            <div class="flex justify-between items-center pt-2 border-t border-slate-200">
                                                                <span class="font-bold text-slate-600 text-xs">Uang Kembalian:</span>
                                                                <span id="label-kembalian-{{ $b->id ?? $b->id_servis }}" class="font-black text-emerald-600 text-base">Rp 0</span>
                                                            </div>
                                                        </div>

                                                        <div class="bg-blue-50 border border-blue-100 rounded-lg p-3 flex justify-between items-center mb-4">
                                                            <span class="font-bold text-blue-800 text-xs">Total:</span>
                                                            <span id="grand-total-{{ $b->id ?? $b->id_servis }}" class="font-black text-blue-600 text-lg">Rp 0</span>
                                                        </div>

                                                        <div class="flex justify-end gap-2">
                                                            <button type="submit" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-5 py-2.5 rounded shadow-sm text-[11px] flex items-center justify-center">Terima Pembayaran</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="py-12 text-center text-slate-400 text-xs">Belum ada antrean servis.</td>
                                </tr>
                            @endif
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

        function bukaPreview(noTrans, pelanggan, nopol, btnElement) {
            document.getElementById('modal-preview').style.display = 'flex';

            const now = new Date();
            const pad = (num) => String(num).padStart(2, '0');
            const strTanggal = `${pad(now.getDate())}/${pad(now.getMonth() + 1)}/${now.getFullYear()} ${pad(now.getHours())}:${pad(now.getMinutes())}`;

            document.getElementById('struk-tgl').innerText = strTanggal;
            document.getElementById('struk-notrans').innerText = noTrans;
            document.getElementById('struk-pelanggan').innerText = pelanggan;
            document.getElementById('struk-nopol').innerText = nopol;

            const jasa = parseInt(btnElement.getAttribute('data-jasa')) || 0;
            const items = JSON.parse(btnElement.getAttribute('data-items') || '[]');
            const dbTotal = parseInt(btnElement.getAttribute('data-dbtotal')) || 0;
            const dbTunai = parseInt(btnElement.getAttribute('data-dbtunai')) || 0;
            const dbKembali = parseInt(btnElement.getAttribute('data-dbkembali')) || 0;

            let itemsHtml = '';

            items.forEach(item => {
                let sub = parseInt(item.subtotal);
                itemsHtml += `
                    <div class="flex-between">
                        <span>${item.qty}x ${item.nama}</span>
                        <span>${sub.toLocaleString('id-ID')}</span>
                    </div>
                `;
            });

            if(jasa > 0) {
                itemsHtml += `
                    <div class="flex-between" style="margin-top: 2px;">
                        <span>Biaya Jasa Servis</span>
                        <span>${jasa.toLocaleString('id-ID')}</span>
                    </div>
                `;
            }

            document.getElementById('struk-items').innerHTML = itemsHtml;

            document.getElementById('struk-total').innerText = dbTotal.toLocaleString('id-ID');
            document.getElementById('struk-bayar').innerText = dbTunai.toLocaleString('id-ID');
            document.getElementById('struk-kembali').innerText = (dbKembali || 0).toLocaleString('id-ID');
        }

        function tutupPreview() {
            document.getElementById('modal-preview').style.display = 'none';
        }

        function cetakStrukDenganLoading(btn) {
            const originalHTML = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="animate-spin h-4 w-4 text-white inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Menyiapkan Struk...
            `;

            const el = document.getElementById('struk-content');
            const tinggiMm = Math.ceil(el.offsetHeight * 25.4 / 96) + 6;

            let st = document.getElementById('dynamic-page-style');
            if (!st) {
                st = document.createElement('style');
                st.id = 'dynamic-page-style';
                document.head.appendChild(st);
            }
            st.textContent = '@page { size: 58mm ' + tinggiMm + 'mm; margin: 0; }';

            setTimeout(() => {
                window.print();
                btn.disabled = false;
                btn.innerHTML = originalHTML;
            }, 500);
        }

        function togglePos(id) {
            const row = document.getElementById('pos-' + id);
            if (row) {
                row.classList.toggle('hidden');
                toggleCashInput(id);
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
            subtotals.forEach(el => { totalPart += parseInt(el.value); });
            const jasaInput = document.getElementById('biaya-jasa-' + bookingId);
            let jasa = jasaInput ? parseInt(jasaInput.value) : 0;
            if(isNaN(jasa)) jasa = 0;
            const grandTotal = totalPart + jasa;
            const grandTotalEl = document.getElementById('grand-total-' + bookingId);
            if(grandTotalEl) { grandTotalEl.innerText = "Rp " + grandTotal.toLocaleString('id-ID'); }
            hitungKembalian(bookingId);
        }

        function toggleCashInput(bookingId) {
            const metodeSelect = document.getElementById('metode-' + bookingId);
            const wrapperCash = document.getElementById('wrapper-cash-' + bookingId);
            if (metodeSelect && wrapperCash) {
                if (metodeSelect.value === 'Tunai') {
                    wrapperCash.classList.remove('hidden');
                    hitungKembalian(bookingId);
                } else {
                    wrapperCash.classList.add('hidden');
                    document.getElementById('uang-bayar-' + bookingId).value = '';
                    document.getElementById('label-kembalian-' + bookingId).innerText = 'Rp 0';
                }
            }
        }

        function hitungKembalian(bookingId) {
            const grandTotalEl = document.getElementById('grand-total-' + bookingId);
            if (!grandTotalEl) return;
            const grandTotalText = grandTotalEl.innerText.replace(/[^0-9]/g, '');
            const grandTotal = parseInt(grandTotalText) || 0;
            const uangBayarInput = document.getElementById('uang-bayar-' + bookingId);
            const uangBayar = parseInt(uangBayarInput.value) || 0;
            const labelKembalian = document.getElementById('label-kembalian-' + bookingId);
            if (!labelKembalian) return;
            if (uangBayar >= grandTotal) {
                const kembalian = uangBayar - grandTotal;
                labelKembalian.innerText = "Rp " + kembalian.toLocaleString('id-ID');
                labelKembalian.className = "font-black text-emerald-600 text-base";
            } else {
                const kurang = grandTotal - uangBayar;
                labelKembalian.innerText = "Kurang: Rp " + kurang.toLocaleString('id-ID');
                labelKembalian.className = "font-black text-red-600 text-xs";
            }
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