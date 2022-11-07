<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index')->name('beranda');

Route::view('/tentang', 'tentang')->name('tentang');

Route::view('/info-tbc', 'infotbc.infotbc')->name('infotbc');
// Route::view('/info-tbc/{info-tbc}', 'infotbc.infotbc_single');

Route::view('/kasus-tbc', 'kasustbc.kasustbc')->name('kasustbc');

Route::view('/artikel', 'artikel.artikel')->name('artikel');

Route::view('/kegiatan', 'kegiatan.kegiatan')->name('kegiatan');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/admin', 'admin.dashboard')->name('dashboard');
