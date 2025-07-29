<?php

use App\Helpers\ApiResponse;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BeritaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('berita')->group(function () {});

Route::prefix('agenda')->group(function () {});

Route::prefix('slideshow')->group(function () {});

// CMS
Route::middleware(['auth:sanctum'])->prefix('cms')->group(function () {
    Route::apiResource('berita', BeritaController::class);
});
