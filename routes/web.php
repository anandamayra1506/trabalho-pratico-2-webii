<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    // Rotas relacionadas ao perfil de usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas relacionadas às vendas
    Route::resource('vendas', VendasController::class);
    Route::patch('vendas/{id}/cancel', [VendasController::class, 'cancel'])->name('vendas.cancel');
    // Route::get('/vendas', [VendasController::class, 'index'])->name('vendas.index');
    // Route::post('/vendas', [VendasController::class, 'store'])->name('vendas.store');
    // Route::get('/vendas/{id}/edit', [VendasController::class, 'edit'])->name('vendas.edit');
    // Route::put('/vendas/{id}', [VendasController::class, 'update'])->name('vendas.update');
    // Route::post('/vendas/{id}/cancel', [VendasController::class, 'cancel'])->name('vendas.cancel');

    // Rotas relacionadas aos clientes
    Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{id}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{id}', [ClientesController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

    // Rotas relacionadas aos fornecedores
    Route::resource('fornecedores', FornecedoresController::class);
    Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('fornecedores.index');
    Route::post('/fornecedores', [FornecedoresController::class, 'store'])->name('fornecedores.store');
    Route::get('/fornecedores/{id}/edit', [FornecedoresController::class, 'edit'])->name('fornecedores.edit');
    Route::put('/fornecedores/{id}', [FornecedoresController::class, 'update'])->name('fornecedores.update');
    Route::delete('/fornecedores/{id}', [FornecedoresController::class, 'destroy'])->name('fornecedores.destroy'); 
    // Rotas relacionadas aos livros
    Route::get('/livros', [LivrosController::class, 'index'])->name('livros.index');
    Route::post('/livros', [LivrosController::class, 'store'])->name('livros.store');
    Route::get('/livros/{id}/edit', [LivrosController::class, 'edit'])->name('livros.edit');
    Route::put('/livros/{id}', [LivrosController::class, 'update'])->name('livros.update');
    Route::delete('/livros/{id}', [LivrosController::class, 'destroy'])->name('livros.destroy'); 
});

require __DIR__.'/auth.php';
