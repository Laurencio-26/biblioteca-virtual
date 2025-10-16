@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Solicitudes de Préstamo</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('solicitudes.create') }}" class="btn btn-primary mb-3">Nueva Solicitud</a>
     <a href="{{ route('reporte.solicitudes') }}" class="btn btn-danger" target="_blank">Reporte PDF</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Libro</th>
                <th>Estado</th>
                <th>fecha de solicitud</th>
                <th>Observaciones</th>
                <th>Usuario</th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
                <tr>
                   <td>{{ $solicitud->nombre_libro }}</td>

                    <td>
                        <span class="badge 
                            {{ $solicitud->estado == 'pendiente' ? 'bg-warning' : ($solicitud->estado == 'aprobado' ? 'bg-success' : 'bg-danger') }}">
                            {{ ucfirst($solicitud->estado) }}
                        </span>
                    </td>

                     {{-- Aquí llamamos bien la fecha --}}
                    <td>{{ $solicitud->fecha_solicitud ?? '-' }}</td>

                    <td>{{ $solicitud->observaciones ?? '-' }}</td>

                    <td>{{ $solicitud->user->name }}</td>
                    <td>
                        <a href="{{ route('solicitudes.show', $solicitud) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('solicitudes.destroy', $solicitud) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar solicitud?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
