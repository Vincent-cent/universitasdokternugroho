<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index']);
Route::get('/berita/{id}', [App\Http\Controllers\BeritaController::class, 'show']);
