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

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
  // Route::group(['middleware' => 'auth'], function () {
  Route::resource('/users', UserController::class);
  Route::resource('/patient', PatientController::class);
  Route::resource('/sekawans', StaticElementController::class)->except(['create', 'destroy', 'store']);
  Route::resource('/worker', WorkerController::class);
  Route::resource('/articles', ArticleController::class);
  Route::controller(ArticleController::class)->group(function () {
    Route::get('/infos', 'index')->name('infotbc');
    Route::get('/infos/create', 'create')->name('infotbc.create');
    Route::get('/infos/{article}', 'show')->name('infotbc.show');
    Route::get('/infos/{article}/edit', 'edit')->name('infotbc.edit');
    Route::get('/actions', 'index')->name('kegiatan');
    Route::get('/actions/create', 'create')->name('kegiatan.create');
    Route::get('/actions/{article}', 'show')->name('kegiatan.show');
    Route::get('/actions/{article}/edit', 'edit')->name('kegiatan.edit');
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
