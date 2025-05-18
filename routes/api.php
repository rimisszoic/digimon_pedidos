<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JwtAuthController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LineaPedidoController;
use App\Http\Controllers\ExportController;

Route::post('/login', [JwtAuthController::class, 'login']);
Route::post('/logout', [JwtAuthController::class, 'logout']);
Route::post('/refresh', [JwtAuthController::class, 'refresh']);
Route::post('/register', [JwtAuthController::class, 'register']);

Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/pedidos', [PedidoController::class, 'index']);
    Route::get('/pedidos/{id}', [PedidoController::class, 'show']);
    Route::post('/pedidos', [PedidoController::class, 'store']);
    Route::put('/pedidos/{id}', [PedidoController::class, 'update']);
    Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy']);

    Route::get('/usuarios', [UserController::class, 'index']);
    Route::post('/usuarios', [UserController::class, 'store']);
    Route::put('/usuarios/{user}', [UserController::class, 'update']);
    Route::delete('/usuarios/{user}', [UserController::class, 'destroy']);

    Route::post('/lineas', [LineaPedidoController::class, 'store']);
    Route::put('/lineas/{linea}', [LineaPedidoController::class, 'update']);
    Route::delete('/lineas/{linea}', [LineaPedidoController::class, 'destroy']);

    Route::get('/exportar/usuarios', [ExportController::class, 'exportarUsuarios']);
    Route::get('/exportar/pedidos', [ExportController::class, 'exportarPedidos']);
});

?>