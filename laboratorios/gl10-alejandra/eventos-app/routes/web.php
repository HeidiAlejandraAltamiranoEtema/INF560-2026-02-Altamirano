<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;

// Raíz cargando los eventos por defecto
Route::get('/', [EventoController::class, 'index']);

// Rutas de autenticación (login / logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Eventos: crear, editar, actualizar y eliminar (VA PRIMERO para que /eventos/create no choque con /eventos/{evento})
Route::middleware('auth')->group(function () {
    Route::resource('eventos', EventoController::class)->except(['index', 'show']);
});

// Eventos: lectura pública (index y show)
Route::resource('eventos', EventoController::class)->only(['index', 'show']);

// Categorías y Panel Admin: solo usuarios autenticados que pasen el Gate 'administrar'
Route::middleware(['auth', 'can:administrar'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('categorias', CategoriaController::class);
});