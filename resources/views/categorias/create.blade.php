@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
<div class="bg-info-subtle py-4 min-vh-100">
    <div class="container">

        {{-- Encabezado con logo y título --}}
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 60px;" class="me-3">
            <h2 class="text-primary mb-0">BIBLIOTECA VIRTUAL G.U.E. LEONCIO PRADO</h2>
        </div>

        {{-- Título --}}
        <h4 class="mb-4">➕ Nueva Categoría</h4>

        {{-- Botón para volver --}}
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary mb-3">← Volver al listado</a>

        {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Hubo algunos problemas:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario --}}
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la categoría</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">💾 Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
