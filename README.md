# API User Laravel

API ini memungkinkan kamu untuk melakukan operasi CRUD (Create, Read, Update, Delete) untuk entitas `User`. API ini dibangun menggunakan Laravel dan menyediakan endpoint untuk menambah, mengupdate, mengambil, dan menghapus data pengguna.

## Fitur

- **Create User**: Membuat pengguna baru.
- **Read Users**: Mengambil daftar semua pengguna.
- **Update User**: Memperbarui data pengguna berdasarkan ID.
- **Delete User**: Menghapus pengguna berdasarkan ID.

## Prasyarat

Sebelum menggunakan API ini, pastikan kamu sudah menginstal perangkat-perangkat berikut:

- [PHP](https://www.php.net/) (Versi 8.0 atau lebih tinggi)
- [Composer](https://getcomposer.org/) untuk mengelola dependensi PHP
- [Laravel](https://laravel.com/) (Versi 8 atau lebih tinggi)
- [PostgreSQL](https://www.postgresql.org/) atau database lain yang terkonfigurasi dengan baik

## Instalasi

Ikuti langkah-langkah berikut untuk menyiapkan aplikasi API ini di komputer lokal kamu:

### 1. Clone Repository

Clone repository ini ke dalam folder lokal:

```bash
git clone [https://github.com/username/repository-name.git](https://github.com/Rizki-Rahmadani/Laravel-Api-Sederhana.git)
cd Laravel-Api-Sederhana

### 2. Instal Dependensi
composer install

### 3. Konfigurasi Environment
- Salin file .env.example menjadi .env
- Kemudian, ubah konfigurasi database di file .env agar sesuai dengan pengaturan database lokal kamu:
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nama_database
DB_USERNAME=nama_pengguna
DB_PASSWORD=password

### 4. Generate Key Aplikasi
php artisan key:generate

### 5. Migrasi Database
php artisan migrate

### 6. Menjalankan Server
php artisan serve


## Penggunaan API
API ini menyediakan endpoint berikut:

### 1. Get All Users
endpoint: GET /api/users

### 2. Create User
endpoint: POST /api/users
Request Body:
{
  "name": "User Name",
  "email": "user@example.com",
  "age": 25
}

### 3. Get User by ID
endpoint: GET /api/users/{id}

### 4. Update User
endpoint: PUT /api/users/{id}

### 5. Delete User
endpoint: DELETE /api/users/{id}

## Testing
Untuk melakukan pengujian API menggunakan Jest dan axios, pastikan server API sedang berjalan.

### 1. Instalasi Dependensi Pengujian
Instal dependensi yang diperlukan untuk pengujian:
- npm install

### 2. Menjalankan Pengujian
Jalankan pengujian dengan perintah:
- npx jest

## Logging
API ini juga mencatat setiap request yang masuk menggunakan Laravel logging system. Kamu dapat melihat log di file storage/logs/laravel.log.

