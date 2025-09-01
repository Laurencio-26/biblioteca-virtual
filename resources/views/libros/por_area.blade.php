@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📚 Libros del Área: {{ $area->nombre }}</h2>
    <a href="{{ route('libros.create') }}" class="btn btn-success">➕ Agregar Libro</a>
</div>

@php
    $grados = ['1°', '2°', '3°', '4°', '5°'];
@endphp

<div class="container">
    {{-- Sección por cada grado --}}
    @foreach($grados as $grado)
        @php
            $librosGrado = $area->libros->where('grado', $grado);
        @endphp

        @if($librosGrado->count())
            <h4 class="mt-4">📘 Grado {{ $grado }}</h4>
            <div class="row row-cols-1 row-cols-md-5 g-4">
                @foreach($librosGrado as $libro)
                    <div class="col">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $libro->titulo }}</h5>
                                <p class="card-text"><strong>Autor:</strong> {{ $libro->autor }}</p>
                                <div class="d-flex flex-wrap gap-2">
                                    @if($libro->pdf)
                                        <a href="{{ asset('storage/'.$libro->pdf) }}" target="_blank" class="btn btn-sm btn-primary">📖 Ver PDF</a>
                                        <a href="{{ asset('storage/'.$libro->pdf) }}" download class="btn btn-sm btn-success">⬇️ Descargar</a>
                                    @endif
                                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                                    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach

    {{-- Libros sin grado --}}
    @php
        $otrosLibros = $area->libros->whereNull('grado');
    @endphp

    @if($otrosLibros->count())
        <h4 class="mt-4">📗 Otros Libros</h4>
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach($otrosLibros as $libro)
                <div class="col">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $libro->titulo }}</h5>
                            <p class="card-text"><strong>Autor:</strong> {{ $libro->autor }}</p>
                            <div class="d-flex flex-wrap gap-2">
                                @if($libro->pdf)
                                    <a href="{{ asset('storage/'.$libro->pdf) }}" target="_blank" class="btn btn-sm btn-primary">📖 Ver PDF</a>
                                    <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-info btn-sm">👁️ Ver detalles</a>
                                    <a href="{{ asset('storage/'.$libro->pdf) }}" download class="btn btn-sm btn-success">⬇️ Descargar</a>
                                @endif
                                <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
