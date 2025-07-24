@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">✏️ Editar Préstamo</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay algunos errores con los datos ingresados:<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nombre del Usuario --}}
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">👤 Nombre del Usuario</label>
            <input type="text" name="nombre_usuario" class="form-control" value="{{ old('nombre_usuario', $prestamo->usuario->name) }}" required>
        </div>

        {{-- Título del Libro --}}
        <div class="mb-3">
            <label for="titulo_libro" class="form-label">📖 Título del Libro</label>
            <input type="text" name="titulo_libro" class="form-control" value="{{ old('titulo_libro', $prestamo->libro->titulo) }}" required>
        </div>

        {{-- Fecha de Préstamo --}}
        <div class="mb-3">
            <label for="fecha_prestamo" class="form-label">📅 Fecha de Préstamo</label>
            <input type="date" name="fecha_prestamo" class="form-control" value="{{ old('fecha_prestamo', $prestamo->fecha_prestamo) }}" required>
        </div>

        {{-- Fecha de Devolución --}}
        <div class="mb-3">
            <label for="fecha_devolucion" class="form-label">📆 Fecha de Devolución</label>
            <input type="date" name="fecha_devolucion" class="form-control" value="{{ old('fecha_devolucion', $prestamo->fecha_devolucion) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">💾 Guardar Cambios</button>
        <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">↩️ Cancelar</a>
    </form>
</div>
@endsection
