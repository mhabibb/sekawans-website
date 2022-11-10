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

Route::view('/tentang', 'tentang.tentang')->name('tentang');
Route::view('/struktur', 'tentang.struktur')->name('struktur');


Route::view('/info-tbc', 'info_tbc.info_tbc')->name('infotbc');
Route::view('/single_infotbc', 'info_tbc.single_infotbc')->name('single_infotbc');

Route::view('/kasus_tbc', 'kasus_tbc.kasustbc')->name('kasustbc');

Route::view('/artikel', 'artikel.artikel')->name('artikel');
Route::view('/artikel/1', 'artikel.single_artikel');

Route::view('/kegiatan', 'kegiatan.kegiatan')->name('kegiatan');
Route::view('/single_kegiatan', 'kegiatan.single_kegiatan');

Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/admin', 'admin.dashboard')->name('dashboard');

Route::view('/admin/artikel', 'admin.admin_artikel.index');
Route::view('/admin/artikel/create', 'admin.admin_artikel.create');
Route::view('/admin/artikel/1', 'admin.admin_artikel.show');
Route::view('/admin/artikel/1/edit', 'admin.admin_artikel.edit');

Route::view('/admin/profil-organisasi', 'admin.admin_organisasi.index');
Route::view('/admin/profil-organisasi/create', 'admin.admin_organisasi.create');
Route::view('/admin/profil-organisasi/1', 'admin.admin_organisasi.show');
Route::view('/admin/profil-organisasi/1/edit', 'admin.admin_organisasi.edit');

Route::view('/admin/kegiatan', 'admin.admin_kegiatan.index');
Route::view('/admin/kegiatan/create', 'admin.admin_kegiatan.create');
Route::view('/admin/kegiatan/single_kegiatan', 'admin.admin_kegiatan.show');
Route::view('/admin/kegiatan/single_kegiatan/edit', 'admin.admin_kegiatan.edit');

Route::view('/admin/info-tbc', 'admin.admin_infotbc.index');
Route::view('/admin/info-tbc/create', 'admin.admin_infotbc.create');
Route::view('/admin/info-tbc/1', 'admin.admin_infotbc.show');
Route::view('/admin/info-tbc/1/edit', 'admin.admin_infotbc.edit');
