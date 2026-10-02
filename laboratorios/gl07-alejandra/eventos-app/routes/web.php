<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\CategoriaController;

// Definición de las rutas del CRUD de eventos
Route::resource('eventos', EventoController::class);
Route::resource('categorias', CategoriaController::class);

// O si quieres que la raíz cargue los eventos por defecto:
Route::get('/', [EventoController::class, 'index']);