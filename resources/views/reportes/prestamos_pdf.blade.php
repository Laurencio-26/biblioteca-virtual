<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Préstamos</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Reporte de Préstamos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Libro</th>
                <th>Usuario</th>
                <th>Fecha Préstamo</th>
                <th>Fecha Devolución</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->id }}</td>
                    <td>{{ $prestamo->libro->titulo ?? 'N/A' }}</td>
                    <td>{{ $prestamo->usuario->name ?? 'N/A' }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->fecha_devolucion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
