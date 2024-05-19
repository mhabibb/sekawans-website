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
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('role:superadmin,admin,adminps');

    // User resource route - superadmin only
    Route::resource('/users', UserController::class)->except('edit')->middleware('role:superadmin');
    Route::post('/users/first', [UserController::class, 'firstLogin'])->name('users.firstLogin'); 
    Route::post('/users/{user}/reset', [UserController::class, 'reset'])->name('users.reset')->middleware('role:superadmin');

    // User profile route for admin, adminps
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('role:superadmin,admin,adminps');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update')->middleware('role:superadmin,admin,adminps');
    
    // Logs - superadmin only
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index')->middleware('role:superadmin');
    Route::put('/logs/{activity}/restore', [LogController::class, 'restore'])->name('logs.restore')->middleware('role:superadmin');

    // Static Element controller route
    Route::controller(StaticElementController::class)->group(function () {
        Route::get('/sekawans', 'index')->name('sekawans.index')->middleware('role:superadmin,admin');
        Route::post('/sekawans/{sekawan}', 'update')->name('sekawans.update')->middleware('role:superadmin,admin');
    });

    // Message resource route
    Route::resource('/messages', MessageController::class)->middleware('role:superadmin,admin');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index')->middleware('role:superadmin,admin');
    Route::get('/messages/{id}', [MessageController::class, 'show'])->name('admin.message.detail')->middleware('role:superadmin,admin');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy')->middleware('role:superadmin,admin');
    Route::get('/messages/{id}/restore', [MessageController::class, 'restore'])->name('messages.restore')->middleware('role:superadmin,admin');

    // Patient resource route
    Route::resource('/patients', PatientController::class)->middleware('role:superadmin,admin,adminps');
    Route::controller(PatientController::class)->group(function () {
        Route::get('/patient/{regencies}', 'regency')->name('patients.regency')->middleware('role:superadmin,admin,adminps');
    });

    // Screening controller route
    Route::get('/screening', [ScreeningController::class, 'index'])->name('screening.index')->middleware('role:superadmin,admin,adminps');
    Route::get('/screenings/{id}', [ScreeningController::class, 'show'])->name('screening.show')->middleware('role:superadmin,admin,adminps');
    Route::delete('/screening/{id}', [ScreeningController::class, 'destroy'])->name('screening.destroy')->middleware('role:superadmin,admin');

    // Satellite Health
    Route::controller(SatelliteHealthFacilityController::class)->group(function () {
        Route::get('/fasyankes', 'index')->name('fasyankes.index')->middleware('role:superadmin,admin,adminps');
        Route::get('/fasyankes/{table}/{name}', 'check')->name('fasyankes.check')->middleware('role:superadmin,admin');
        Route::put('/fasyankes/{table}/{data}', 'update')->name('fasyankes.update')->middleware('role:superadmin,admin');
        Route::delete('/fasyankes/{table}/{id}', 'destroy')->name('fasyankes.destroy')->middleware('role:superadmin,admin');
    });

    // Route resource for Satellite Health Facility
    Route::resource('facilities', SatelliteHealthFacilityController::class)->middleware('role:superadmin,admin,adminps');

    // Article resource route
    Route::resource('/articles', ArticleController::class)->middleware('role:superadmin,admin');
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/infos', 'index')->name('infotbc.index')->middleware('role:superadmin,admin');
        Route::get('/infos/create', 'create')->name('infotbc.create')->middleware('role:superadmin,admin');
        Route::post('/infos', 'store')->name('infotbc.store')->middleware('role:superadmin,admin');
        Route::get('/infos/{article}', 'show')->name('infotbc.show')->middleware('role:superadmin,admin');
        Route::get('/infos/{article}/edit', 'edit')->name('infotbc.edit')->middleware('role:superadmin,admin');
        Route::put('/infos/{article}', 'update')->name('infotbc.update')->middleware('role:superadmin,admin');
        Route::delete('/infos/{article}', 'destroy')->name('infotbc.destroy')->middleware('role:superadmin,admin');
        Route::get('/actions', 'index')->name('kegiatan.index')->middleware('role:superadmin,admin');
        Route::get('/actions/create', 'create')->name('kegiatan.create')->middleware('role:superadmin,admin');
        Route::post('/actions', 'store')->name('kegiatan.store')->middleware('role:superadmin,admin');
        Route::get('/actions/{article}', 'show')->name('kegiatan.show')->middleware('role:superadmin,admin');
        Route::get('/actions/{article}/edit', 'edit')->name('kegiatan.edit')->middleware('role:superadmin,admin');
        Route::put('/actions/{article}', 'update')->name('kegiatan.update')->middleware('role:superadmin,admin');
        Route::delete('/actions/{article}', 'destroy')->name('kegiatan.destroy')->middleware('role:superadmin,admin');
        Route::get('/trashed/{path}', 'trashed')->name('trashed.index')->middleware('role:superadmin,admin');
        Route::put('/restore/{article}', 'restore')->name('articles.restore')->withTrashed()->middleware('role:superadmin,admin');
        Route::delete('/force/{article}', 'forceDelete')->name('articles.forceDelete')->withTrashed()->middleware('role:superadmin,admin');
    });

    // Document resource route
    Route::resource('/documents', DocumentController::class)->middleware('role:superadmin,admin');
    Route::controller(DocumentController::class)->group(function () {
        Route::get('/documents', 'index')->name('documents.index')->middleware('role:superadmin,admin');
        Route::get('/documents/create', 'create')->name('documents.create')->middleware('role:superadmin,admin');
        Route::post('/documents', 'store')->name('documents.store')->middleware('role:superadmin,admin');
        Route::get('/documents/{document}', 'show')->name('documents.show')->middleware('role:superadmin,admin');
        Route::get('/documents/{document}/edit', 'edit')->name('documents.edit')->middleware('role:superadmin,admin');
        Route::put('/documents/{document}', 'update')->name('admin.documents.update')->middleware('role:superadmin,admin');
        Route::delete('/documents/{document}', 'destroy')->name('documents.destroy')->middleware('role:superadmin,admin');
    });
});

// Routes for public access
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

// Screening routes for public access
Route::controller(ScreeningController::class)->group(function () {
    Route::post('/screening/store','store')->name('screening.store');
    Route::get('/screening/hasil','result')->name('screening.result');
});

Route::get('/download-surat-rekomendasi', [ScreeningController::class, 'downloadSuratRekomendasi'])->name('download.surat.rekomendasi');
Route::post('/fasyankes', [SatelliteHealthFacilityController::class, 'store'])->name('admin.fasyankes.store');
Route::get('/pesan', [MessageController::class, 'create'])->name('pesan.create');
Route::post('/pesan', [MessageController::class, 'store'])->name('pesan.store');
