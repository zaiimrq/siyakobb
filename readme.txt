-----------------------------------
REQUIREMENT SISTEM YANG DIPERLUKAN:
-----------------------------------
- PHP 8.3 atau yang lebih baru
- Composer 2.0 atau yang lebih baru
- Node.js 18 atau yang lebih baru
- NPM 9 atau yang lebih baru
- Database MySQL 8.3 / MariaDB 10.4
- Ekstensi PHP yang wajib:
  * BCMath
  * Ctype
  * cURL
  * DOM
  * Fileinfo
  * JSON
  * Mbstring
  * OpenSSL
  * PCRE
  * PDO
  * Tokenizer
  * XML
- Web Server (Apache/Nginx) atau PHP built-in server
- Memory minimum 2GB RAM
- Storage kosong minimum 500MB

LANGKAH-LANGKAH PENGGUNAAN APLIKASI
====================================

1. COMPOSER INSTALL
-------------------
- Buka terminal/command prompt
- Masuk ke direktori project
- Jalankan perintah:
  composer install

2. COPY ENVIRONMENT FILE
------------------------
- Jalankan perintah:
  cp .env.example .env
  atau di Windows:
  copy .env.example .env

3. GENERATE APPLICATION KEY
---------------------------
- Jalankan perintah:
  php artisan key:generate

4. KONFIGURASI DATABASE
-----------------------
- Edit file .env:
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=nama_database
  DB_USERNAME=username_db
  DB_PASSWORD=password_db

5. JALANKAN MIGRASI DATABASE
----------------------------
- Buat database secara manual di MySQL
- Jalankan perintah:
  php artisan migrate

6. JALANKAN SEEDER
----------------------------
  php artisan db:seed

7. INSTALL DEPENDENCIES NPM
---------------------------
- Jalankan perintah:
  npm install

8. GENERATE STORAGE LINK
------------------------
- Jalankan perintah:
  php artisan storage:link

9. JALANKAN COMPOSER RUN DEV
----------------------------
- Jalankan perintah:
  composer run dev


10. AKSES APLIKASI
------------------
- Buka browser
- Akses: http://localhost:8000

CATATAN PENTING:
- Pastikan PHP dan Composer sudah terinstall
- Pastikan MySQL/server database berjalan
- Pastikan Node.js dan NPM sudah terinstall
- Port 8000 tidak sedang digunakan aplikasi lain
- Untuk menghentikan server, tekan Ctrl+C di terminal


-----------------------------------------
CARA PENGGUNAAN APLIKASI SETELAH RUNNING:
-----------------------------------------

1. AKSES HALAMAN UTAMA
----------------------
- Buka http://localhost:8000
- Anda akan melihat halaman welcome Laravel atau halaman home

2. LOGIN SEBAGAI ADMIN
----------------------
- Buka http://localhost:8000/admin
- atau klik link/tombol login di halaman utama
- Masukkan kredensial:
  Email: admin@admin.com
  Password: admin

3. LOGIN SEBAGAI USER BIASA
---------------------------
- Buka http://localhost:8000/admin/login
- Masukkan kredensial:
  Email: user@user.com
  Password: user
