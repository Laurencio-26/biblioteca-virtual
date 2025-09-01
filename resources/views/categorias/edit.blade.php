@extends('layouts.app')

@section('title', 'Editar Libro')

@section('content')
<div class="bg-info-subtle py-4 min-vh-100">
    <div class="container">

        {{-- Encabezado con logo y título --}}
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 60px;" class="me-3">
            <h2 class="text-primary mb-0">BIBLIOTECA VIRTUAL G.U.E. LEONCIO PRADO</h2>
        </div>

        <h4 class="mb-4">✏️ Editar Libro</h4>

        <a href="{{ route('libros.index') }}" class="btn btn-secondary mb-3">← Volver al listado</a>

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

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('libros.update', $libro) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $libro->titulo) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" name="autor" class="form-control" value="{{ old('autor', $libro->autor) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $libro->codigo) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="editorial" class="form-label">Editorial</label>
                        <input type="text" name="editorial" class="form-control" value="{{ old('editorial', $libro->editorial) }}">
                    </div>

                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select name="categoria_id" class="form-select" required>
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $categoria->id == old('categoria_id', $libro->categoria_id) ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado" class="form-select" required>
                            <option value="Disponible" {{ old('estado', $libro->estado) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="Prestado" {{ old('estado', $libro->estado) == 'Prestado' ? 'selected' : '' }}>Prestado</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicación</label>
                        <input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion', $libro->ubicacion) }}">
                    </div>

                    <div class="mb-3">
                        <label for="anio" class="form-label">Año</label>
                        <input type="number" name="anio" class="form-control" value="{{ old('anio', $libro->anio) }}">
                    </div>

                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea name="observaciones" class="form-control" rows="3">{{ old('observaciones', $libro->observaciones) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="archivo" class="form-label">Archivo PDF (opcional)</label>
                        <input type="file" name="archivo" class="form-control" accept="application/pdf">
                        @if ($libro->archivo)
                            <small class="text-muted">Archivo actual: <a href="{{ asset('storage/' . $libro->archivo) }}" target="_blank">Ver PDF</a></small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">💾 Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
