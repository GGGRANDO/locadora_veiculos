<?php

use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AcessoriosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Veiculo;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/veiculo/{id}', function ($id) {
    // Recupera o veículo pelo id
    $veiculo = Veiculo::findOrFail($id);

    // Retorna a view 'veiculo.show' com os dados do veículo
    return view('veiculo.show', compact('veiculo'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('veiculos', VeiculosController::class);
Route::resource('categorias', CategoriasController::class);
Route::resource('acessorios', AcessoriosController::class);

Route::view('inicial', 'inicial')->name('inicial');
Route::get('/locacao', function () {
    $veiculos = DB::table('veiculos')
                  ->where('ativo', 'S')
                  ->where('locacao', 'S')
                  ->get();

    return view('locacao', ['veiculos' => $veiculos]);
});
require __DIR__.'/auth.php';
Route::get('/seminovos', function () {
    $veiculos = DB::table('veiculos')
                  ->where('ativo', 'S')
                  ->where('seminovo', 'S')
                  ->get(); 

    return view('seminovos', ['veiculos' => $veiculos]);
});
require __DIR__.'/auth.php';