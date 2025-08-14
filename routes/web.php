<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage', [
        'title' => 'Sastra UM'
    ]);
});
