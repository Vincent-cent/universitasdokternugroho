<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index']);
Route::get('/berita/{id}', [App\Http\Controllers\BeritaController::class, 'show']);



Route::get('/tentang', function () {return view('tentang');});
Route::get('/kontak', function () {return view('kontak');});
Route::get('/program', function () {return view('program');});

