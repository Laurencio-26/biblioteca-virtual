@extends('layouts.app')

@section('title', 'Detalles del Libro')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📖 Detalles del Libro</h2>

    <a href="{{ route('libros.index') }}" class="btn btn-secondary mb-4">← Volver al listado</a>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $libro->titulo }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Código:</strong> {{ $libro->codigo_libro }}</p>
            <p><strong>Autor:</strong> {{ $libro->autor }}</p>
            <p><strong>Editorial:</strong> {{ $libro->editorial ?? '—' }}</p>
            <p><strong>Categoría:</strong> {{ $libro->categoria->nombre ?? 'Sin categoría' }}</p>
            <p><strong>Estado:</strong> 
                @switch($libro->estado)
                    @case('disponible') <span class="badge bg-success">Disponible</span> @break
                    @case('prestado') <span class="badge bg-warning text-dark">Prestado</span> @break
                    @case('dañado') <span class="badge bg-danger">Dañado</span> @break
                    @default <span class="badge bg-secondary">Desconocido</span>
                @endswitch
            </p>
            <p><strong>Ubicación:</strong> {{ $libro->ubicacion ?? '—' }}</p>
            <p><strong>Observaciones:</strong><br>
                {{ $libro->observaciones ?? '—' }}
            </p>
        </div>
    </div>
</div>
@endsection
