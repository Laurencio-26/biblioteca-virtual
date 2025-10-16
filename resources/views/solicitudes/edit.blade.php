@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Solicitud</h2>

    <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
        @csrf
        @method('PUT')

       {{-- Libro solicitado --}}
<div class="mb-3">
    <label for="libro_nombre" class="form-label">Libro</label>
    <input type="text" 
           name="libro_nombre" 
           id="libro_nombre" 
           class="form-control" 
           value="{{ old('libro_nombre', $solicitud->libro->titulo ?? '') }}" 
           placeholder="Escribe el nombre del libro" 
           required>
</div>

        {{--fecha de solicitud--}}
         <div class="mb-3">
            <label for="fecha_solicitud" class="form-label">Fecha de Solicitud</label>
            <input type="date" name="fecha_solicitud" class="form-control" 
                   value="{{ old('fecha_solicitud', date('Y-m-d')) }}" required>
            @error('fecha_solicitud') <div class="text-danger">{{ $message }}</div> @enderror
        </div>


        {{-- Estado de la solicitud --}}
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="pendiente" {{ $solicitud->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="aprobado" {{ $solicitud->estado == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="rechazado" {{ $solicitud->estado == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
            </select>
        </div>

        {{-- Observaciones --}}
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="form-control" rows="3">{{ $solicitud->observaciones }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
