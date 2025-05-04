<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('bienvenida');
});

Route::get('/inicio', function () {
    return view('layout');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
Route::get('/jugadores/crear', [JugadorController::class, 'crear'])->name('jugadores.crear');
Route::post('/jugadores', [JugadorController::class, 'almacenar'])->name('jugadores.store');

Route::get('/categorias', [CategoriaController::class, 'index']) ->name('categorias.index');

Route::get('/productos',[ProductoController::class,'index']) ->name('productos.index');
Route::get('/productos/create', [ProductoController::class,'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class,'store'])->name('productos.store');




