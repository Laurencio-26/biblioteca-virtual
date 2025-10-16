@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Editar Reporte: {{ $reporte->nombre }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            **Por favor, corrige los siguientes errores:**
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reportes.update', $reporte->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Reporte</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                           value="{{ old('nombre', $reporte->nombre) }}" required>
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                        {{-- Mantiene el valor actual o el valor anterior si falló --}}
                        <option value="Manual" {{ old('tipo', $reporte->tipo) == 'Manual' ? 'selected' : '' }}>Manual</option>
                    </select>
                    @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="tabla" class="form-label">Tabla Origen</label>
                    <input type="text" name="tabla" id="tabla" class="form-control @error('tabla') is-invalid @enderror" 
                    value="{{ old('tabla', $reporte->tabla) }}" required>
                    @error('tabla') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                    {{-- Usamos el formato 'Y-m-d' que esperan los input de tipo date --}}
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" 
                           value="{{ old('fecha_inicio', optional($reporte->fecha_inicio)->format('Y-m-d')) }}">
                    @error('fecha_inicio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror" 
                           value="{{ old('fecha_fin', optional($reporte->fecha_fin)->format('Y-m-d')) }}">
                    @error('fecha_fin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="parametros" class="form-label">Parámetros</label>
                    <textarea name="parametros" id="parametros" rows="2" class="form-control @error('parametros') is-invalid @enderror">{{ old('parametros', $reporte->parametros) }}</textarea>
                    @error('parametros') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion', $reporte->descripcion) }}</textarea>
            @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-warning">🔄 Actualizar Reporte</button>
        <a href="{{ route('reportes.index') }}" class="btn btn-secondary">↩️ Volver</a>
    </form>
</div>
@endsection