<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebController;
use App\Models\Article;
use Illuminate\Http\Request;
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

Route::controller(WebController::class)->group(function () {
  Route::get('/', 'index')->name('beranda');
  Route::get('/tentang', 'about')->name('tentang');
  Route::get('/info-tbc', 'info')->name('infotbc');
  Route::get('/info-tbc/{article}', 'showInfo')->name('single_infotbc');
  Route::get('/kasus-tbc', 'case')->name('kasustbc');
  Route::get('/artikel', 'article')->name('artikel');
  Route::get('/artikel/{article}', 'showArticle')->name('single_artikel');
  Route::get('/kegiatan', 'action')->name('kegiatan');
  Route::get('/kegiatan/{article}', 'showAction')->name('single_kegiatan');
});

Auth::routes(['register' => false]);

Route::middleware('web')->group(function () { // middleware bisa ganti
  Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

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

  Route::get('/admin/users', function () {
    return view('admin.users.index', [
      'title' => 'Kelola Akun'
    ]);
  })->name('admin.users');
});
