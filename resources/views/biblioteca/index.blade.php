@extends('layouts.app') {{-- Asegúrate de tener una plantilla base con Bootstrap --}}

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">📚 Biblioteca Virtual - G.U.E. Leoncio Prado</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('libros.create') }}" class="btn btn-primary">
        ➕ Subir nuevo libro
    </a>
</div>
     {{-- 🔍 Barra de búsqueda --}}
    <form method="GET" action="{{ route('biblioteca.index') }}" class="mb-4">
        <input type="text" name="buscar" class="form-control" placeholder="Buscar libro por título o palabra clave..." value="{{ $buscar ?? '' }}">
    </form>

    {{-- 🔠 Mostrar los libros agrupados por área --}}
    @forelse($areas as $area)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">{{ $area->nombre }} ({{ $area->codigo }})</h5>
            </div>
            <div class="card-body">
                @if ($area->libros->count())
                    <div class="row">
                        @foreach ($area->libros as $libro)
                            <div class="col-md-4 mb-3">
                                <div class="border p-3 rounded h-100">
                                    <h6>{{ $libro->titulo }}</h6>
                                    @if ($libro->anio)
                                        <small class="text-muted">Año: {{ $libro->anio }}</small><br>
                                    @endif
                                    @if ($libro->grado)
                                        <small class="text-muted">Grado: {{ $libro->grado }}</small><br>
                                    @endif
                                    @if ($libro->pdf)
                                        <a href="{{ asset('storage/' . $libro->pdf) }}" class="btn btn-sm btn-success mt-2" download>
                                            📥 Descargar PDF
                                        </a>
                                    @else
                                        <span class="text-danger">Sin archivo</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No hay libros en esta área.</p>
                @endif
            </div>
        </div>
    @empty
        <p>No se encontraron áreas temáticas.</p>
    @endforelse
</div>
@endsection
