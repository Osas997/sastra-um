<?php

use App\Helper\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\SlideshowController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('faq', FaqController::class);
Route::apiResource('slideshow', SlideshowController::class)->except(['show','update']);
Route::post('slideshow/update', [SlideshowController::class, 'update']);
