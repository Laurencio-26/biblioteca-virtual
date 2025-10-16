@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="mb-4 text-center text-primary">
        🔎 Resultados de búsqueda para: <span class="fw-bold">"{{$q}}"</span>
    </h2>

   <div class="row g-4">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white fw-bold">
                📚 Libros
            </div>
            <div class="card-body">
                @if($libros->isEmpty())
                    <p class="text-muted">No se encontraron libros.</p>
                @else
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                        @foreach($libros as $libro)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">{{ $libro->titulo }}</h5>
                                        <p class="card-text">
                                            <strong>Autor:</strong> {{ $libro->autor }} <br>
                                            <strong>Código:</strong> {{ $libro->codigo_libro ?? 'N/A' }} <br>
                                            <strong>Categoría:</strong> {{ $libro->categoria_id ?? 'Sin categoría' }} <br>
                                            <strong>Nivel:</strong> {{ $libro->nivel ?? 'N/A' }} <br>
                                            <strong>Área:</strong> {{ $libro->area_id ?? 'N/A' }} <br>
                                            <strong>Editorial:</strong> {{ $libro->editorial ?? 'N/A' }} <br>
                                            <strong>Año:</strong> {{ $libro->anio ?? 'N/A' }} <br>
                                            <strong>Grado:</strong> {{ $libro->grado ?? 'N/A' }} <br>
                                            <strong>Ubicación:</strong> {{ $libro->ubicacion ?? 'N/A' }} <br>
                                            <strong>Estado:</strong> {{ $libro->estado ?? 'N/A' }}
                                        </p>
                                        @if($libro->archivo_pdf)
                                            <a href="{{ asset('pdfs/' . $libro->archivo_pdf) }}" target="_blank" class="btn btn-sm btn-outline-info">Ver PDF</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
        {{-- Usuarios --}}
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white fw-bold">
                    👤 Usuarios
                </div>
                <div class="card-body">
                    @if($usuarios->isEmpty())
                        <p class="text-muted">No se encontraron usuarios.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach($usuarios as $usuario)
                                <li class="list-group-item">
                                    <strong>{{ $usuario->name }}</strong> - {{ $usuario->email }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

       {{-- Préstamos --}}
<div class="col-12">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning fw-bold">
            📄 Préstamos
        </div>
        <div class="card-body">
            @if($prestamos->isEmpty())
                <p class="text-muted">No se encontraron préstamos.</p>
            @else
                <ul class="list-group list-group-flush">
                    @foreach($prestamos as $prestamo)
                        <li class="list-group-item">
                            <p class="mb-1">
                                <strong>Libro:</strong> {{ $prestamo->libro->titulo ?? 'No disponible' }} <br>
                                <strong>Usuario:</strong> {{ $prestamo->usuario->name ?? 'Desconocido' }}
                            </p>
                            <small class="text-muted">
                                <strong>Estado:</strong> {{ $prestamo->estado }} |
                                <strong>Fecha Préstamo:</strong> {{ $prestamo->fecha_prestamo }} |
                                <strong>Fecha Devolución:</strong> {{ $prestamo->fecha_devolucion ?? 'N/A' }} <br>
                                <strong>Grado:</strong> {{ $prestamo->grado ?? 'N/A' }} |
                                <strong>Sección:</strong> {{ $prestamo->seccion ?? 'N/A' }} |
                                <strong>Turno:</strong> {{ $prestamo->turno ?? 'N/A' }} |
                                <strong>Institución:</strong> {{ $prestamo->institucion ?? 'N/A' }}
                            </small>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
        {{-- Categorías --}}
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-bold">
                    🏷️ Categorías
                </div>
                <div class="card-body">
                    @if($categorias->isEmpty())
                        <p class="text-muted">No se encontraron categorías.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach($categorias as $categoria)
                                <li class="list-group-item">{{ $categoria->nombre }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
{{-- Solicitudes --}}
<div class="col-12">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-secondary text-white fw-bold">
            📬 Solicitudes
        </div>
        <div class="card-body">
            @if($solicitudes->isEmpty())
                <p class="text-muted">No se encontraron solicitudes.</p>
            @else
                <ul class="list-group list-group-flush">
                    @foreach($solicitudes as $solicitud)
                        <li class="list-group-item">
                            <p class="mb-1">
                                <strong>Libro Solicitado:</strong> {{ $solicitud->nombre_libro ?? 'N/A' }} <br>
                                <strong>Usuario:</strong> {{ $solicitud->user->name ?? 'Desconocido' }}
                            </p>
                            <small class="text-muted">
                                <strong>Estado:</strong> {{ $solicitud->estado ?? 'Pendiente' }} |
                                <strong>Fecha Solicitud:</strong> {{ $solicitud->fecha_solicitud ?? 'N/A' }} <br>
                                <strong>Observaciones:</strong> {{ $solicitud->observaciones ?? 'Ninguna' }}
                            </small>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div> 
</div>

        {{-- Reportes --}}
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold">
                    📊 Reportes
                </div>
                <div class="card-body">
                    @if($reportes->isEmpty())
                        <p class="text-muted">No se encontraron reportes.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach($reportes as $reporte)
                                <li class="list-group-item">
                                    <strong>{{ $reporte->nombre }}</strong> - {{ $reporte->descripcion ?? 'Sin descripción' }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
