<?php

use App\Helpers\ApiResponse;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\SlideshowController;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\BeritaController;

// login route
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return ApiResponse::response('Hello World');
});

// Auth
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

// Public Route
Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'publicIndex']);
    Route::get('/{beritaId}', [BeritaController::class, 'publicShow']);
});

Route::prefix('agenda')->group(function () {});

Route::prefix('slideshow')->group(function () {});

// CMS
Route::middleware(['auth:sanctum'])->prefix('cms')->group(function () {
    Route::apiResource('berita', BeritaController::class);
});

//admin slideshow   
Route::apiResource('slideshow', SlideshowController::class)->except(['show', 'update']);
Route::post('slideshow/update', [SlideshowController::class, 'update']);

//admin faq
Route::apiResource('faq', FaqController::class);

//admin agenda
Route::apiResource('agenda', AgendaController::class);
