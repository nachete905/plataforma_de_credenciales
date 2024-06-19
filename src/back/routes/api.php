<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CredencialesController;


Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
Route::post('/loginUsuario', [UsuarioController::class, 'store']);


Route::delete('deleteUsuario/{id}', [UsuarioController::class, 'destroy']);
Route::resource('usuarios', UsuarioController::class);
Route::resource('credenciales', CredencialesController::class);
