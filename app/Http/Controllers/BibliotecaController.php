<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Libro;

class BibliotecaController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        // Obtener todas las áreas con libros relacionados (que tengan PDF)
        $areas = Area::with(['libros' => function ($query) use ($buscar) {
            $query->whereNotNull('pdf'); // Solo libros con PDF

            if ($buscar) {
                $query->where('titulo', 'like', '%' . $buscar . '%');
            }
        }])->get();

        return view('biblioteca.index', compact('areas', 'buscar'));
    }
}
