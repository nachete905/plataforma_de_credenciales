<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CredencialesController;


Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
Route::get('/credenciales', [CredencialesController::class, 'index']);

Route::post('/loginUsuario', [UsuarioController::class, 'store']);
Route::post('/usuarioEmail/{email}', [UsuarioController::class, 'buscarEmail']);
Route::post('/loginCredencial', [CredencialesController::class, 'store']);

Route::put('/updateUsuario/{id}', [UsuarioController::class, 'update']);


Route::delete('deleteUsuario/{id}', [UsuarioController::class, 'destroy']);
Route::delete('deleteCredencial/{id}', [CredencialesController::class, 'destroy']);
Route::resource('usuarios', UsuarioController::class);
Route::resource('credenciales', CredencialesController::class);
