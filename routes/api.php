<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CredencialesController;



Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarioID/{id}', [UsuarioController::class, 'show']);
// Definir la ruta para 'store'
Route::post('/loginUsuario', [UsuarioController::class, 'store']);

Route::resource('usuarios', UsuarioController::class);
Route::resource('credenciales', CredencialesController::class);
