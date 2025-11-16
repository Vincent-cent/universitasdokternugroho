<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\CollaboratorController;
use App\Http\Controllers\ProgramPageController;
use App\Http\Controllers\ProgramSearchController;
use App\Http\Controllers\CollaboratorSearchController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\BeritaController;


Route::get('/', function () {
    return view('beranda');
});

Route::middleware(['auth', 'can:admin'])->prefix('admin')->group(function () {
    Route::resource('programs', ProgramController::class);
    Route::resource('activities', ActivityController::class);
    Route::resource('collaborators', CollaboratorController::class);
});
Route::get('/collaborator/search', [CollaboratorSearchController::class, 'index'])->name('collaborator.search');
Route::prefix('admin')->middleware(['auth', 'can:admin'])->group(function () {
    Route::resource('collaborators', CollaboratorController::class);
});

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/collaborator/create', [CollaboratorSearchController::class, 'create'])->name('collaborator.create');
    Route::post('/collaborator', [CollaboratorSearchController::class, 'store'])->name('collaborator.store');
    Route::get('/collaborator/{collaborator}/edit', [CollaboratorSearchController::class, 'edit'])->name('collaborator.edit');
    Route::put('/collaborator/{collaborator}', [CollaboratorSearchController::class, 'update'])->name('collaborator.update');
    Route::delete('/collaborator/{collaborator}', [CollaboratorSearchController::class, 'destroy'])->name('collaborator.destroy');
});

Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');
Route::get('/alumni/{id}', [AlumniController::class, 'show'])->name('alumni.show');
Route::post('/alumni', [AlumniController::class, 'store'])->name('alumni.store')->middleware('auth');
Route::get('/alumni', [AlumniController::class, 'index']);
Route::post('/alumni', [AlumniController::class, 'store'])->name('alumni.store')->middleware('auth');
Route::get('/alumni/{id}', [AlumniController::class, 'show'])->name('alumni.show');
Route::get('/alumni/{id}/edit', [AlumniController::class, 'edit'])->name('alumni.edit')->middleware('auth');
Route::put('/alumni/{id}', [AlumniController::class, 'update'])->name('alumni.update')->middleware('auth');
Route::delete('/alumni/{id}', [AlumniController::class, 'destroy'])->name('alumni.destroy')->middleware('auth');

Route::get('/journal/{id}', [AlumniController::class, 'showJournal'])->name('journal.show');
Route::post('/alumni/{id}/journal', [AlumniController::class, 'storeJournal'])->name('alumni.journal.store')->middleware('auth');
Route::get('/journal/{id}/edit', [AlumniController::class, 'editJournal'])->name('journal.edit')->middleware('auth');
Route::put('/journal/{id}', [AlumniController::class, 'updateJournal'])->name('journal.update')->middleware('auth');
Route::delete('/journal/{id}', [AlumniController::class, 'deleteJournal'])->name('alumni.journal.delete')->middleware('auth');
Route::get('/prestasi/{id}', [AlumniController::class, 'showPrestasi'])->name('prestasi.show');
Route::post('/alumni/{id}/prestasi', [AlumniController::class, 'storePrestasi'])->name('alumni.prestasi.store')->middleware('auth');
Route::get('/prestasi/{id}/edit', [AlumniController::class, 'editPrestasi'])->name('prestasi.edit')->middleware('auth');
Route::put('/prestasi/{id}', [AlumniController::class, 'updatePrestasi'])->name('prestasi.update')->middleware('auth');
Route::delete('/prestasi/{id}', [AlumniController::class, 'deletePrestasi'])->name('alumni.prestasi.delete')->middleware('auth');

Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/tambah', [BeritaController::class, 'create'])->name('berita.tambah')->middleware('auth');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store')->middleware('auth');
Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit')->middleware('auth');
Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update')->middleware('auth');
Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy')->middleware('auth');
Route::patch('/berita/{id}/toggle', [BeritaController::class, 'toggleShow'])->name('berita.toggle')->middleware('auth');
Route::get('/berita/{id}', [BeritaController::class, 'show']);

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/program', [ProgramPageController::class, 'index'])->name('program.index');
Route::get('/program/search', [ProgramSearchController::class, 'index'])->name('program.search');
Route::get('/program/{slug}', [ProgramPageController::class, 'show'])->name('program.show');


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