<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Pengguna - BengkelCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-[#F4F7FA] text-slate-800 h-screen flex overflow-hidden">

    <!-- SIDEBAR ADMIN -->
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 z-20">
        <div>
            <div class="h-16 flex items-center px-6 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 text-[13px] leading-tight">BengkelCare</h1>
                        <p class="text-[9px] font-semibold text-slate-500">Panel Kontrol Administrator</p>
                    </div>
                </div>
            </div>

            <nav class="px-3 space-y-1 mt-4">
                <p class="px-3 text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-2">Menu Utama</p>
                <a href="/dashboard-admin" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">🏠 Dashboard Admin</a>
                <a href="{{ route('admin.pengguna.index') }}" class="flex items-center gap-3 bg-blue-600 text-white px-3 py-2.5 rounded-lg text-xs font-semibold shadow-sm">👥 Kelola Data Pengguna</a>
                <a href="/kasir" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">🚗 Kelola Servis & Kasir (POS)</a>
                <a href="/manajemen-stok" class="flex items-center gap-3 text-slate-600 hover:bg-slate-50 px-3 py-2.5 rounded-lg text-xs font-medium">📦 Kelola Data Kendaraan & sparepart</a>
            </nav>
        </div>

        <div class="px-6 py-4 border-t border-slate-200">
            <a href="{{ route('logout') }}" class="flex items-center gap-3 px-3 py-2.5 text-red-600 hover:bg-red-50 rounded-lg text-xs font-semibold">🚪 Logout / Keluar Sistem</a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0 z-10">
            <h2 class="font-bold text-slate-800 text-sm">Manajemen Akun Pengguna & Staf</h2>
            <div class="flex items-center gap-3">
                <span class="text-xs font-bold text-slate-700 uppercase">{{ session('nama') }} ({{ session('role') }})</span>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-8 space-y-8">

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <span class="text-[10px] uppercase font-bold bg-emerald-100 px-2 py-0.5 rounded">Berhasil</span>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-xs">
                    <p class="font-bold mb-2">Data belum berhasil disimpan:</p>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- FORM TAMBAH AKUN -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 h-fit">
                    <h3 class="font-bold text-slate-900 text-sm mb-4">Tambah Akun Baru</h3>

                    <form id="formTambahAkun"
                          action="{{ route('admin.pengguna.store') }}"
                          method="POST"
                          class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" required maxlength="100"
                                   placeholder="Contoh: Budi Santoso"
                                   class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Nomor Telepon / HP</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp') }}" required maxlength="20"
                                   placeholder="Contoh: 08123456789"
                                   class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">
                        </div>

                        <div id="wrapperAlamat" class="hidden">
                            <label class="block text-xs font-bold text-slate-700 mb-1">Alamat (Khusus Pelanggan)</label>
                            <textarea name="alamat" id="inputAlamat"
                                      placeholder="Contoh: Jl. Ciwidey No. 123"
                                      class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">{{ old('alamat') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Username / Email Login</label>
                            <input type="text" name="username" value="{{ old('username') }}" required maxlength="50"
                                   placeholder="Contoh: budi_member"
                                   class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Kata Sandi</label>
                            <input type="password" name="password" required minlength="6"
                                   placeholder="Minimal 6 karakter"
                                   class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Hak Akses (Role)</label>
                            <select name="role" id="selectRole" required
                                    class="w-full bg-[#F8FAFC] border border-slate-200 rounded-lg p-2.5 text-xs text-slate-800 focus:outline-none focus:border-blue-500 font-medium">
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrator</option>
                                <option value="kasir" {{ old('role') === 'kasir' ? 'selected' : '' }}>Kasir</option>
                                <option value="mekanik" {{ old('role') === 'mekanik' ? 'selected' : '' }}>Mekanik</option>
                                <option value="pelanggan" {{ old('role') === 'pelanggan' ? 'selected' : '' }}>Pengguna / Pelanggan (Member)</option>
                            </select>
                        </div>

                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-lg text-xs font-bold shadow-sm transition-colors">
                            Simpan Akun Baru
                        </button>
                    </form>
                </div>

                <!-- TABEL PENGELOLA -->
                <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100">
                        <h3 class="font-bold text-slate-900 text-sm">Daftar Pengguna / Staf Sistem</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Seluruh akun pegawai pengelola bengkel.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="py-3 px-4">Nama</th>
                                    <th class="py-3 px-4">Username</th>
                                    <th class="py-3 px-4">No HP</th>
                                    <th class="py-3 px-4">Role</th>
                                    <th class="py-3 px-4 text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-100 text-xs">
                                @forelse($penggunas as $p)
                                    <tr class="hover:bg-slate-50">
                                        <td class="py-3 px-4 font-bold text-slate-800">{{ $p->nama }}</td>
                                        <td class="py-3 px-4 text-slate-600">{{ $p->username }}</td>
                                        <td class="py-3 px-4 text-slate-600">{{ $p->no_hp }}</td>
                                        <td class="py-3 px-4">
                                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase
                                                {{ $p->role == 'admin' ? 'bg-purple-100 text-purple-700' : ($p->role == 'kasir' ? 'bg-emerald-100 text-emerald-700' : 'bg-blue-100 text-blue-700') }}">
                                                {{ $p->role }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <form action="{{ route('admin.pengguna.destroy', $p->id_pengelola) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold text-xs">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-6 text-center text-slate-400">Belum ada data pengelola.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TABEL PELANGGAN -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mt-6">
                <div class="p-6 border-b border-slate-100">
                    <h3 class="font-bold text-slate-900 text-sm">Daftar Member Pelanggan Bengkel</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Akun pelanggan terdaftar yang dikelola oleh admin.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                <th class="py-3 px-4">Nama Pelanggan</th>
                                <th class="py-3 px-4">Username</th>
                                <th class="py-3 px-4">No HP</th>
                                <th class="py-3 px-4">Alamat</th>
                                <th class="py-3 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100 text-xs">
                            @forelse($pelanggans as $pelanggan)
                                <tr class="hover:bg-slate-50">
                                    <td class="py-3 px-4 font-bold text-slate-800">{{ $pelanggan->nama }}</td>
                                    <td class="py-3 px-4 text-slate-600">{{ $pelanggan->username }}</td>
                                    <td class="py-3 px-4 text-slate-600">{{ $pelanggan->no_hp }}</td>
                                    <td class="py-3 px-4 text-slate-600">{{ $pelanggan->alamat }}</td>
                                    <td class="py-3 px-4 text-center">
                                        <form action="{{ route('admin.pelanggan.destroy', $pelanggan->id_pelanggan) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data pelanggan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold text-xs">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-slate-400">Belum ada data member pelanggan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <!-- PENYESUAIAN FORM BERDASARKAN ROLE -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('formTambahAkun');
        const selectRole = document.getElementById('selectRole');
        const wrapperAlamat = document.getElementById('wrapperAlamat');
        const inputAlamat = document.getElementById('inputAlamat');

        function cekRole() {
            if (selectRole.value === 'pelanggan') {
                form.action = "{{ route('admin.pelanggan.store') }}";
                wrapperAlamat.classList.remove('hidden');
                inputAlamat.required = true;
            } else {
                form.action = "{{ route('admin.pengguna.store') }}";
                wrapperAlamat.classList.add('hidden');
                inputAlamat.required = false;
            }
        }

        selectRole.addEventListener('change', cekRole);
        cekRole();
    });
    </script>

</body>
</html>
