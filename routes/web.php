<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\UserController;

// ✅ Página de inicio (NOMBRE FIJO: home)
Route::get('/', function () {
    return view('bibliotecaVirtual.home');
})->name('home');

// 📚 Préstamos
Route::resource('prestamos', PrestamoController::class);

// 📖 Libros
Route::get('/libros', [LibroController::class, 'areas'])->name('libros.areas');
Route::get('/libros/area/{id}', [LibroController::class, 'porArea'])->name('libros.porArea');
Route::resource('libros', LibroController::class);

// 📂 Categorías
Route::resource('categorias', CategoriaController::class);

// 🔎 Búsqueda
Route::get('/buscar', [BusquedaController::class, 'index'])->name('buscar');

// 👤 Usuarios (ejemplo)
Route::resource('usuarios', UserController::class);
    
// 🧭 Áreas (ejemplo)
Route::get('/areas', function () {
    return view('bibliotecaVirtual.areas.index');
})->name('areas.index');

// 📊 Reportes (ejemplo)
Route::get('/reportes', function () {
    return view('bibliotecaVirtual.reportes.index');
})->name('reportes.index');
