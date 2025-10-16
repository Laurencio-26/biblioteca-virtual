<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte Solicitudes</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Reporte de Solicitudes</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Libro</th>
                <th>Estado</th>
                <th>Observaciones</th>
                <th>usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
                <tr>
                   <td>{{ $solicitud->id }}</td>
                    <td>{{ $solicitud->usuario->name ?? 'N/A' }}</td>
                    <td>{{ $solicitud->libro->titulo ?? 'N/A' }}</td>
                    <td>{{ $solicitud->created_at ? $solicitud->created_at->format('d/m/Y') : 'N/A' }}</td>
                    <td>{{ $solicitud->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>