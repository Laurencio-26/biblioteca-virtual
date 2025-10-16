<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Area;
use App\Models\Libro;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        // Clasificación por áreas
        $areas = Area::orderBy('nombre', 'asc')->get();

        // Clasificación por categorías/temas
       $categorias = Categoria::orderBy('nombre_categoria', 'asc')->get();


        // Autores distintos
        $autores = Libro::select('autor')
            ->distinct()
            ->orderBy('autor', 'asc')
            ->get();

        // Ingresos recientes (últimos 10)
        $recientes = Libro::latest()->take(10)->get();

        return view('categorias.index', compact('areas', 'categorias', 'autores', 'recientes'));
    }
}
