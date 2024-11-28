<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LojasController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProdutosController;



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
        // Página da loja com os produtos
    //Route::get('/loja/{id}', [LojasController::class, 'showProdutos'])->name('loja.produtos');

    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/categoria_salvar', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
    Route::get('/categorias/{id}', [CategoriaController::class, 'show'])->name('categorias.show');

    // Exibe os itens do carrinho
    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::get('/carrinho', [CarrinhoController::class, 'visualizar'])->name('carrinho.visualizar');

    // Adiciona um item ao carrinho
    Route::post('/carrinho/adicionar', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');

    // Atualiza a quantidade de um produto no carrinho
    Route::post('/carrinho/atualizar/{produtoId}', [CarrinhoController::class, 'atualizar'])->name('carrinho.atualizar');


    // Remove um item do carrinho
    Route::post('/carrinho/remover/{id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');

    // Página de detalhes do produto
    Route::get('/produto/{id}', [ProdutosController::class, 'show'])->name('produto.detalhes');
    Route::post('/produto', [ProdutosController::class, 'store'])->name('produto.store');
    Route::get('/produto_salvar', [ProdutosController::class, 'create'])->name('produto.create');

});

require __DIR__.'/auth.php';
