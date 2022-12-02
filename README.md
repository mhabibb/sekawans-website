# Source Code Website SEKAWAN'S TB JEMBER

Website dikembangkan dengan menggunakan framework Laravel 9

## Instalasi Frontend

-   Pastikan composer dan node sudah terinstal di komputer
-   Clone repository ini
-   Masuk ke folder repository local
-   Instal composer

```bash
composer install
```

-   Instal package 'laravel/ui' dan 'ladumor/laravel-pwa'

```bash
composer require laravel/ui
```

```bash
composer require ladumor/laravel-pwa
```

-   Instal node ke project

```bash
npm install
```

-   Pastikan variables di 'resources\sass_variables.scss' seperti berikut

```scss
// Body
$body-bg: #f8fafc;

// Typography
$font-family-sans-serif: "Poppins", sans-serif;
$font-size-base: 1rem;
$line-height-base: 1.5;
```

-   Pastikan custom css di 'resources\sass\app.scss' untuk font family, warna primary dan secondary, dan module line clamp (truncate text pada card artikel)

```scss
// Fonts
@import url("https://fonts.bunny.net/css?family=Poppins");

// Variables
@import "variables";
$primary: #5115b1;
$secondary: #e71c36;

// Bootstrap
@import "bootstrap/scss/bootstrap";

.module {
    margin: 0 0 1em 0;
    overflow: hidden;
}

.module p {
    margin: 0;
}

.line-clamp {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
```

-   Rename file .env.examples menjadi .env dan sesuaikan

-   Migrasi database dengan jalankan PHP Artisan

```bash
php artisan migrate:fresh
```

Atau bisa juga migrasi dengan dummy data dengan menjalankan PHP Artisan

```bash
php artisan migrate:fresh --seed
```

-   Compile assets dan jalankan

```bash
npm run dev
```

-   Buka terminal baru dan jalankan server

```bash
php artisan serve
```
