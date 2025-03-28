<p align="center">
    <a href="https://404notfound.fun" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/87377917?s=200&v=4" width="200" alt="Laravel Logo">
    </a>
</p>

# 🏠 Laravel Laundry App

**Laravel Laundry App** adalah sistem berbasis web yang sederhana untuk mengelola proses laundry, mulai dari pencatatan pelanggan, pemesanan, hingga pelacakan status laundry. Dibangun menggunakan **Laravel 9**, aplikasi ini dirancang agar mudah digunakan dan dikembangkan lebih lanjut sesuai kebutuhan.

## ✨ Fitur

- 🔐 **Autentikasi**: Login & Register pengguna
- 📊 **Dashboard**:
  - Informasi pemasukan (**income**)
  - **To-Do Laundry**: Laundry yang belum diproses
  - **In-Progress Laundry**: Laundry yang sedang dikerjakan
  - **Done Laundry**: Laundry yang sudah selesai tetapi belum diambil/belum lunas
  - **Completed Laundry**: Laundry yang sudah diambil dan sudah lunas
- 🧑‍💼 **Manajemen Pelanggan**: Tambah, ubah, dan hapus data pelanggan
- 💰 **Manajemen Paket Laundry**: Kelola daftar harga/paket laundry
- 📋 **Manajemen Pesanan**: Tambah, ubah, dan hapus pesanan laundry
- 👤 **Manajemen Profil**: Update informasi pengguna

## 📕 Tutorial

Jika ingin membuat aplikasi web ini dari awal silakan unduh ebooknya di [sini](https://drive.google.com/file/d/1FIzy-17rOXP6yOhQWw-Wn0W1qssWfibd/view?usp=sharing) ya.


## 🚀 Instalasi

1. **Clone repository** ini:
   ```sh
   git clone git@github.com:404NotFoundIndonesia/laravel-laundy-app-v1.git
   cd reponame
   ```

2. **Install dependencies**:
   ```sh
   composer install
   ```

3. **Buat file `.env`** dengan menyalin `.env.example`:
   ```sh
   cp .env.example .env
   ```

4. **Generate application key**:
   ```sh
   php artisan key:generate
   ```

5. **Setup database**:
   - Edit `.env` dan sesuaikan database yang digunakan
   - Jalankan migration:
     ```sh
     php artisan migrate
     ```

6. **Jalankan aplikasi**:
   ```sh
   php artisan serve
   ```

Aplikasi akan berjalan di `http://127.0.0.1:8000`

## 🛠 Teknologi yang Digunakan

- **Laravel 9** - Framework utama backend
- **MySQL** - Database utama

## 📸 Screenshot

<img src="./docs/Screenshot 2025-03-28 at 16.57.38.png" />

<img src="./docs/Screenshot 2025-03-28 at 17.00.46.png" />

<img src="./docs/Screenshot 2025-03-28 at 17.01.50.png" />

<img src="./docs/Screenshot 2025-03-28 at 17.03.12.png" />

<img src="./docs/Screenshot 2025-03-28 at 17.03.45.png" />


## 📄 Lisensi

Aplikasi ini dirilis di bawah [lisensi **MIT**](LICENSE). Silakan gunakan dan modifikasi sesuai kebutuhan.
