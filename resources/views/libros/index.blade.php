{{-- resources/views/libros/index.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros - Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-4">
        {{-- Encabezado con logo y título --}}
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('logo.png') }}" alt="Logo" style="height: 50px;" class="me-2">
            <h2 class="mb-0">BIBLIOTECA VIRTUAL G.U.E. LEONCIO PRADO</h2>
        </div>

        {{-- Título y botón para agregar --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">📚 Listado de Libros</h4>
            <a href="{{ route('libros.create') }}" class="btn btn-primary">➕ Agregar Libro</a>
        </div>

        {{-- Mensaje de éxito --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabla de libros --}}
        <div class="table-responsive bg-white shadow rounded">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Código</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Ubicación</th>
                        <th>Observaciones</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($libros as $libro)
                        <tr>
                            <td>{{ $libro->codigo_libro }}</td>
                            <td>{{ $libro->titulo }}</td>
                            <td>{{ $libro->autor }}</td>
                            <td>{{ $libro->editorial }}</td>
                            <td>{{ $libro->categoria->nombre ?? 'Sin categoría' }}</td>
                            <td>
                                @switch($libro->estado)
                                    @case('disponible') <span class="badge bg-success">Disponible</span> @break
                                    @case('prestado') <span class="badge bg-warning text-dark">Prestado</span> @break
                                    @case('dañado') <span class="badge bg-danger">Dañado</span> @break
                                    @default <span class="badge bg-secondary">Desconocido</span>
                                @endswitch
                            </td>
                            <td>{{ $libro->ubicacion }}</td>
                            <td>{{ $libro->observaciones }}</td>
                            <td class="text-center">
                                <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-sm btn-info me-1">👁️ Ver</a>
                                <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-sm btn-warning me-1">✏️ Editar</a>
                                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este libro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">No hay libros registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
