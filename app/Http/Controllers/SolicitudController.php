<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    public function index()
    {
        // 📌 Si el usuario es alumno, solo ve sus solicitudes
        // Si es bibliotecaria, ve todas
        $solicitudes = Auth::user()->role === 'bibliotecaria'
            ? Solicitud::with(['user', 'libro'])->latest()->get()
            : Solicitud::with('libro')->where('user_id', Auth::id())->latest()->get();

        return view('solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        $libros = Libro::all();
        return view('solicitudes.create', compact('libros'));
    }

    public function store(Request $request)
    {
       Solicitud::create([
    'user_id' => Auth::id(),
    'nombre_libro' => $request->nombre_libro,
    'estado' => 'pendiente',
    'fecha_solicitud' => now(), 
]);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud enviada correctamente.');
    }

    public function show(Solicitud $solicitud)
    {
        return view('solicitudes.show', compact('solicitud'));
    }

    public function edit(Solicitud $solicitud)
    {
        $libros = Libro::all();
        return view('solicitudes.edit', compact('solicitud', 'libros'));
    }

    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,aprobado,rechazado',
            'observaciones' => 'nullable|string',
        ]);

        $solicitud->update($request->only('estado', 'observaciones'));

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada.');
    }

    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada.');
    }
}
