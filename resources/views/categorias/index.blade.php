@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="mb-4">📚 Sección de Categorías</h2>

    {{-- Clasificación por Áreas --}}
    <div class="mb-5">
        <h4>Áreas</h4>
        <ul class="list-group">
            @foreach($areas as $area)
                <li class="list-group-item">
                    {{ $area->nombre }} - <small>{{ $area->descripcion }}</small>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Clasificación por Categorías/Temas --}}
    <div class="mb-5">
        <h4>Categorías / Temas</h4>
        <ul class="list-group">
            @foreach($categorias as $categoria)
                <li class="list-group-item">
                    {{ $categoria->nombre }} - <small>{{ $categoria->descripcion }}</small>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Autores --}}
    <div class="mb-5">
        <h4>Autores</h4>
        <ul class="list-group">
            @foreach($autores as $autor)
                <li class="list-group-item">
                    {{ $autor->autor }}
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Ingresos recientes --}}
    <div class="mb-5">
        <h4>Ingresos recientes</h4>
        <ul class="list-group">
            @foreach($recientes as $libro)
                <li class="list-group-item">
                    <strong>{{ $libro->titulo }}</strong> - {{ $libro->autor }}
                    <br>
                    <small>Registrado: {{ $libro->created_at->format('d/m/Y') }}</small>
                </li>
            @endforeach
        </ul>
    </div>

</div>
@endsection
