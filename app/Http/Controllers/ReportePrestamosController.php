<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportePrestamosController extends Controller
{
    public function exportarPDF()
    {
        $prestamos = Prestamo::with(['libro', 'usuario'])->get();

        $pdf = Pdf::loadView('reportes.prestamos_pdf', compact('prestamos'));
        return $pdf->download('reporte_prestamos.pdf');
    }
}
