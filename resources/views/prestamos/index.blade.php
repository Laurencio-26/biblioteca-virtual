@extends('layouts.app')

@section('title', 'Listado de Préstamos')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📚 Listado de Préstamos</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <a href="{{ route('prestamos.create') }}" class="btn btn-primary mb-3">
        ➕ Nuevo Préstamo
    </a>

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>👤 Usuario</th>
                    <th>📖 Libro</th>
                    <th>📅 Fecha de Préstamo</th>
                    <th>📆 Fecha de Devolución</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->id }}</td>
                        <td>{{ $prestamo->usuario->name ?? 'No encontrado' }}</td>
                        <td>{{ $prestamo->libro->titulo ?? 'No encontrado' }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>{{ $prestamo->fecha_devolucion }}</td>
                        <td class="text-center">
                            <a href="{{ route('prestamos.edit', $prestamo->id) }}" class="btn btn-sm btn-warning me-1">
                                ✏️ Editar
                            </a>
                            <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este préstamo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    🗑️ Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay préstamos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

