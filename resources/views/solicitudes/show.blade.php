@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detalle de la Solicitud</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Alumno:</strong> {{ $solicitud->user->name }}</p>
            <p><strong>Libro:</strong> {{ $solicitud->nombre_libro }}</p>
            <p><strong>Fecha de Solicitud:</strong> {{ $solicitud->created_at->format('d/m/Y') }}</p>

            <p><strong>Estado:</strong> 
                <span class="badge bg-{{ $solicitud->estado == 'aprobado' ? 'success' : ($solicitud->estado == 'rechazado' ? 'danger' : 'warning') }}">
                    {{ ucfirst($solicitud->estado) }}
                </span>
            </p>
            <p><strong>Observaciones:</strong> {{ $solicitud->observaciones ?? 'Ninguna' }}</p>
        </div>
    </div>

    <a href="{{ route('solicitudes.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection
