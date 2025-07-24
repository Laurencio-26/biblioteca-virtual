<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\LibroController;

// ✅ Ruta raíz que redirige al listado de préstamos
Route::get('/', function () {
    return redirect()->route('prestamos.index');
});

// 📚 Rutas automáticas para préstamos
Route::resource('prestamos', PrestamoController::class);

// 📖 Rutas automáticas para libros
Route::resource('libros', LibroController::class);
