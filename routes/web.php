<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/tentang-blog', function () {
    return view('about');
})->name('about');
