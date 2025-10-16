@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Nueva Solicitud de Préstamo</h2>

    <form action="{{ route('solicitudes.store') }}" method="POST">
        @csrf

        {{-- Libro solicitado --}}
<div class="mb-3">
    <label for="nombre_libro" class="form-label">Nombre del Libro</label>
    <input type="text" name="nombre_libro" id="nombre_libro" 
           class="form-control" placeholder="Escriba el nombre del libro" required>
</div>


        {{-- Fecha de solicitud --}}
        <div class="mb-3">
            <label for="fecha_solicitud" class="form-label">Fecha de Solicitud</label>
            <input type="date" name="fecha_solicitud" class="form-control" 
                   value="{{ old('fecha_solicitud', date('Y-m-d')) }}" required>
            @error('fecha_solicitud') <div class="text-danger">{{ $message }}</div> @enderror
        </div>


       {{-- Observaciones --}}
<div class="mb-3">
    <label for="observaciones" class="form-label">Observaciones</label>
    <textarea name="observaciones" id="observaciones" 
              class="form-control" rows="3" 
              placeholder="Este campo será llenado por el administrador" disabled></textarea>
</div>


        <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
        <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
