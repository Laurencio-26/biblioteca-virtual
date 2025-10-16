@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📚 Áreas de Libros</h2>
    <a href="{{ route('libros.create') }}" class="btn btn-success">➕ Agregar Libro</a>
</a>

</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach($areas as $area)
            <div class="col">
                <div class="card h-100 shadow text-center">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title">{{ $area->nombre }}</h5>
                        <p class="card-text">📚 {{ $area->libros->count() }} libros</p>
                        <a href="{{ route('libros.porArea', $area->id) }}" class="btn btn-primary mt-auto">
                            Ver Libros
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
