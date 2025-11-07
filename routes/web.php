<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\CollaboratorController;

Route::get('/', function () {
    return view('beranda');
});

Route::middleware(['auth', 'can:admin'])->prefix('admin')->group(function () {
    Route::resource('programs', ProgramController::class);
    Route::resource('activities', ActivityController::class);
    Route::resource('collaborators', CollaboratorController::class);
});

Route::get('/alumni', [App\Http\Controllers\AlumniController::class, 'index']);
Route::post('/alumni', [App\Http\Controllers\AlumniController::class, 'store'])->name('alumni.store')->middleware('auth');
Route::get('/alumni/{id}', [App\Http\Controllers\AlumniController::class, 'show'])->name('alumni.show');
Route::get('/alumni/{id}/edit', [App\Http\Controllers\AlumniController::class, 'edit'])->name('alumni.edit')->middleware('auth');
Route::put('/alumni/{id}', [App\Http\Controllers\AlumniController::class, 'update'])->name('alumni.update')->middleware('auth');
Route::delete('/alumni/{id}', [App\Http\Controllers\AlumniController::class, 'destroy'])->name('alumni.destroy')->middleware('auth');

Route::get('/journal/{id}', [App\Http\Controllers\AlumniController::class, 'showJournal'])->name('journal.show');
Route::post('/alumni/{id}/journal', [App\Http\Controllers\AlumniController::class, 'storeJournal'])->name('alumni.journal.store')->middleware('auth');
Route::get('/journal/{id}/edit', [App\Http\Controllers\AlumniController::class, 'editJournal'])->name('journal.edit')->middleware('auth');
Route::put('/journal/{id}', [App\Http\Controllers\AlumniController::class, 'updateJournal'])->name('journal.update')->middleware('auth');
Route::delete('/journal/{id}', [App\Http\Controllers\AlumniController::class, 'deleteJournal'])->name('alumni.journal.delete')->middleware('auth');

Route::get('/prestasi/{id}', [App\Http\Controllers\AlumniController::class, 'showPrestasi'])->name('prestasi.show');
Route::post('/alumni/{id}/prestasi', [App\Http\Controllers\AlumniController::class, 'storePrestasi'])->name('alumni.prestasi.store')->middleware('auth');
Route::get('/prestasi/{id}/edit', [App\Http\Controllers\AlumniController::class, 'editPrestasi'])->name('prestasi.edit')->middleware('auth');
Route::put('/prestasi/{id}', [App\Http\Controllers\AlumniController::class, 'updatePrestasi'])->name('prestasi.update')->middleware('auth');
Route::delete('/prestasi/{id}', [App\Http\Controllers\AlumniController::class, 'deletePrestasi'])->name('alumni.prestasi.delete')->middleware('auth');

Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index']);
Route::get('/berita/tambah', [App\Http\Controllers\BeritaController::class, 'create'])->name('berita.tambah')->middleware('auth');
Route::post('/berita', [App\Http\Controllers\BeritaController::class, 'store'])->name('berita.store')->middleware('auth');
Route::get('/berita/{id}/edit', [App\Http\Controllers\BeritaController::class, 'edit'])->name('berita.edit')->middleware('auth');
Route::put('/berita/{id}', [App\Http\Controllers\BeritaController::class, 'update'])->name('berita.update')->middleware('auth');
Route::delete('/berita/{id}', [App\Http\Controllers\BeritaController::class, 'destroy'])->name('berita.destroy')->middleware('auth');
Route::patch('/berita/{id}/toggle', [App\Http\Controllers\BeritaController::class, 'toggleShow'])->name('berita.toggle')->middleware('auth');
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

require __DIR__ . '/auth.php';