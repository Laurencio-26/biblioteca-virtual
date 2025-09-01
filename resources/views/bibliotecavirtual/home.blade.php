<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #8ac8f5ff; /* Celeste claro */
        }
        .search-bar input {
            border-radius: 20px;
            padding: 10px 20px;
        }
        .institution-images img {
            max-height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <!-- 🔹 Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}"> 
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" width="50" class="me-2">
                📚 BIBLIOTECA VIRTUAL G.U.E. LEONCIO PRADO
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('libros.index') }}">Libros</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('prestamos.index') }}">Préstamos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categorias.index') }}">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('reportes.index') }}">Reportes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 🔹 Contenido principal -->
    <div class="container py-5 text-center">
        <!-- Logo + Título + Frase -->
        <div class="mb-4">
            <h1 class="fw-bold text-primary">
                Bienvenido a la Biblioteca Virtual <br> Gran Unidad Escolar Leoncio Prado
            </h1>
            <p class="text-muted">
                "El libro es fuerza, es valor, es poder, es alimento; antorcha del pensamiento, y manantial del amor."
            </p>
        </div>

        <!-- Barra de búsqueda -->
        <div class="search-bar mb-5">
            <form action="{{ route('buscar') }}" method="GET" class="d-flex justify-content-center">
                <input type="text" name="query" class="form-control w-50 shadow-sm" placeholder="🔍 Buscar libros, autores, categorías...">
                <button class="btn btn-primary ms-2">Buscar</button>
            </form>
        </div>

        <!-- Tres imágenes relacionadas a la institución -->
        <div class="row g-4 institution-images mb-5">
            <div class="col-md-4">
                <img src="{{ asset('images/estudiantes.jpg') }}" class="img-fluid rounded shadow" alt="Imagen 1">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/colegio.jpg') }}" class="img-fluid rounded shadow" alt="Imagen 2">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/niños.jpg') }}" class="img-fluid rounded shadow" alt="Imagen 3">
            </div>
        </div>

        <!-- 🔹 Secciones principales -->
        <div class="row g-4">
            <div class="col-md-4">
                <a href="{{ route('libros.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">📖 Libros</h5>
                            <p class="card-text">Consulta, registra y organiza los libros disponibles en la biblioteca.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('prestamos.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">📑 Préstamos</h5>
                            <p class="card-text">Administra los préstamos de libros y su historial fácilmente.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('categorias.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">📂 Categorías</h5>
                            <p class="card-text">Organiza los libros según sus categorías o materias.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- 🔹 Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; {{ date('Y') }} Biblioteca Virtual G.U.E. Leoncio Prado</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
