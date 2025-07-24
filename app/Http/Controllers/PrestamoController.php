<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\User;
use App\Models\Libro;
use Illuminate\Support\Str;

class PrestamoController extends Controller 
{
    public function index()
    {
        $prestamos = Prestamo::with(['usuario', 'libro'])->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        return view('prestamos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'titulo_libro' => 'required|string|max:255',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_prestamo',
        ]);

        $usuario = User::firstOrCreate(
            ['name' => $request->nombre_usuario],
            [
                'email' => strtolower(str_replace(' ', '.', $request->nombre_usuario)) . '@correo.com',
                'password' => bcrypt('password123')
            ]
        );

        $libro = Libro::where('titulo', $request->titulo_libro)->first();

        if (!$libro) {
            $libro = Libro::create([
                'titulo' => $request->titulo_libro,
                'autor' => 'Desconocido',
                'codigo_libro' => strtoupper(substr($request->titulo_libro, 0, 3)) . rand(100, 999),
                'editorial' => 'Desconocida',
                'nivel' => 'Secundaria',
                'anio' => now()->year,
                'ubicacion' => 'Estantería 1',
                'estado' => 'Disponible',
                'observaciones' => 'Añadido automáticamente',
                'categoria_id' => 1
            ]);
        }

        Prestamo::create([
            'usuario_id' => $usuario->id,
            'libro_id' => $libro->id,
            'fecha_prestamo' => $request->fecha_prestamo,
            'fecha_devolucion' => $request->fecha_devolucion,
        ]);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado correctamente.');
    }

    public function edit(string $id)
    {
        $prestamo = Prestamo::with(['usuario', 'libro'])->findOrFail($id);
        return view('prestamos.edit', compact('prestamo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'titulo_libro' => 'required|string|max:255',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_prestamo',
        ]);

        $prestamo = Prestamo::findOrFail($id);

        $usuario = User::firstOrCreate(
            ['name' => $request->nombre_usuario],
            [
                'email' => strtolower(str_replace(' ', '.', $request->nombre_usuario)) . '@correo.com',
                'password' => bcrypt('password123')
            ]
        );

        $libro = Libro::where('titulo', $request->titulo_libro)->first();

        if (!$libro) {
            $libro = Libro::create([
                'titulo' => $request->titulo_libro,
                'autor' => 'Desconocido',
                'codigo_libro' => strtoupper(substr($request->titulo_libro, 0, 3)) . rand(100, 999),
                'editorial' => 'Desconocida',
                'nivel' => 'Secundaria',
                'anio' => now()->year,
                'ubicacion' => 'Estantería 1',
                'estado' => 'Disponible',
                'observaciones' => 'Añadido automáticamente',
                'categoria_id' => 1
            ]);
        }

        $prestamo->update([
            'usuario_id' => $usuario->id,
            'libro_id' => $libro->id,
            'fecha_prestamo' => $request->fecha_prestamo,
            'fecha_devolucion' => $request->fecha_devolucion,
        ]);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente.');
    }
}
