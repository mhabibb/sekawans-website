<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StaticElementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WorkerController;
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

// Route::view('/', 'index')->name('beranda');

// Route::view('/tentang', 'tentang.tentang')->name('tentang');
// Route::view('/struktur', 'tentang.struktur')->name('struktur');


// Route::view('/info-tbc', 'info_tbc.info_tbc')->name('infotbc');
// Route::view('/single_infotbc', 'info_tbc.single_infotbc')->name('single_infotbc');

// Route::view('/kasus_tbc', 'kasus_tbc.kasustbc')->name('kasustbc');

// Route::view('/artikel', 'artikel.artikel')->name('artikel');
// Route::view('/artikel/1', 'artikel.single_artikel');

// Route::view('/kegiatan', 'kegiatan.kegiatan')->name('kegiatan');
// Route::view('/single_kegiatan', 'kegiatan.single_kegiatan');

Auth::routes(['register' => false]);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::view('/admin', 'admin.dashboard')->name('dashboard');

// Route::view('/admin/artikel', 'admin.admin_artikel.index');
// Route::view('/admin/artikel/create', 'admin.admin_artikel.create');
// Route::view('/admin/artikel/1', 'admin.admin_artikel.show');
// Route::view('/admin/artikel/1/edit', 'admin.admin_artikel.edit');

// Route::view('/admin/profil-organisasi', 'admin.admin_organisasi.index');
// Route::view('/admin/profil-organisasi/create', 'admin.admin_organisasi.create');
// Route::view('/admin/profil-organisasi/1', 'admin.admin_organisasi.show');
// Route::view('/admin/profil-organisasi/1/edit', 'admin.admin_organisasi.edit');

// Route::view('/admin/kegiatan', 'admin.admin_kegiatan.index');
// Route::view('/admin/kegiatan/create', 'admin.admin_kegiatan.create');
// Route::view('/admin/kegiatan/single_kegiatan', 'admin.admin_kegiatan.show');
// Route::view('/admin/kegiatan/single_kegiatan/edit', 'admin.admin_kegiatan.edit');

// Route::view('/admin/info-tbc', 'admin.admin_infotbc.index');
// Route::view('/admin/info-tbc/create', 'admin.admin_infotbc.create');
// Route::view('/admin/info-tbc/1', 'admin.admin_infotbc.show');
// Route::view('/admin/info-tbc/1/edit', 'admin.admin_infotbc.edit');


Route::group(['middleware' => 'auth'], function () {
  Route::resource('/admin/profile', UserController::class);
  Route::resource('/admin/patient', PatientController::class);
  Route::resource('/admin/sekawans', StaticElementController::class)->except(['create', 'destroy', 'store']);
  Route::resource('/admin/worker', WorkerController::class);
  Route::resource('/admin/article', ArticleController::class);
  Route::controller(ArticleController::class)->group(function () {
    Route::get('/admin/info', 'index');
    // Route::get('/admin/case', 'index');
    Route::get('/admin/action', 'index');
  });
});

Route::controller(WebController::class)->group(function () {
  Route::get('/', 'index')->name('beranda');
  Route::get('/about', 'about')->name('tentang');
  Route::get('/structur', 'structur')->name('struktur');
  Route::get('/info', 'info')->name('infotbc');
  Route::get('/info/{id}', 'showInfo')->name('single_infotbc');
  Route::get('/case', 'case')->name('kasustbc');
  Route::get('/case/{id}', 'showCase')->name('single_kasustbc');
  Route::get('/article', 'article')->name('artikel');
  Route::get('/article/{id}', 'showArticle')->name('single_artikel');
  Route::get('/action', 'action')->name('kegiatan');
  Route::get('/action/{id}', 'showAction')->name('single_kegiatan');
});
