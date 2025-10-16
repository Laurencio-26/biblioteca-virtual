<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte General de la Biblioteca</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 12px; 
        }
        
        .encabezado {
            text-align: center;
            margin-bottom: 20px;
        }

        .encabezado img,
        .encabezado h2 {
            display: inline-block;
            vertical-align: middle;
            margin: 0 10px;
        }
        
        .encabezado img {
            height: 60px;
            width: auto;
        }

        .encabezado h2 {
            margin: 0;
            font-size: 18px;
        }
        
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #6aade0ff; padding: 6px; text-align: left; }
        th { background-color: #94deebff; }
    </style>
</head>
<body>
    <div class="encabezado">
        <img src="{{ public_path('images/logo.jpg') }}" alt="Logo Colegio">
        <h2>Reporte General de la Biblioteca G.U.E. Leoncio Prado</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Tabla</th>
                <th>Descripción</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->nombre }}</td>
                    <td>{{ $r->tipo }}</td>
                    <td>{{ $r->tabla }}</td>
                    <td>{{ $r->descripcion }}</td>
                    <td>{{ $r->fecha_inicio }}</td>
                    <td>{{ $r->fecha_fin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>