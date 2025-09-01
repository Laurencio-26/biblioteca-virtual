@extends('layouts.app')

@section('title', 'Categorías de Libros')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">📚 Categorías de Libros</h2>

    <div class="row justify-content-center">
        @foreach ($categorias as $categoria)
            <div class="col-md-4 col-sm-6 mb-4">
                <a href="{{ route('categorias.libros', $categoria->id) }}" class="text-decoration-none">
                    <div class="card shadow-lg border-0 h-100 text-center bg-light hover-zoom">
                        <div class="card-body d-flex align-items-center justify-content-center" style="height: 100px;">
                            <h4 class="text-primary m-0">{{ $categoria->nombre }}</h4>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<style>
    .hover-zoom:hover {
        transform: scale(1.05);
        transition: 0.3s ease-in-out;
    }
</style>
@endsection
