<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KonotatifController;
use App\Http\Controllers\SlideshowController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Welcome'
    ]);
});

Route::get('/slideshow', function () {
    return view('slideshow', [
        'title' => 'Slideshow'
    ]);
});


// Auth
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

// Public Route


// CMS
Route::prefix('cms')->group(function () {
    Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita']);

    //admin slideshow   
    Route::get('slideshow/current', [SlideshowController::class, 'index']);
    Route::apiResource('slideshow', SlideshowController::class)->except(['update', 'edit', 'show']);

    //admin faq
    // Route::apiResource('faq', FaqController::class);

    // //admin agenda
    // Route::apiResource('agenda', AgendaController::class);

    // //admin kamar data
    Route::apiResource('konotatif', KonotatifController::class);
    // Route::apiResource('citraan', CitraanController::class);
    // Route::apiResource('gaya_bahasa', GayaBahasaController::class);

    // Route::prefix('import')->group(function () {
    //     Route::post('konotatif', [KonotatifController::class, 'import']);
    //     Route::post('citraan', [CitraanController::class, 'import']);
    // });
});
