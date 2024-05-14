<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StaticElementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatelliteWorkerController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SatelliteHealthFacilityController;
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
    // Admin dashboard route
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // User resource route - only for superadmin
    Route::middleware('superadmin')->group(function () {
        Route::resource('/users', UserController::class)->except('edit');
        Route::post('/users/first', [UserController::class, 'firstLogin'])->name('users.firstLogin');
        Route::post('/users/{user}/reset', [UserController::class, 'reset'])->name('users.reset');

        // Log controller route - only for superadmin
        Route::controller(LogController::class)->group(function () {
            Route::get('/logs', 'index')->name('logs.index');
            Route::put('/logs/{activity}/restore', 'restore')->name('logs.restore');
        });
    });

    // Static Element controller route
    Route::controller(StaticElementController::class)->group(function () {
        Route::get('/sekawans', 'index')->name('sekawans.index');
        Route::post('admin/sekawans/{sekawan}', 'update')->name('sekawans.update');
    });

    // Message resource route
    Route::resource('/messages', MessageController::class);
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    
    // Patient resource route
    Route::resource('/patients', PatientController::class);
    Route::controller(PatientController::class)->group(function () {
        Route::get('/patient/{regencies}', 'regency')->name('patients.regency');
    });

    // Screening controller route
    Route::get('/screening', [ScreeningController::class, 'index'])->name('screening.index');
    Route::get('/screenings/{id}', [ScreeningController::class, 'show'])->name('screening.show');
    Route::delete('/screening/{id}', [ScreeningController::class, 'destroy'])->name('screening.destroy');
    
    // Satellite Health
    Route::controller(SatelliteHealthFacilityController::class)->group(function () {
        Route::get('/fasyankes', 'index')->name('fasyankes.index');
        Route::get('/fasyankes/{table}/{name}', 'check')->name('fasyankes.check');
        Route::put('/fasyankes/{table}/{data}', 'update')->name('fasyankes.update');
        Route::delete('/fasyankes/{table}/{id}', 'destroy')->name('fasyankes.destroy');
    });

    // Route resource for Satellite Health Facility
    Route::resource('facilities', SatelliteHealthFacilityController::class);

    // Article resource route
    Route::resource('/articles', ArticleController::class);
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/infos', 'index')->name('infotbc.index');
        Route::get('/infos/create', 'create')->name('infotbc.create');
        Route::post('/infos', 'store')->name('infotbc.store');
        Route::get('/infos/{article}', 'show')->name('infotbc.show');
        Route::get('/infos/{article}/edit', 'edit')->name('infotbc.edit');
        Route::put('/infos/{article}', 'update')->name('infotbc.update');
        Route::delete('/infos/{article}', 'destroy')->name('infotbc.destroy');
        Route::get('/actions', 'index')->name('kegiatan.index');
        Route::get('/actions/create', 'create')->name('kegiatan.create');
        Route::post('/actions', 'store')->name('kegiatan.store');
        Route::get('/actions/{article}', 'show')->name('kegiatan.show');
        Route::get('/actions/{article}/edit', 'edit')->name('kegiatan.edit');
        Route::put('/actions/{article}', 'update')->name('kegiatan.update');
        Route::delete('/actions/{article}', 'destroy')->name('kegiatan.destroy');
        Route::get('/trashed/{path}', 'trashed')->name('trashed.index');
        Route::put('/restore/{article}', 'restore')->name('articles.restore')->withTrashed();
        Route::delete('/force/{article}', 'forceDelete')->name('articles.forceDelete')->withTrashed();
    });

    // Document resource route
    Route::resource('/documents', DocumentController::class);
    Route::controller(DocumentController::class)->group(function () {
        Route::get('/documents', 'index')->name('documents.index');
        Route::get('/documents/create', 'create')->name('documents.create');
        Route::post('/documents', 'store')->name('documents.store');
        Route::get('/documents/{document}', 'show')->name('documents.show');
        Route::get('/documents/{document}/edit', 'edit')->name('documents.edit');
        Route::put('/documents/{document}', 'update')->name('documents.update');
        Route::delete('/documents/{document}', 'destroy')->name('documents.destroy');
    });

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('/messages/{id}/restore', [MessageController::class, 'restore'])->name('messages.restore');

});

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('beranda');
    Route::get('/tentang', 'about')->name('tentang');
    Route::get('/struktur', 'structur')->name('struktur');
    Route::get('/info-tbc', 'article')->name('infotbc');
    Route::get('/info-tbc/{article}', 'showArticle')->name('infotbc.show');
    Route::get('/kasus-tbc', 'case')->name('kasustbc');
    Route::get('/kasus-tbc/{regency}', 'showCase')->name('kasustbc.show');
    Route::get('/artikel', 'article')->name('artikel');
    Route::get('/artikel/{article}', 'showArticle')->name('artikel.show');
    Route::get('/kegiatan', 'article')->name('kegiatan');
    Route::get('/kegiatan/{article}', 'showArticle')->name('kegiatan.show');
    Route::get('search', 'liveSearch')->name('search');
    Route::get('/screening', 'screening')->name('screening');
    Route::get('/dokumen', 'dokumen')->name('dokumen');
    Route::get('/fasyankes', 'fasyankes')->name('fasyankes');
});

Route::controller(ScreeningController::class)->group(function () {
    Route::post('/screening/store','store')->name('screening.store');
    Route::get('/screening/hasil','result')->name('screening.result');
});

Route::get('/download-surat-rekomendasi', [ScreeningController::class, 'downloadSuratRekomendasi'])->name('download.surat.rekomendasi');
Route::post('/fasyankes', [SatelliteHealthFacilityController::class, 'store'])->name('admin.fasyankes.store');
Route::get('/pesan', [MessageController::class, 'create'])->name('pesan.create');
Route::post('/pesan', [MessageController::class, 'store'])->name('pesan.store');
