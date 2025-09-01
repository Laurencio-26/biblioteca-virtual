<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca Virtual G.U.E. Leoncio Prado</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
      body {
           background-color: #92caf0ff; /* Celeste claro */
      }
      .navbar {
          background-color: #006699;
      }
      .navbar a, .navbar-brand {
          color: white !important;
          font-weight: bold;
      }
      footer {
          background: #006699;
          color:white;
      }
  </style>
</head>
<body>
  {{-- NAV --}}
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">📚 Biblioteca Virtual G.U.E. Leoncio Prado</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="topNav" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('libros.*') ? 'active' : '' }}" href="{{ route('libros.index') }}">Libros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('prestamos.*') ? 'active' : '' }}" href="{{ route('prestamos.index') }}">Préstamos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('areas.*') ? 'active' : '' }}" href="{{ route('areas.index') }}">Áreas Temáticas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}" href="{{ route('reportes.index') }}">Reportes y Búsquedas</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  {{-- CONTENIDO DE CADA SUBVENTANA --}}
  <main class="container py-4">
    @yield('content')
  </main>

  <footer class="text-center py-3 mt-4">
      Biblioteca Virtual G.U.E. Leoncio Prado
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
