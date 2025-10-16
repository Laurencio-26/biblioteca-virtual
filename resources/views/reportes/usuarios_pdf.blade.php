<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Usuarios</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #7db7dfff;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>BIBLIOTECA VIRTUAL G.U.E. LEONCIO PRADO</h2>
        <p><strong>Reporte de Usuarios Registrados</strong></p>
        <p>Fecha de generación: {{ date('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $index => $usuario)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role ?? 'Estudiante' }}</td>
                    <td>{{ $usuario->created_at ? $usuario->created_at->format('d/m/Y') : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
