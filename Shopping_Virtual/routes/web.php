<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LojasController;
use App\Http\Controllers\CategoriaController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [LojasController::class, 'index'])->name('loja.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/loja', [LojasController::class, 'store'])->name('loja.store');
    Route::get('/loja_salvar', [LojasController::class, 'create'])->name('loja.create');
    Route::delete('/loja/{id}', [lojasController::class, 'destroy'])->name('loja.destroy');
    Route::get('/lojas/{id}', [LojasController::class, 'show'])->name('loja.show');

    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/categoria_salvar', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
    Route::get('/categorias/{id}', [CategoriaController::class, 'show'])->name('categorias.show');
});

require __DIR__.'/auth.php';
