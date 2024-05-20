<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieTacheController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('taches/index', [TacheController::class, 'index'])->name('taches.index');

Route::get('categories/index', [CategorieTacheController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategorieTacheController::class, 'create'])->name('categories.create');
Route::post('categories/store', [CategorieTacheController::class, 'store'])->name('categories.store');
Route::post('categories/show/{id}', [CategorieTacheController::class, 'show'])->name('categories.show');
Route::post('categories/edit/{id}', [CategorieTacheController::class, 'edit'])->name('categories.edit');
Route::post('categories/destroy/{id}', [CategorieTacheController::class, 'destroy'])->name('categories.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';