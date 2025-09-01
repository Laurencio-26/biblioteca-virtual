@extends('layouts.app')

@section('title', 'Editar Préstamo')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-warning">✏️ Editar Préstamo</h2>

    {{-- Mostrar errores de validación --}}
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

    {{-- Formulario para editar préstamo --}}
    <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre_usuario" class="form-label">👤 Nombre del Usuario</label>
                <input type="text" name="nombre_usuario" id="nombre_usuario" 
                       class="form-control" 
                       value="{{ old('nombre_usuario', $prestamo->usuario->name) }}" required>
            </div>

            <div class="col-md-6">
                <label for="titulo_libro" class="form-label">📖 Título del Libro</label>
                <input type="text" name="titulo_libro" id="titulo_libro" 
                       class="form-control" 
                       value="{{ old('titulo_libro', $prestamo->libro->titulo) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_prestamo" class="form-label">📅 Fecha de Préstamo</label>
                <input type="date" name="fecha_prestamo" id="fecha_prestamo" 
                       class="form-control" 
                       value="{{ old('fecha_prestamo', $prestamo->fecha_prestamo) }}" required>
            </div>

            <div class="col-md-6">
                <label for="fecha_devolucion" class="form-label">📆 Fecha de Devolución</label>
                <input type="date" name="fecha_devolucion" id="fecha_devolucion" 
                       class="form-control" 
                       value="{{ old('fecha_devolucion', $prestamo->fecha_devolucion) }}" required>
            </div>
        </div>


        <div class="mb-3">
    <label for="institucion" class="form-label">🏫 Institución</label>
    <input type="text" class="form-control" id="institucion" name="institucion"
           value="{{ old('institucion', $prestamo->institucion ?? '') }}" placeholder="Ej: Universidad Nacional">
</div>


        {{-- Campos adicionales: grado, sección, turno --}}
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="grado" class="form-label">🎓 Grado</label>
                <select name="grado" id="grado" class="form-select" required>
                    <option value="" disabled>Seleccione un grado</option>
                    <option value="1ro" {{ old('grado', $prestamo->grado) == '1ro' ? 'selected' : '' }}>1° de Secundaria</option>
                    <option value="2do" {{ old('grado', $prestamo->grado) == '2do' ? 'selected' : '' }}>2° de Secundaria</option>
                    <option value="3ro" {{ old('grado', $prestamo->grado) == '3ro' ? 'selected' : '' }}>3° de Secundaria</option>
                    <option value="4to" {{ old('grado', $prestamo->grado) == '4to' ? 'selected' : '' }}>4° de Secundaria</option>
                    <option value="5to" {{ old('grado', $prestamo->grado) == '5to' ? 'selected' : '' }}>5° de Secundaria</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="seccion" class="form-label">🏫 Sección</label>
                <input type="text" name="seccion" id="seccion" 
                       class="form-control" 
                       placeholder="Ej: A, B, C..." 
                       value="{{ old('seccion', $prestamo->seccion) }}" required>
            </div>

            <div class="col-md-4">
                <label for="turno" class="form-label">⏰ Turno</label>
                <select name="turno" id="turno" class="form-select" required>
                    <option value="" disabled>Seleccione un turno</option>
                    <option value="Mañana" {{ old('turno', $prestamo->turno) == 'Mañana' ? 'selected' : '' }}>Mañana</option>
                    <option value="Tarde" {{ old('turno', $prestamo->turno) == 'Tarde' ? 'selected' : '' }}>Tarde</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-start mt-4">
            <button type="submit" class="btn btn-primary me-2">💾 Guardar Cambios</button>
            <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">↩️ Cancelar</a>
        </div>
    </form>
</div>
@endsection
