@extends('layouts.app')

@section('title', 'Acceso denegado')

@section('content')
<div class="container mt-5 text-center">
    <h1 class="display-4 text-danger">🚫 403</h1>
    <h2 class="mb-3">Acceso Denegado</h2>
    <p class="text-muted">
        Lo sentimos, no tienes permisos para acceder a esta sección.
    </p>

    <a href="{{ route('home') }}" class="btn btn-primary mt-3">🏠 Volver al inicio</a>
</div>
@endsection
