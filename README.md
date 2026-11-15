# BengkelCare — Sistem Manajemen & Booking Servis Bengkel Terpadu

[![Release](https://img.shields.io/badge/Release-v1.0.0--rc-0D9488?style=for-the-badge)](https://github.com)
[![Build Status](https://img.shields.io/badge/Build-Passing-10B981?style=for-the-badge)](https://github.com)
[![Security Audit](https://img.shields.io/badge/Security-Protected-3B82F6?style=for-the-badge)](https://github.com)
[![License](https://img.shields.io/badge/License-MIT-slate?style=for-the-badge)](LICENSE)

> **Proyek Uji Kompetensi Keahlian (UKK) Rekayasa Perangkat Lunak (RPL)**  
> **Tahun Pelajaran:** 2026/2027 • **Instansi:** SMK Budi Bakti Ciwidey (Kelas XI RPL-4)

---

## 1. Latar Belakang Masalah & Solusi

Pengelolaan operasional bengkel kendaraan bermotor secara konvensional sering menghadapi kendala pencatatan antrean servis manual, kurangnya transparansi progres pengerjaan kepada pemilik kendaraan, risiko selisih perhitungan biaya jasa dan suku cadang, serta keterlambatan pemantauan stok sparepart yang menipis.

**BengkelCare** hadir sebagai solusi aplikasi web terintegrasi yang mendigitalisasi seluruh alur layanan bengkel:
1. **Portal Booking & Monitoring Mandiri:** Pelanggan dapat mendaftar akun, memesan jadwal servis berdasarkan sesi waktu, serta memantau progres pengerjaan, catatan mekanik, dan foto bukti servis secara *real-time*.
2. **Workstation Mekanik:** Memudahkan mekanik memperbarui status pengerjaan (`Menunggu`, `Sedang Dikerjakan`, `Selesai`), mencatat rincian tindakan teknis, dan mengunggah lampiran foto bukti servis.
3. **Point of Sale (POS) Kasir & Inventori:** Mendukung pencatatan pelanggan *walk-in*, validasi pelunasan transaksi, serta peringatan otomatis untuk stok sparepart kritis (`<= 5` item).
4. **Dashboard Analitik Administrator:** Menyajikan ringkasan omset harian, grafik pendapatan 7 hari terakhir, manajemen akun pengguna multi-role, dan laporan keuangan siap cetak.

---

## 2. Tech Stack & Arsitektur

* **Frontend:** Laravel Blade Templating, Tailwind CSS, Google Fonts (`Inter`), Vanilla JavaScript ES6.
* **Backend:** PHP `^8.2`, Laravel Framework (Arsitektur Monolithic MVC).
* **Database:** MySQL / MariaDB `10.4+` (InnoDB Engine, Normalisasi 3NF).
* **Keamanan (Security):** Bcrypt Password Hashing (`Hash::make`), Custom Session & RBAC Middleware (`checklogin` & `role`), Parameterized Query Builder (Anti-SQL Injection), serta CSRF Token Protection.

---

## 3. Panduan Instalasi Lokal (Step-by-Step Local Setup)

Ikuti langkah berikut untuk menjalankan aplikasi **BengkelCare** di komputer lokal:

### Prasyarat Sistem
* PHP `>= 8.2` dan Composer
* MySQL / MariaDB Server (Laragon / XAMPP)
* Git CLI

### Langkah Instalasi

```bash
# 1. Clone repositori ini
git clone [https://github.com/username-anda/Bengkel-infinity.git](https://github.com/username-anda/Bengkel-infinity.git)
cd Bengkel-infinity

# 2. Pasang seluruh dependensi PHP
composer install

# 3. Salin file konfigurasi environment
cp .env.example .env

# 4. Generate Application Key Laravel
php artisan key:generate
```

### 5. Konfigurasi File `.env`
Buka file `.env` dan sesuaikan pengaturan koneksi database MySQL Anda:

```env
APP_NAME=BengkelCare
APP_ENV=local
APP_DEBUG=true
APP_URL=[http://127.0.0.1:8000](http://127.0.0.1:8000)

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bengkelcare_db
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=public
```

### 6. Migrasi Database, Storage Link & Jalankan Server

```bash
# Buat database 'bengkelcare_db' di phpMyAdmin/MySQL, lalu jalankan migrasi & seeder
php artisan migrate --seed

# Hubungkan storage symlink agar foto bukti pengerjaan mekanik dapat diakses
php artisan storage:link

# Jalankan server lokal Laravel
php artisan serve
```

Buka browser dan akses aplikasi melalui alamat: **`http://127.0.0.1:8000`**

---

## 4. Akun Uji Coba Default (Credentials)

Gunakan kredensial berikut untuk menguji seluruh hak akses (*Multi-Role*) pada sistem:

| Role Pengguna | Username / Email Login | Password | Hak Akses Utama |
| :--- | :--- | :--- | :--- |
| **Administrator** | `tejarsaaeful@bengkelcare.com` | `123456` | Dashboard omset, grafik 7 hari, kelola pengguna, stok sparepart, laporan keuangan |
| **Kasir** | `andi@bengkelcare.com` | `123456` | Input antrean *walk-in*, proses pembayaran POS kasir, cetak struk lunas |
| **Mekanik** | `pidin@bengkelcare.com` | `123456` | Update status servis, input catatan pengerjaan, unggah foto bukti servis |
| **Pelanggan** | `faaaa24@gmail.com` | `123456` | Registrasi mandiri, buat booking servis, pantau progres & foto bukti mekanik |

---

## 5. Anggota Tim Pengembang (Tim Infinity)

* **Tejar Saeful Falah** — *Frontend Specialist & UI/UX Designer* (NISN: `Isi NISN Anda`)
* **Anggota Tim 2** — *Backend Architect & Database Administrator* (NISN: `Isi NISN Rekan Tim`)

**Guru Pembimbing UKK:** Nama Guru Pembimbing, S.Kom.  
**SMK Budi Bakti Ciwidey — 2026**
