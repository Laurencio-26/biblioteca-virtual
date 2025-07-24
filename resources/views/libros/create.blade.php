{{-- resources/views/libros/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Registrar Nuevo Libro')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📚 Registrar Nuevo Libro</h2>

    <a href="{{ route('libros.index') }}" class="btn btn-secondary mb-3">← Volver al listado</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hubo algunos errores con los datos ingresados:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>📌 {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="codigo_libro" class="form-label">Código</label>
                <input type="text" name="codigo_libro" id="codigo_libro" class="form-control" required value="{{ old('codigo_libro') }}">
            </div>

            <div class="col-md-6">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required value="{{ old('titulo') }}">
            </div>

            <div class="col-md-6">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" name="autor" id="autor" class="form-control" required value="{{ old('autor') }}">
            </div>

            <div class="col-md-6">
                <label for="editorial" class="form-label">Editorial</label>
                <input type="text" name="editorial" id="editorial" class="form-control" value="{{ old('editorial') }}">
            </div>

            <div class="col-md-6">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select name="categoria_id" id="categoria_id" class="form-select">
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="disponible" {{ old('estado') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="prestado" {{ old('estado') == 'prestado' ? 'selected' : '' }}>Prestado</option>
                    <option value="dañado" {{ old('estado') == 'dañado' ? 'selected' : '' }}>Dañado</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="{{ old('ubicacion') }}">
            </div>

            <div class="col-md-6">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="form-control">{{ old('observaciones') }}</textarea>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">💾 Guardar Libro</button>
        </div>
    </form>
</div>
@endsection
