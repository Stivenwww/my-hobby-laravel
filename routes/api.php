<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiProductoController;
use App\Http\Controllers\ApiCategoriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Rutas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas con JWT
Route::middleware(['auth:api'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);

    // productos
    Route::apiResource('productos', ApiProductoController::class);

    // CRUD de categorías
    Route::get('categorias', [ApiCategoriaController::class, 'index']);
    Route::post('categorias', [ApiCategoriaController::class, 'store']);
    Route::get('categorias/{id}', [ApiCategoriaController::class, 'show']);
    Route::put('categorias/{id}', [ApiCategoriaController::class, 'update']);
    Route::delete('categorias/{id}', [ApiCategoriaController::class, 'destroy']);
});
