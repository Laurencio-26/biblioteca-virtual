@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📊 Reportes de la Biblioteca</h2>

    <div class="mb-3 d-flex justify-content-start">
        <a href="{{ route('reportes.create') }}" class="btn btn-success me-2">➕ Nuevo Reporte</a>
        <a href="{{ route('reportes.exportarPDF') }}" class="btn btn-danger">📄 Exportar PDF</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th> 
                <th>Nombre</th>
                <th>Tipo</th> 
                <th>Tabla Origen</th>
                <th>Descripción</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Parámetros</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reportes as $reporte)
                <tr>
                    {{-- 1. ID --}}
                    <td>{{ $reporte->id }}</td> 
                    
                    {{-- 2. Nombre --}}
                    <td>{{ $reporte->nombre }}</td>

                    {{-- 3. Tipo --}}
                    <td>{{ $reporte->tipo }}</td>

                    {{-- 4. Tabla --}}
                    <td>{{ $reporte->tabla }}</td>

                    {{-- 5. Descripción (Limitado) --}}
                    <td>{{ Str::limit($reporte->descripcion ?? 'N/A', 30, '...') }}</td>

                    {{-- 6. Fecha Inicio (formato d/m/Y sin usar Carbon) --}}
                    <td>
                        {{ $reporte->fecha_inicio ? date('d/m/Y', strtotime($reporte->fecha_inicio)) : 'N/A' }}
                    </td>

                    {{-- 7. Fecha Fin (formato d/m/Y sin usar Carbon) --}}
                    <td>
                        {{ $reporte->fecha_fin ? date('d/m/Y', strtotime($reporte->fecha_fin)) : 'N/A' }}
                    </td>
                    
                    {{-- 8. Parámetros (Limitado) --}}
                    <td>{{ Str::limit($reporte->parametros ?? 'N/A', 15) }}</td>

                    {{-- 9. Acciones --}}
                    <td>
                        <a href="{{ route('reportes.show', $reporte->id) }}" class="btn btn-info btn-sm">👁️ Ver</a>
                        <a href="{{ route('reportes.edit', $reporte->id) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                        <form action="{{ route('reportes.destroy', $reporte->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar este reporte?')">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    {{-- La fila vacía abarca todas las 9 columnas --}}
                    <td colspan="9" class="text-center">No hay reportes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    {{-- Paginación opcional --}}
    {{-- <div class="d-flex justify-content-center">
        {{ $reportes->links() }}
    </div> --}}
</div>
@endsection
