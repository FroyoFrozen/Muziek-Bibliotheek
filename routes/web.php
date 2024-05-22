<?php

use App\Http\Controllers\ArtiestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\AlbumController;

Route::middleware(['auth'])->group(function () {
    Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
    Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
    Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/mijnArtiesten', [ArtiestController::class, 'index'])->name('mijnArtiesten');
    Route::post('/artiesten', [ArtiestController::class, 'store'])->name('artiesten.store');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
