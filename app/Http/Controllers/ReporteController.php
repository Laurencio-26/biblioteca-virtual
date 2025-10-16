<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::latest()->paginate(10);
        return view('reportes.index', compact('reportes'));
    }

    public function create()
    {
        return view('reportes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'tipo'        => 'required|string',
            'tabla'       => 'required|string',
            'descripcion' => 'nullable|string',
            'fecha_inicio'  => 'nullable|date', 
            'fecha_fin'     => 'nullable|date|after_or_equal:fecha_inicio',
            'parametros'    => 'nullable|json', 
        ]);

        Reporte::create($data);

        return redirect()->route('reportes.index')->with('success', 'Reporte creado correctamente.');
    }

    public function show($id)
    {
        $reporte = Reporte::findOrFail($id);
        return view('reportes.show', compact('reporte'));
    }

    public function edit($id)
    {
        $reporte = Reporte::findOrFail($id);
        return view('reportes.edit', compact('reporte'));
    }

    public function update(Request $request, $id)
    {
        $reporte = Reporte::findOrFail($id);

        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'tipo'        => 'required|string',
            'tabla'       => 'required|string',
            'descripcion' => 'nullable|string',
            'fecha_inicio'  => 'nullable|date', 
            'fecha_fin'     => 'nullable|date|after_or_equal:fecha_inicio',
            'parametros'    => 'nullable|json',
        ]);

        $reporte->update($data);

        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado correctamente.');
    }

    public function destroy($id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->delete();

        return redirect()->route('reportes.index')->with('success', 'Reporte eliminado correctamente.');
    }
    public function exportarPDF()
    {
        $reportes = Reporte::all();
        $pdf = Pdf::loadView('reportes.pdf', compact('reportes'));
        return $pdf->download('reportes_general.pdf');
    }
}
