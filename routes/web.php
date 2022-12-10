<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StaticElementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatelliteWorkerController;
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

Auth::routes([
    'register' => false,
    'reset'    => false,
    'confirm'  => false,
    'verify'   => false,
]);

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/users', UserController::class)->except('edit');
    Route::post('/users/first', [UserController::class, 'firstLogin'])->name('users.firstLogin');
    Route::post('/users/{user}/reset', [UserController::class, 'reset'])->name('users.reset');

    Route::controller(StaticElementController::class)->group(function () {
        Route::get('/sekawans', 'index')->name('sekawans.index');
        Route::post('admin/sekawans/{sekawan}', 'update')->name('sekawans.update');
    });

    Route::resource('/patients', PatientController::class);
    Route::controller(PatientController::class)->group(function () {
        Route::get('/patient/{regencies}', 'regency')->name('patients.regency');
    });

    Route::controller(LogController::class)->group(function () {
        Route::get('/logs', 'index')->name('logs.index');
        Route::put('/logs/{activity}/restore', 'restore')->name('logs.restore');
    })->middleware(['can:superAdmin']);

    Route::controller(SatelliteWorkerController::class)->group(function () {
        Route::get('/fasyankes', 'index')->name('fasyankes.index');
        Route::delete('/fasyankes/{table}/{id}', 'destroy')->name('fasyankes.destroy');
    });

    Route::resource('/articles', ArticleController::class);
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/infos', 'index')->name('infotbc.index');
        Route::post('/infos', 'store')->name('infotbc.store');
        Route::get('/infos/create', 'create')->name('infotbc.create');
        Route::put('/infos/{article}', 'update')->name('infotbc.update');
        Route::delete('/infos/{article}', 'destroy')->name('infotbc.destroy');
        Route::get('/infos/{article}', 'show')->name('infotbc.show');
        Route::get('/infos/{article}/edit', 'edit')->name('infotbc.edit');
        Route::get('/actions', 'index')->name('kegiatan.index');
        Route::post('/actions', 'store')->name('kegiatan.store');
        Route::get('/actions/create', 'create')->name('kegiatan.create');
        Route::get('/actions/{article}', 'show')->name('kegiatan.show');
        Route::get('/actions/{article}/edit', 'edit')->name('kegiatan.edit');
        Route::put('/actions/{article}', 'update')->name('kegiatan.update');
        Route::delete('/actions/{article}', 'destroy')->name('kegiatan.destroy');
        Route::get('/trashed/{path}', 'trashed')->name('trashed.index');
        Route::put('/restore/{article}', 'restore')->name('articles.restore')->withTrashed();
        Route::delete('/force/{article}', 'forceDelete')->name('articles.forceDelete')->withTrashed();
    });
});

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('beranda');
    Route::get('/tentang', 'about')->name('tentang');
    Route::get('/struktur', 'structur')->name('struktur');
    Route::get('/info-tbc', 'info')->name('infotbc');
    Route::get('/info-tbc/{article}', 'showInfo')->name('infotbc.show');
    Route::get('/kasus-tbc', 'case')->name('kasustbc');
    Route::get('/kasus-tbc/{regency}', 'showCase')->name('kasustbc.show');
    Route::get('/artikel', 'article')->name('artikel');
    Route::get('/artikel/{article}', 'showArticle')->name('artikel.show');
    Route::get('/kegiatan', 'action')->name('kegiatan');
    Route::get('/kegiatan/{article}', 'showAction')->name('kegiatan.show');
    Route::get('search', 'liveSearch')->name('search');
});
