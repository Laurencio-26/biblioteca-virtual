@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">➕ Crear Nuevo Reporte Manual</h2>

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

    <form action="{{ route('reportes.store') }}" method="POST">
        @csrf
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Reporte (*)</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                           value="{{ old('nombre') }}" required>
                    @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo (*)</label>
                    <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" required>
                        {{-- Dado que es un reporte manual, fijamos la opción principal --}}
                        <option value="Manual" {{ old('tipo', 'Manual') == 'Manual' ? 'selected' : '' }}>Manual</option>
                        {{-- Puedes agregar otros tipos aquí si los necesitarás en el futuro --}}
                    </select>
                    @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="tabla" class="form-label">Tabla Origen (*)</label>
                    <input type="text" name="tabla" id="tabla" class="form-control @error('tabla') is-invalid @enderror" 
                           value="{{ old('tabla', 'Manual') }}" required>
                    <small class="text-muted">Indica la tabla de la que se deriva (ej: 'prestamos', 'Manual').</small>
                    @error('tabla') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio (Opcional)</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" 
                           value="{{ old('fecha_inicio') }}">
                    @error('fecha_inicio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha de Fin (Opcional)</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror" 
                           value="{{ old('fecha_fin') }}">
                    @error('fecha_fin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="parametros" class="form-label">Parámetros (JSON Opcional)</label>
                    <textarea name="parametros" id="parametros" rows="2" class="form-control @error('parametros') is-invalid @enderror">{{ old('parametros') }}</textarea>
                    <small class="text-muted">Ej: {"status": "cerrado"}</small>
                    @error('parametros') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción / Contenido (Opcional)</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion') }}</textarea>
            @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">💾 Guardar Reporte</button>
        <a href="{{ route('reportes.index') }}" class="btn btn-secondary">↩️ Volver</a>
    </form>
</div>
@endsection