<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StaticElementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false]);
Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
  Route::resource('/admin/profile', UserController::class);
  Route::resource('/admin/patient', PatientController::class);
  Route::resource('/admin/sekawans', StaticElementController::class)->except(['create', 'destroy', 'store']);
  Route::resource('/admin/worker', WorkerController::class);
  Route::resource('/admin/articles', ArticleController::class);
  Route::controller(ArticleController::class)->group(function () {
    Route::get('/admin/infos', 'index')->name('admin.infotbc');
    Route::get('/admin/infos/create', 'create')->name('admin.infotbc.create');
    Route::get('/admin/infos/{article}', 'show')->name('admin.infotbc.show');
    Route::get('/admin/infos/{article}/edit', 'edit')->name('admin.infotbc.edit');
    Route::get('/admin/actions', 'index')->name('admin.kegiatan');
    Route::get('/admin/actions/create', 'create')->name('admin.kegiatan.create');
    Route::get('/admin/actions/{article}', 'show')->name('admin.kegiatan.show');
    Route::get('/admin/actions/{article}/edit', 'edit')->name('admin.kegiatan.edit');
  });
});

Route::controller(WebController::class)->group(function () {
  Route::get('/', 'index')->name('beranda');
  Route::get('/tentang', 'about')->name('tentang');
  Route::get('/struktur', 'structur')->name('struktur');
  Route::get('/info', 'info')->name('infotbc');
  Route::get('/info/{compek}', 'showInfo')->name('single_infotbc');
  Route::get('/kasus', 'case')->name('kasustbc');
  Route::get('/kasus/{compek}', 'showCase')->name('single_kasustbc');
  Route::get('/article', 'article')->name('artikel');
  Route::get('/article/{compek}', 'showArticle')->name('single_artikel');
  Route::get('/action', 'action')->name('kegiatan');
  Route::get('/action/{compek}', 'showAction')->name('single_kegiatan');
});
