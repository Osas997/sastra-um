<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage', [
        'title' => 'Sastra UM'
    ]);
});

Route::get('/artikel-berita-agenda', function () {
    return view('artikel', [
        'title' => 'Sastra UM | Artikel'
    ]);
});
Route::get('/artikel-berita-agenda/detail', function () {
    return view('artikel-detail', [
        'title' => 'Sastra UM | Artikel'
    ]);
});
Route::get('/tentang-kami', function () {
    return view('tentang-kami', [
        'title' => 'Sastra UM | Tentang Kami'
    ]);
});

Route::get('/kamar-data', function () {
        return view('kamar-data', [
            'title' => 'Sastra UM | Kamar Data'
        ]);
});

