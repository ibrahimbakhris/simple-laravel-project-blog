# Aplikasi Blog - Projek Bootcamp Pengaturcaraan

<p align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Logo Laravel">
</p>

## Tentang Projek Ini

Ini adalah aplikasi blog yang dibina sebagai sebahagian daripada kurikulum bootcamp pengaturcaraan. Projek ini menunjukkan amalan pembangunan web moden menggunakan kerangka Laravel dan berfungsi sebagai platform pembelajaran untuk pelajar memahami:

- **Pembangunan web full-stack** dengan Laravel
- **Reka bentuk pangkalan data** dan migrasi
- **Pengesahan pengguna** dan kebenaran
- **Operasi CRUD** untuk siaran blog dan komen
- **Muat naik fail** dan pengurusan media
- **Prinsip reka bentuk responsif** web
- **Amalan pembangunan PHP** moden

## Ciri-ciri

- Pendaftaran dan pengesahan pengguna
- Cipta, baca, kemas kini, dan padam siaran blog
- Sistem komen untuk penglibatan pengguna
- Pengurusan profil pengguna
- Dashboard admin untuk moderasi kandungan
- Reka bentuk responsif untuk mudah alih dan desktop
- Fungsi muat naik imej
- Keupayaan carian dan penapisan

## Bermula

### Prasyarat

- PHP 8.2 atau lebih tinggi
- Composer
- Node.js dan npm
- Pangkalan data MySQL atau PostgreSQL
- Laravel Herd atau Valet (untuk pembangunan tempatan)

### Pemasangan

1. Klon repositori:
   ```bash
   git clone https://github.com/syahrinseth/aplikasi-blog.git
   cd aplikasi-blog
   ```

2. Pasang kebergantungan PHP:
   ```bash
   composer install
   ```

3. Pasang kebergantungan JavaScript:
   ```bash
   npm install
   ```

4. Salin fail persekitaran:
   ```bash
   cp .env.example .env
   ```

5. Jana kunci aplikasi:
   ```bash
   php artisan key:generate
   ```

6. Konfigurasikan pangkalan data anda dalam fail `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=aplikasi_blog
   DB_USERNAME=nama_pengguna_anda
   DB_PASSWORD=kata_laluan_anda
   ```

7. Jalankan migrasi pangkalan data:
   ```bash
   php artisan migrate
   ```

8. Benih pangkalan data (pilihan):
   ```bash
   php artisan db:seed
   ```

9. Bina aset frontend:
   ```bash
   npm run dev
   ```

10. Mulakan pelayan pembangunan:
    ```bash
    php artisan serve
    ```

## Objektif Pembelajaran

Pelajar yang mengerjakan projek ini akan mempelajari:

- **Laravel Framework**: Memahami seni bina MVC, routing, middleware, dan Eloquent ORM
- **Pengurusan Pangkalan Data**: Mencipta migrations, models, dan relationships
- **Pengesahan**: Melaksanakan pendaftaran pengguna, log masuk, dan pengurusan sesi
- **Integrasi Frontend**: Bekerja dengan Blade templates dan integrasi dengan framework JavaScript
- **Kawalan Versi**: Menggunakan Git untuk pembangunan kolaboratif
- **Deployment**: Menyediakan aplikasi untuk persekitaran produksi

## Sumber Pembelajaran

- [Dokumentasi Laravel](https://laravel.com/docs) - Dokumentasi rasmi Laravel
- [Laravel Bootcamp](https://bootcamp.laravel.com) - Membina aplikasi Laravel pertama anda
- [Laracasts](https://laracasts.com) - Tutorial video untuk Laravel dan PHP moden
- [PHP: The Right Way](https://phptherightway.com/) - Amalan terbaik PHP moden

## Struktur Silibus Kursus

Projek ini direka untuk diselesaikan mengikut struktur kelas berikut:

### **Kelas 1 - Pengenalan Laravel & Struktur Projek**
- Pengenalan Laravel
- Pemasangan Laravel 12
- Konsep MVC (Model-View-Controller)
- Struktur Direktori Laravel

### **Kelas 2 - Asas Laravel MVC**
- Routing (web.php)
- Asas Blade View, Layout Blade, Komponen Blade
- Controller, Binding Route-Controller

### **Kelas 3 - Pembangunan Blog Post**
- Database Migration
- Database Seeding
- Borang & Pengesahan (Validation), Mesej Tersuai

### **Kelas 4 - Pembangunan Senarai Blog Post - Bahagian 1**
- Asas "SQL Query"

### **Kelas 5 - Pembangunan Senarai Blog Post - Bahagian 2**
- Query Builder
- Pagination
- Asas Eloquent ORM

### **Kelas 6 - Pembangunan Senarai Blog Post - Bahagian 3**
- Relationships
- Mutators / Casts
- Query Filters

### **Kelas 7 - Pembangunan Pengesahan & Keizinan Pengguna - Bahagian 1**
- Laravel Auth Starter Kit
- Laravel Gates dan Policy

### **Kelas 8 - Pembangunan Pengesahan & Keizinan Pengguna - Bahagian 2**
- Spatie Laravel Permission (Role & Permission)

## Teknologi Yang Digunakan

- **Backend**: Laravel 12, PHP 8.4
- **Frontend**: Blade Templates, Tailwind CSS, Alpine.js
- **Pangkalan Data**: MySQL
- **Build Tools**: Vite
- **Persekitaran Pembangunan**: Laravel Herd

## Menyumbang

Ini adalah projek pembelajaran untuk pelajar bootcamp pengaturcaraan. Sumbangan dan cadangan adalah dialu-alukan! Sila rasa bebas untuk:

- Fork repositori
- Cipta cawangan ciri
- Buat perubahan anda
- Hantar pull request

## Sokongan

Jika anda menghadapi sebarang isu atau mempunyai soalan tentang projek bootcamp ini, sila:

1. Semak isu sedia ada di GitHub
2. Cipta isu baru dengan maklumat terperinci
3. Hubungi instruktur bootcamp anda
4. Sertai saluran Discord/Slack bootcamp untuk sokongan komuniti

## Lesen

Projek ini adalah perisian sumber terbuka yang dilesenkan di bawah [lesen MIT](https://opensource.org/licenses/MIT).
