<?php

use App\Http\Controllers\TiendaController;
use Illuminate\Support\Facades\Route;

// Catálogo (página principal)
Route::get('/', [TiendaController::class, 'index'])->name('tienda.index');

// Detalle de un producto (BONUS)
Route::get('/producto/{id}', [TiendaController::class, 'show'])->name('tienda.show');