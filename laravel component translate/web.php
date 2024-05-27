<?php

use App\Http\Controllers\langcontoller;
use Illuminate\Support\Facades\Route;



Route::get('/set-language', [langcontoller::class, 'setLanguage'])->name('set.language');

Route::get('/', function () {
        return view('welcome');
});

Route::get('/About', function () {
        return view('about');
});