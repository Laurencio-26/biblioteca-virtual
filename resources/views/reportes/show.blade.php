@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">👁️ Detalles del Reporte</h2>

    <div class="card">
        <div class="card-body">
            <h5><strong>Descripción:</strong></h5>
            <p>{{ $reporte->descripcion }}</p>

            <p><strong>Fecha de creación:</strong> {{ $reporte->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('reportes.index') }}" class="btn btn-secondary mt-3">↩️ Volver</a>
</div>
@endsection
