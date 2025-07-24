@extends('layouts.app')

@section('title', 'Nuevo Préstamo')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Registrar nuevo préstamo</h2>

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

    <form action="{{ route('prestamos.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
        @csrf

        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Nombre del Usuario:</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" placeholder="Ej: Milagros Moreno" required>
        </div>

        <div class="mb-3">
            <label for="titulo_libro" class="form-label">Título del Libro:</label>
            <input type="text" name="titulo_libro" id="titulo_libro" class="form-control" placeholder="Ej: Romeo y Julieta" required>
        </div>

        <div class="mb-3">
            <label for="fecha_prestamo" class="form-label">Fecha de Préstamo:</label>
            <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_devolucion" class="form-label">Fecha de Devolución:</label>
            <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">📚 Guardar Préstamo</button>
        <a href="{{ route('prestamos.index') }}" class="btn btn-secondary ms-2">⬅️ Volver al listado</a>
    </form>
</div>
@endsection
