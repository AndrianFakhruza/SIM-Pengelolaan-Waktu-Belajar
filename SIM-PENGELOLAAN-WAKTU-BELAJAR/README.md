# **Panduan Clone dan Menjalankan Proyek Laravel**

### **1. Clone Repository dari GitHub**
1. Buka terminal atau command prompt.
2. Clone repository proyek Laravel dari GitHub:
   ```bash
   https://github.com/AndrianFakhruza/SIM-Pengelolaan-Waktu-Belajar
   ```
3. Masuk ke direktori proyek yang telah di-clone:
   ```bash
   cd SIM-Pengelolaan-Waktu-Belajar/SIM-PENGELOLAAN-WAKTU-BELAJAR/
   ```

---

### **2. Instal Dependensi PHP**
1. Pastikan Composer sudah terinstal di sistem kalian. Jika belum, [unduh Composer di sini](https://getcomposer.org/download/).
2. Jalankan perintah untuk menginstal dependensi PHP:
   ```bash
   composer install
   ```
   Perintah ini akan membaca file `composer.json` dan `composer.lock` untuk mengunduh semua dependensi ke folder `vendor`.

---

### **3. Instal Dependensi Frontend (Opsional)**
Jika proyek Laravel kalian menggunakan frontend (CSS/JavaScript), instal dependensi Node.js:
1. Pastikan Node.js sudah terinstal di sistem kalian. Jika belum, [unduh Node.js di sini](https://nodejs.org/).
2. Jalankan perintah untuk menginstal dependensi frontend:
   ```bash
   npm install
   ```
3. Compile aset frontend:
   ```bash
   npm run dev
   ```

---

### **4. Konfigurasi Lingkungan**
1. Pastikan ada file `.env` di direktori proyek. Jika file `.env` tidak ada:
   - Salin file contoh `.env.example` menjadi `.env`:
     ```bash
     cp .env.example .env
     ```
2. Edit file `.env` untuk menyesuaikan pengaturan proyek (misalnya, pengaturan database).

3. Generate application key:
   ```bash
   php artisan key:generate
   ```

---

### **5. Migrasi Database**
Jika proyek menggunakan database, jalankan migrasi untuk membuat tabel:
1. Pastikan pengaturan database di file `.env` sudah benar.
2. Jalankan perintah migrasi:
   ```bash
   php artisan migrate
   ```

---

### **6. Jalankan Server Laravel**
Setelah semua langkah di atas selesai, jalankan server Laravel:
```bash
php artisan serve
```

Akses proyek di browser melalui:
```
http://localhost:8000
```

---

## **Checklist untuk Tim**
- Pastikan semua anggota tim memiliki:
  - **PHP 8.1 atau lebih baru** terinstal.
  - **Composer** terinstal untuk mengelola dependensi PHP.
  - **Node.js dan npm** (jika proyek menggunakan frontend).
  - Akses ke database yang dikonfigurasi di `.env`.

- Jika ada perubahan baru di repository, selalu **pull** perubahan sebelum memulai pekerjaan:
  ```bash
  git pull origin main
  ```

---
