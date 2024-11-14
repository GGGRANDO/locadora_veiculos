<?php

use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AcessoriosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (requere autenticação)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas de perfil (necessitam de autenticação)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas para os recursos (CRUD de Veículos, Categorias e Acessórios)
Route::resource('veiculos', VeiculosController::class);
Route::resource('categorias', CategoriasController::class);
Route::resource('acessorios', AcessoriosController::class);

// Rota estática
Route::view('inicial', 'inicial')->name('inicial');

// Autenticação
require __DIR__.'/auth.php';
