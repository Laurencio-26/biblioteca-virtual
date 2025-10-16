<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\User;
use App\Models\Prestamo;
use App\Models\Categoria;
use App\Models\Solicitud;
use App\Models\Reporte;

class SearchController extends Controller
{
    public function buscar(Request $request)
    {
        $q = trim($request->input('q'));

        if (!$q) {
            // Si no se ingresó nada, devolvemos la vista sin resultados
            return view('resultados', [
                'q' => '',
                'libros' => collect(),
                'usuarios' => collect(),
                'prestamos' => collect(),
                'categorias' => collect(),
                'solicitudes' => collect(),
                'reportes' => collect(),
            ]);
        }

        // 🔍 Buscamos coincidencias en cada módulo
        $libros = Libro::where('codigo_libro', 'LIKE', "%{$q}%")
        ->orWhere('titulo', 'LIKE', "%{$q}%")
        ->orWhere('autor', 'LIKE', "%{$q}%")
        ->orWhere('nivel', 'LIKE', "%{$q}%")
        ->orWhere('area', 'LIKE', "%{$q}%")
        ->orWhere('editorial', 'LIKE', "%{$q}%")
        ->orWhere('anio', 'LIKE', "%{$q}%")
        ->orWhere('grado', 'LIKE', "%{$q}%")
        ->orWhere('ubicacion', 'LIKE', "%{$q}%")
        ->orWhere('estado', 'LIKE', "%{$q}%")
        ->orWhere('observaciones', 'LIKE', "%{$q}%")
        ->orWhere('pdf', 'LIKE', "%{$q}%")
        ->get();
        $usuarios = User::where('name', 'LIKE', "%{$q}%")
            ->orWhere('email', 'LIKE', "%{$q}%")
            ->get();

        $prestamos = Prestamo::where('estado', 'LIKE', "%{$q}%")
        ->orWhere('fecha_prestamo', 'LIKE', "%{$q}%")
        ->orWhere('fecha_devolucion', 'LIKE', "%{$q}%")
        ->orWhere('seccion', 'LIKE', "%{$q}%")
        ->orWhere('turno', 'LIKE', "%{$q}%")
        ->orWhere('institucion', 'LIKE', "%{$q}%")
        ->orWhere('grado', 'LIKE', "%{$q}%")
        ->orWhereHas('usuario', function ($query) use ($q) {
        $query->where('name', 'LIKE', "%{$q}%");
    })
    ->get();

        $categorias = Categoria::where('nombre_categoria', 'LIKE', "%{$q}%")
            ->orWhere('descripcion', 'LIKE', "%{$q}%")
            ->get();
        $solicitudes = Solicitud::where('estado', 'LIKE', "%$q%")
            ->orWhere('observaciones', 'LIKE', "%$q%")
            ->orWhere('fecha_solicitud', 'LIKE', "%$q%")
            ->orWhere('nombre_libro', 'LIKE', "%$q%")
            ->orWhereHas('user', function ($query) use ($q) {
        $query->where('name', 'LIKE', "%$q%");
    })
    ->get();
    
        $reportes = Reporte::where('nombre', 'LIKE', "%$q%")
           ->orWhere('tipo', 'LIKE', "%$q%")
           ->orWhere('tabla', 'LIKE', "%$q%")
           ->orWhere('descripcion', 'LIKE', "%$q%")
           ->orWhere('fecha_inicio', 'LIKE', "%$q%")
           ->orWhere('fecha_fin', 'LIKE', "%$q%")
           ->get();

        return view('busqueda.resultados', compact(
            'q', 'libros', 'usuarios', 'prestamos', 'categorias', 'solicitudes', 'reportes'
        ));
    }
}
