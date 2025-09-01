@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Resultados de búsqueda para: "{{ $q }}"</h2>

    <h4>📚 Libros</h4>
    @if($libros->count())
        <ul>
            @foreach($libros as $libro)
                <li>{{ $libro->titulo }} - {{ $libro->autor }}</li>
            @endforeach
        </ul>
    @else
        <p>No se encontraron libros.</p>
    @endif

    <h4>👤 Usuarios</h4>
    @if($usuarios->count())
        <ul>
            @foreach($usuarios as $usuario)
                <li>{{ $usuario->name }} - {{ $usuario->email }}</li>
            @endforeach
        </ul>
    @else
        <p>No se encontraron usuarios.</p>
    @endif

    <h4>📄 Préstamos</h4>
    @if($prestamos->count())
        <ul>
            @foreach($prestamos as $prestamo)
                <li>{{ $prestamo->estado }} - {{ $prestamo->fecha_prestamo }}</li>
            @endforeach
        </ul>
    @else
        <p>No se encontraron préstamos.</p>
    @endif
</div>
@endsection
