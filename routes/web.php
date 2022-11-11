<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ArticleController;
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

Route::get('/', function () {
  $articles = Article::all()->where('category_id', 2);
  return view('index', [
    'articles' => $articles->sortByDesc('created_at')->take(3)
  ]);
})->name('beranda');

Route::view('/tentang', 'tentang.tentang')->name('tentang');
Route::view('/struktur', 'tentang.struktur')->name('struktur');


Route::view('/info-tbc', 'info_tbc.info_tbc')->name('infotbc');
Route::view('/single_infotbc', 'info_tbc.single_infotbc')->name('single_infotbc');

Route::view('/kasus_tbc', 'kasus_tbc.kasustbc')->name('kasustbc');

Route::middleware(['guest'])->group(function () {
  Route::get('/artikel', function () {
    $articles = Article::all()->where('category_id', 2);
    return view('artikel.artikel', [
      'articles' => $articles->sortByDesc('created_at')->paginate(12)->withQueryString()
    ]);
  })->name('artikel');

  Route::get('/artikel/{article}', function (Article $article) {
    return view('artikel.single_artikel', [
      'article' => $article
    ]);
  })->name('artikel.single');
});

Route::middleware(['guest'])->group(function () {
  Route::get('/kegiatan', function () {
    $activities = Article::all()->where('category_id', 3);
    return view('kegiatan.kegiatan', [
      'activities' => $activities->sortByDesc('created_at')->paginate(12)->withQueryString()
    ]);
  })->name('kegiatan');

  Route::get('/kegiatan/{activity}', function (Article $activity) {
    return view('kegiatan.single_kegiatan', [
      'activity' => $activity
    ]);
  })->name('kegiatan.single');
});

Auth::routes(['register' => false]);

Route::view('/admin', 'admin.dashboard')->name('dashboard');

Route::resource('/admin/articles', ArticleController::class)
  ->missing(function (Request $request) {
    return redirect(route('articles.index'));
  });

Route::resource('/admin/activities', ActivityController::class)
  ->missing(function (Request $request) {
    return redirect(route('activities.index'));
  });

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
