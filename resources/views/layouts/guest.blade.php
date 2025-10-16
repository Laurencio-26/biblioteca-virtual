<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Biblioteca Virtual G.U.E. Leoncio Prado') }}</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap (opcional si lo usas en todo el sistema) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts de Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-light">
    <div class="min-h-screen d-flex flex-column justify-content-center align-items-center py-5 bg-light">
        
        <!-- Encabezado -->
        <div class="mb-4 text-center">
            <h1 class="fw-bold text-primary">
                📘 Biblioteca Virtual <br> G.U.E. Leoncio Prado
            </h1>
        </div>

        <!-- Contenedor del formulario -->
        <div class="w-100" style="max-width: 420px;">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
