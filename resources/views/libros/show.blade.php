{{-- resources/views/libros/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalle del Libro')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">📘 {{ $libro->titulo }}</h3>

    <div class="bg-white p-4 shadow-sm rounded">
        <dl class="row">
            <dt class="col-sm-3">Autor</dt>
            <dd class="col-sm-9">{{ $libro->autor }}</dd>

            <dt class="col-sm-3">Código</dt>
            <dd class="col-sm-9">{{ $libro->codigo_libro }}</dd>

            <dt class="col-sm-3">Editorial</dt>
            <dd class="col-sm-9">{{ $libro->editorial ?? 'N/A' }}</dd>

            <dt class="col-sm-3">Año</dt>
            <dd class="col-sm-9">{{ $libro->anio ?? 'N/A' }}</dd>

            <dt class="col-sm-3">Grado</dt>
            <dd class="col-sm-9">{{ $libro->grado ?? 'N/A' }}</dd>

            <dt class="col-sm-3">Categoría</dt>
            <dd class="col-sm-9">{{ $libro->categoria->nombre ?? 'Sin categoría' }}</dd>

            <dt class="col-sm-3">Área</dt>
            <dd class="col-sm-9">{{ $libro->area->nombre ?? 'Sin área' }}</dd>

            <dt class="col-sm-3">Estado</dt>
            <dd class="col-sm-9">
                <span class="badge 
                    @if($libro->estado == 'disponible') bg-success 
                    @elseif($libro->estado == 'prestado') bg-warning text-dark 
                    @elseif($libro->estado == 'dañado') bg-danger 
                    @else bg-secondary @endif">
                    {{ ucfirst($libro->estado) }}
                </span>
            </dd>

            <dt class="col-sm-3">Ubicación</dt>
            <dd class="col-sm-9">{{ $libro->ubicacion ?? 'N/A' }}</dd>

            <dt class="col-sm-3">Observaciones</dt>
            <dd class="col-sm-9">{{ $libro->observaciones ?? 'N/A' }}</dd>
        </dl>
    </div>
</div>
@endsection
