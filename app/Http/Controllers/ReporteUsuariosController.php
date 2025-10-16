<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteUsuariosController extends Controller
{
    public function exportarPDF()
    {
        $usuarios = User::all();

        // aquí corregimos la ruta de la vista
        $pdf = Pdf::loadView('reportes.usuarios_pdf', compact('usuarios'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('reporte_usuarios.pdf');
    }
}
