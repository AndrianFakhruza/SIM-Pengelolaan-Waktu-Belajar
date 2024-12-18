# SIM-Pengelolaan-Waktu-Belajar

# Panduan Instalasi Laravel (Versi 11.x)

Panduan ini memberikan langkah-langkah rinci untuk menginstal Laravel dan memulai proyek kalian.

---

## Persyaratan Sistem

Sebelum menginstal Laravel, pastikan sistem kalian memenuhi persyaratan berikut:

1. **PHP**: Versi 8.1 atau lebih baru
2. **Composer**: Sudah terinstal di sistem kalian ([Unduh Composer](https://getcomposer.org/download/))
3. **Web Server**: Apache, Nginx, atau server bawaan PHP untuk pengembangan
4. **Database**: MySQL, PostgreSQL, SQLite, atau SQL Server
5. **Node.js dan npm** (opsional): Untuk mengelola aset frontend jika diperlukan

---

## Langkah-Langkah Instalasi

### 1. Instal Laravel

#### A. Menggunakan Laravel Installer

# Run as administrator...

1. Jika kalian belum menginstal PHP dan Composer di komputer lokal kalian, perintah berikut akan menginstal PHP, Composer, dan penginstal Laravel
   ```bash
   Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows'))
   ```
2. Instal Laravel Installer secara global menggunakan Composer:
   ```bash
   composer global require laravel/installer
   ```

### 5. Jalankan Server Pengembangan

Untuk menjalankan aplikasi Laravel di server lokal, gunakan perintah berikut:

```bash
php artisan serve
```

Setelah server berjalan, buka aplikasi di browser kalian melalui URL: `http://localhost:8000`.

---

### 6. Instalasi Node.js (Opsional)

Jika aplikasi kalian membutuhkan pengelolaan file CSS atau JavaScript, kalian perlu menginstal dependensi Node.js.

1. Instal dependensi frontend:
   ```bash
   npm install
   ```
2. Compile aset frontend:
   ```bash
   npm run dev
   ```

---

### 7. Jalankan Migrasi Database

Jika proyek Laravel kalian menggunakan database, jalankan migrasi untuk membuat tabel:

```bash
php artisan migrate
```

---

## Perintah Artisan yang Berguna

Berikut adalah beberapa perintah `php artisan` yang sering digunakan:

- **Menampilkan daftar rute**:

  ```bash
  php artisan route:list
  ```

- **Membersihkan cache**:

  ```bash
  php artisan cache:clear
  ```

- **Membuat kontroler baru**:

  ```bash
  php artisan make:controller NamaController
  ```

- **Membuat migrasi baru**:
  ```bash
  php artisan make:migration nama_migrasi
  ```

---

## Panduan Troubleshooting

Jika kalian mengalami masalah saat instalasi, periksa hal-hal berikut:

1. **PHP dan Composer**:
   - Pastikan versi PHP kalian memenuhi syarat (8.1 atau lebih tinggi).
   - Pastikan Composer sudah diinstal dan dapat dijalankan di terminal.
2. **Konfigurasi `.env`**:
   - Periksa pengaturan database di file `.env`.
   - Pastikan database sudah dibuat.
3. **Izin Folder**:
   - Pastikan folder `storage` dan `bootstrap/cache` dapat ditulis oleh server (chmod 775 di Linux/Unix).

---

## Referensi

Untuk informasi lebih lanjut, kunjungi [Dokumentasi Resmi Laravel](https://laravel.com/docs/11.x).

---

## Penutup

Selamat mencoba Laravel dan semoga proyek kalian berhasil! Jika kalian memiliki pertanyaan, jangan ragu untuk membuka **Issue** di repository ini.

```

```
