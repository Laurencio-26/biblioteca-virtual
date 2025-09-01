@extends('layouts.app')

@section('title', 'Libros de ' . $categoria->nombre)

@section('content')
<div class="bg-info-subtle py-4 min-vh-100">
    <div class="container">

        {{-- Encabezado con logo y título --}}
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 60px;" class="me-3">
            <h2 class="text-primary mb-0">BIBLIOTECA VIRTUAL G.U.E. LEONCIO PRADO</h2>
        </div>

        {{-- Título --}}
        <h4 class="mb-4">📚 Libros en la categoría: <strong>{{ $categoria->nombre }}</strong></h4>

        {{-- Botón para volver --}}
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary mb-3">← Volver al listado de categorías</a>

        {{-- Listado de libros --}}
        @if ($libros->isEmpty())
            <div class="alert alert-info">No hay libros registrados en esta categoría.</div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($libros as $libro)
                    <div class="col">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $libro->titulo }}</h5>
                                <p class="card-text"><strong>Autor:</strong> {{ $libro->autor }}</p>
                                <p class="card-text"><strong>Código:</strong> {{ $libro->codigo }}</p>
                                <p class="card-text"><strong>Ubicación:</strong> {{ $libro->ubicacion }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
@endsection
