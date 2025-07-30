<?php

use App\Helper\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\SlideshowController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\AgendaController;

// login route
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//admin slideshow   
Route::apiResource('slideshow', SlideshowController::class)->except(['show','update']);
Route::post('slideshow/update', [SlideshowController::class, 'update']);

//admin faq
Route::apiResource('faq', FaqController::class);

//admin agenda
Route::apiResource('agenda', AgendaController::class);
