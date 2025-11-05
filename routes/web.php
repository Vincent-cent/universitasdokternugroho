<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/berita/tambah', [App\Http\Controllers\BeritaController::class, 'create'])->name('berita.tambah');
Route::post('/berita', [App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store');

Route::get('/admin/berita', [App\Http\Controllers\BeritaController::class, 'admin'])->name('berita.admin');
Route::get('/admin/berita/{id}/edit', [App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/admin/berita/{id}', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update');
Route::delete('/admin/berita/{id}', [App\Http\Controllers\BeritaController::class, 'destroy'])->name('berita.destroy');
Route::patch('/admin/berita/{id}/toggle', [App\Http\Controllers\BeritaController::class, 'toggleShow'])->name('berita.toggle');

Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index']);
Route::get('/berita/{id}', [App\Http\Controllers\BeritaController::class, 'show']);

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/program', function () {
    return view('program');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
