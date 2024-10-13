<?php
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('veiculos',VeiculosController::class);

Route::resource('categorias',CategoriasController::class);
Route::get('/categorias/edit/{id}', [CategoriasController::class, 'edit'])->name('categorias.edit');
Route::get('/categorias/show/{id}', [CategoriasController::class, 'show'])->name('categorias.show');
Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');


Route::view('inicial','inicial')
->name('inicial');

require __DIR__.'/auth.php';