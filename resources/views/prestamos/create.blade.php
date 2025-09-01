@extends('layouts.app')

@section('title', 'Nuevo Préstamo')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary">➕ Registrar nuevo préstamo</h2>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hubo algunos problemas con los datos ingresados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario de registro de préstamo --}}
    <form action="{{ route('prestamos.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nombre_usuario" class="form-label">👤 Nombre del Usuario:</label>
                <input type="text" name="nombre_usuario" id="nombre_usuario" 
                       class="form-control" placeholder="Ej: Milagros Moreno" required>
            </div>
            <div class="col-md-6">
                <label for="titulo_libro" class="form-label">📖 Título del Libro:</label>
                <input type="text" name="titulo_libro" id="titulo_libro" 
                       class="form-control" placeholder="Ej: Romeo y Julieta" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha_prestamo" class="form-label">📅 Fecha de Préstamo:</label>
                <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="fecha_devolucion" class="form-label">📆 Fecha de Devolución:</label>
                <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
               <label for="institucion" class="form-label">🏫 Institución</label>
                <input type="text" class="form-control" id="institucion" name="institucion"
                value="{{ old('institucion', $prestamo->institucion ?? '') }}" placeholder="Ej: Universidad Nacional">
         </div>


        {{-- Campos adicionales: grado, sección y turno --}}
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="grado" class="form-label">🎓 Grado:</label>
                <select name="grado" id="grado" class="form-select" required>
                    <option value="" selected disabled>Seleccione un grado</option>
                    <option value="1ro">1° de Secundaria</option>
                    <option value="2do">2° de Secundaria</option>
                    <option value="3ro">3° de Secundaria</option>
                    <option value="4to">4° de Secundaria</option>
                    <option value="5to">5° de Secundaria</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="seccion" class="form-label">🏫 Sección:</label>
                <input type="text" name="seccion" id="seccion" 
                       class="form-control" placeholder="Ej: A, B, C..." required>
            </div>

            <div class="col-md-4">
                <label for="turno" class="form-label">⏰ Turno:</label>
                <select name="turno" id="turno" class="form-select" required>
                    <option value="" selected disabled>Seleccione un turno</option>
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-start mt-4">
            <button type="submit" class="btn btn-success">
                📚 Guardar Préstamo
            </button>
            <a href="{{ route('prestamos.index') }}" class="btn btn-secondary ms-2">
                ⬅️ Volver al listado
            </a>
        </div>
    </form>
</div>
@endsection
