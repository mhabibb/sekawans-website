# Source Code Website SEKAWAN'S TB JEMBER

Website dikembangkan dengan menggunakan framework Laravel 9 dan Bootstrap v5.2

## Instalasi Frontend

- Pastikan composer dan node sudah terinstal
- Clone repository ini
- Masuk ke folder repository local
- Instal composer
```bash
composer install
```

- Instal package laravel/ui dengan composer
```bash
composer require laravel/ui
```

- Instal dependensi frontend
```bash
npm install
```

- Pastikan variables di 'resources\sass\_variables.scss' seperti berikut
```scss
// Body
$body-bg: #f8fafc;

// Typography
$font-family-sans-serif: 'Poppins', sans-serif;
$font-size-base: 1rem;
$line-height-base: 1.5;
```

- Pastikan custom css di 'resources\sass\app.scss' untuk font family, warna primary dan secondary, dan module line clamp (truncate text pada card artikel)
```scss
// Fonts
@import url('https://fonts.bunny.net/css?family=Poppins');

// Variables
@import 'variables';
$primary: #5115B1;
$secondary: #E71C36;

// Bootstrap
@import 'bootstrap/scss/bootstrap';

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

- Compile assets dan jalankan webpack
```bash
npm run dev
```

- Buka terminal baru dan jalankan server
```bash
php artisan serve
```
