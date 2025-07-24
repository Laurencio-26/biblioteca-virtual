<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::with('categoria')->get();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('libros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_libro'   => 'required|unique:libros,codigo_libro',
            'titulo'         => 'required',
            'autor'          => 'required',
            'estado'         => 'required|in:disponible,prestado,dañado',
            'editorial'      => 'nullable|string|max:255',
            'categoria_id'   => 'nullable|exists:categorias,id',
            'ubicacion'      => 'nullable|string|max:255',
            'observaciones'  => 'nullable|string|max:1000',
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')->with('success', '📘 Libro agregado correctamente.');
    }

    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        $categorias = Categoria::all();
        return view('libros.edit', compact('libro', 'categorias'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'codigo_libro'   => 'required|unique:libros,codigo_libro,' . $libro->id,
            'titulo'         => 'required',
            'autor'          => 'required',
            'estado'         => 'required|in:disponible,prestado,dañado',
            'editorial'      => 'nullable|string|max:255',
            'categoria_id'   => 'nullable|exists:categorias,id',
            'ubicacion'      => 'nullable|string|max:255',
            'observaciones'  => 'nullable|string|max:1000',
        ]);

        $libro->update($request->all());

        return redirect()->route('libros.index')->with('success', '✅ Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('success', '🗑️ Libro eliminado correctamente.');
    }
}
