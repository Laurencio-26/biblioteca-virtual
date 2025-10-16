<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteSolicitudesController extends Controller
{
    public function generarPDF()
    {
       
        $solicitudes = Solicitud::all();

        $pdf = Pdf::loadView('reportes.solicitudes_pdf', compact('solicitudes'));

        return $pdf->download('reporte_solicitudes.pdf');
    }
}
