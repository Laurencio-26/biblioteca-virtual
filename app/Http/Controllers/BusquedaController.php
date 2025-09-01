<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\User;
use App\Models\Prestamo;

class BusquedaController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        // Buscar en libros, usuarios y préstamos
        $libros = Libro::where('titulo', 'like', "%$q%")
            ->orWhere('autor', 'like', "%$q%")
            ->get();

        $usuarios = User::where('name', 'like', "%$q%")
            ->orWhere('email', 'like', "%$q%")
            ->get();

        $prestamos = Prestamo::where('estado', 'like', "%$q%")
            ->orWhere('fecha_prestamo', 'like', "%$q%")
            ->get();

        return view('busqueda.resultados', compact('q', 'libros', 'usuarios', 'prestamos'));
    }
}
