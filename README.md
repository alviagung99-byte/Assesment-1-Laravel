# AgriVision Garut

Prototipe Laravel untuk mencatat simulasi hasil deteksi hama tanaman Kelompok
Tani Makmur Kabupaten Garut. Jenis hama dan confidence score dimasukkan manual;
aplikasi ini tidak menjalankan model EfficientNet-B0.

## Menjalankan aplikasi

1. Pasang dependensi PHP dengan `composer install`.
2. Buat database MySQL `db_agrivision` melalui phpMyAdmin.
3. Salin `.env.example` ke `.env` bila file `.env` belum tersedia. Nilai bawaan
   memakai `127.0.0.1:3306`, username `root`, dan password kosong; sesuaikan
   kredensial bila instalasi lokal Anda berbeda.
4. Jalankan:

   ```sh
   php artisan key:generate
   php artisan migrate
   php artisan db:seed
   php artisan serve
   ```

   Jika `.env` sudah ada, pastikan konfigurasinya berisi:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_agrivision
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Untuk mengompilasi CSS dan JavaScript, jalankan `npm install` lalu
   `npm run build`.

## Fitur

- Dashboard dan informasi AgriVision dengan layout dan navigasi bersama.
- Form simulasi deteksi, validasi input, klasifikasi status berdasarkan
  confidence score, serta penyimpanan hasil dengan Eloquent.
- Riwayat hasil deteksi dan 15 data contoh dari Faker locale `id_ID`.

Rentang status yang digunakan: di bawah 50% adalah **Tidak Pasti**, 50–80%
adalah **Indikasi Hama**, dan di atas 80% adalah **Hama Terkonfirmasi**.

## Pengujian

```sh
php artisan test
```
