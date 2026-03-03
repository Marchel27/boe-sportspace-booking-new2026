# 🏟️ Booking Lapangan BBPPMPV BOE Malang

Aplikasi ini adalah sistem **Booking Lapangan BBPPMPV BOE Malang** yang dibangun menggunakan framework Laravel.  
Website ini bertujuan untuk mempermudah proses pemesanan lapangan secara online dengan sistem yang cepat, efisien, dan terintegrasi.

---

## 📌 Deskripsi

Sistem ini memungkinkan pengguna untuk melakukan reservasi lapangan berdasarkan tanggal dan sesi waktu yang tersedia.  
Admin dapat mengelola data lapangan, harga, galeri, serta transaksi booking melalui dashboard khusus.

---

## 🚀 Fitur Utama

### 👤 User
- Registrasi dan Login
- Booking lapangan berdasarkan tanggal
- Pilih sesi waktu
- Melihat riwayat transaksi
- Upload bukti pembayaran (jika ada)

### 🛠️ Admin
- CRUD data lapangan
- Kelola harga (bisa beda harga siang/malam atau hari tertentu)
- Kelola galeri lapangan
- Kelola transaksi booking
- Konfirmasi / Tolak booking

---

## 🏗️ Teknologi yang Digunakan

- Laravel
- PHP
- MySQL
- Tailwind CSS
- Vite

---

## ⚙️ Instalasi Project

1. Clone repository
```bash
git clone https://github.com/username/nama-repository.git
```

2. Masuk ke folder project
```bash
cd nama-repository
```

3. Install dependency
```bash
composer install
```

4. Copy file environment
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Atur koneksi database di file `.env`

7. Jalankan migrasi database
```bash
php artisan migrate
```

8. Jalankan server
```bash
php artisan serve
```

Akses di browser:
```
http://127.0.0.1:8000
```

---

## 📂 Struktur Fitur Utama

- `Lapangan` → Data lapangan
- `Transaksi` → Data booking
- `RiwayatHarga` → Riwayat perubahan harga
- `GaleryLapangan` → Foto lapangan
- `Penyewa` → Data user penyewa

---

## 🎯 Tujuan Pengembangan

- Meningkatkan efisiensi sistem reservasi lapangan
- Mengurangi pencatatan manual
- Memberikan informasi ketersediaan lapangan secara real-time
- Mempermudah pengelolaan data oleh admin

---

## 👨‍💻 Developer

Project ini dikembangkan sebagai sistem informasi booking lapangan di BBPPMPV BOE Malang.

---

## 📄 License

Project ini dikembangkan untuk kebutuhan pembookingan lapangan di BBPPMPV BOE MALANG.
