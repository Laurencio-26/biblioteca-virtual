<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h3 class="mb-3">✏️ Editar Libro</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Corrige los siguientes errores:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('libros.update', $libro) }}" method="POST" enctype="multipart/form-data" class="bg-white p-3 shadow-sm rounded">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Título *</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $libro->titulo) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Autor *</label>
                <input type="text" name="autor" class="form-control" value="{{ old('autor', $libro->autor) }}" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Código *</label>
                <input type="text" name="codigo_libro" class="form-control" value="{{ old('codigo_libro', $libro->codigo_libro) }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Editorial</label>
                <input type="text" name="editorial" class="form-control" value="{{ old('editorial', $libro->editorial) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Año</label>
                <input type="number" name="anio" class="form-control" value="{{ old('anio', $libro->anio) }}" placeholder="YYYY" min="1900" max="{{ date('Y') }}">
            </div>

            <div class="col-md-6">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select name="categoria_id" id="categoria_id" class="form-select">
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ (old('categoria_id', $libro->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="area_id" class="form-label">Área</label>
                <select name="area_id" id="area_id" class="form-select">
                    <option value="">-- Selecciona un área --</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" {{ (old('area_id', $libro->area_id) == $area->id) ? 'selected' : '' }}>
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="estado" class="form-label">Estado *</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="disponible" {{ old('estado', $libro->estado) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="prestado" {{ old('estado', $libro->estado) == 'prestado' ? 'selected' : '' }}>Prestado</option>
                    <option value="dañado" {{ old('estado', $libro->estado) == 'dañado' ? 'selected' : '' }}>Dañado</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Ubicación</label>
                <input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion', $libro->ubicacion) }}">
            </div>

            <div class="col-12">
                <label class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control" rows="3">{{ old('observaciones', $libro->observaciones) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label d-block">PDF actual</label>
                @if ($libro->pdf)
                    <a href="{{ asset('storage/'.$libro->pdf) }}" target="_blank" class="btn btn-sm btn-outline-success mb-2">📄 Ver PDF</a>
                @else
                    <span class="badge bg-secondary mb-2">Sin PDF</span>
                @endif

                <label class="form-label d-block">Reemplazar PDF (opcional)</label>
                <input type="file" name="pdf" class="form-control" accept="application/pdf">
            </div>
        </div>

        <div class="mt-3 d-flex gap-2">
            <a href="{{ route('libros.index') }}" class="btn btn-secondary">⬅ Volver</a>
            <button class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>

</body>
</html>
