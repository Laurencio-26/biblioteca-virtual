<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 👉 Tus controladores de la biblioteca
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ReportePrestamosController;
use App\Http\Controllers\ReporteSolicitudesController;
use App\Http\Controllers\ReporteUsuariosController;


// ✅ Página de inicio (protegida por login)
Route::get('/', function () {
    return view('bibliotecaVirtual.home');
})->middleware('auth')->name('home');

// 📚 Todas las rutas de la biblioteca estarán protegidas por login
Route::middleware(['auth'])->group(function () {
    // 📚 Préstamos
    Route::resource('prestamos', PrestamoController::class);
    Route::get('/reportes/prestamos/pdf', [ReportePrestamosController::class, 'exportarPDF'])->name('reportes.prestamos.pdf');

Route::get('/reporte/solicitudes/pdf', [ReporteSolicitudesController::class, 'generarPDF'])
    ->name('reporte.solicitudes');


Route::get('reportes/usuarios/pdf', [ReporteUsuariosController::class, 'exportarPDF'])
        ->name('reportes.usuarios.pdf');
      
Route::get('reportes/exportar-pdf', [ReporteController::class, 'exportarPDF'])
    ->name('reportes.exportarPDF');

    Route::middleware(['auth'])->group(function () {
   Route::resource('solicitudes', SolicitudController::class)->parameters([
    'solicitudes' => 'solicitud'
]);

});
    // 📖 Libros
    Route::get('/libros', [LibroController::class, 'areas'])->name('libros.areas');
    Route::get('/libros/area/{id}', [LibroController::class, 'porArea'])->name('libros.porArea');
    Route::resource('libros', LibroController::class);

    // 📂 Categorías
    Route::resource('categorias', CategoriaController::class);

    // 🔎 Búsqueda;
    Route::get('/buscar', [SearchController::class, 'buscar'])->name('buscar');

    // 👤 Usuarios
    Route::resource('usuarios', UserController::class);

    // 🧭 Áreas
    Route::get('/areas', function () {
        return view('bibliotecaVirtual.areas.index');
    })->name('areas.index');

    //📊Reporte crud principal 
    Route::resource('reportes', ReporteController::class);
});

/*
|--------------------------------------------------------------------------
| Rutas de Breeze (Autenticación)
|--------------------------------------------------------------------------
*/

// 🚪 Dashboard → redirige a home
Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👤 Perfil del usuario (ya autenticado)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 👇 Mantén esto, Breeze lo necesita
require __DIR__.'/auth.php';
