<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Biblioteca Virtual</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #8ac8f5; /* Celeste claro */
        }

        /* Estilos del botón de ver contraseña */
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #555;
            transition: color 0.3s;
        }

        .toggle-password:hover {
            color: #007bff; /* Azul al pasar el mouse */
        }
    </style>
</head>
<body class="font-sans antialiased">

    <div class="min-h-screen flex flex-col justify-center items-center relative">
        
        <!-- Botón Registrarse arriba a la derecha -->
        <div class="absolute top-4 right-4">
            <a href="{{ route('register') }}" 
               class="px-4 py-2 bg-blue-600 text-white font-bold rounded hover:bg-blue-700 shadow">
                Registrarse
            </a>
        </div>

        <!-- Logo y Título -->
        <div class="mb-6 text-center">
            <img src="{{ asset('images/logoinicio.jpeg') }}" alt="Logo Colegio" class="w-24 h-24 mx-auto mb-3">
            <h1 class="text-2xl font-bold text-gray-800">
                BIBLIOTECA VIRTUAL <br> G.U.E. LEONCIO PRADO
            </h1>
        </div>

        <!-- Contenedor del Login -->
        <div class="w-full sm:max-w-md px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <!-- Password con botón Ver/Ocultar -->
                <div class="mt-4" style="position: relative;">
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input id="password" type="password" name="password" required 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 pr-10">
                    
                    <!-- Botón 👁 -->
                    <button type="button" id="togglePassword" class="toggle-password" title="Mostrar/Ocultar contraseña">
                        👁️
                    </button>
                </div>

                <!-- Recordarme -->
                <div class="mt-4 flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Recordarme</label>
                </div>

                <!-- Botón de login -->
                <div class="mt-4">
                    <button type="submit" class="w-full bg-black text-white px-4 py-2 rounded hover:bg-gray-800">
                        Ingresar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para mostrar/ocultar contraseña -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            this.textContent = isPassword ? '🙈' : '👁️';
        });
    </script>

</body>
</html>
