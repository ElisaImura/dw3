<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body {
            font-family: 'Arial', sans-serif;
            margin: 0; /* Evita márgenes predeterminados en el cuerpo del documento */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px; /* Reduce el margen superior */
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 4px; /* Reduce el espacio interno de las celdas */
            text-align: left;
            font-size: 14px; /* Disminuye el tamaño de la fuente en la tabla */
        }

        th {
            background-color: #007bff;
            color: #fff;
            text-align: center; /* Centra el texto en las celdas del encabezado */
        }

        .Activo {
            color: #007bff; /* Cambia el color del texto a azul en estado activo */
        }

        .Inactivo {
            color: #960c0c; /* Cambia el color del texto a naranja en estado inactivo */
        }

        .card {
            margin-top: 5px; /* Reduce el margen superior */
        }

        h1 {
            text-align: center; /* Centra el texto del encabezado principal */
            margin-top: 20px; /* Ajusta el margen superior del encabezado principal */
        }
    </style>



    <title>Listado de Clientes</title>
</head>

<body>
    <header class="p-3 fixed-top bg-light">
        <div class="container">
            <h1 class="text-center mt-2">Listado de Clientes</h1>
        </div>
    </header>

    <div class="container p-4">
        @if ($clientes->isEmpty())
        <div class="card">
            <div class="card-body">
                <p class="card-text text-center">No se encontraron resultados para la búsqueda.</p>
            </div>
        </div>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>CI</th>
                    <th>Correo</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Estado</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    {{-- <td>{{ $cliente->id ?? 'NN'}}</td> --}}
                    <td>{{ $cliente->nombre ?? 'NN' }}</td>
                    <td>{{ $cliente->apellido ?? 'NN' }}</td>
                    <td>{{ $cliente->edad ?? 'NN'}}</td>
                    <td>{{ $cliente->ci ?? 'NN'}}</td>
                    <td>{{ $cliente->correo ?? 'NN' }}</td>
                    <td>{{ $cliente->fecha_nac ?? 'NN'}}</td>
                    <td>
                        @if ($cliente->estado == 'Activo')
                        <span class="Activo">{{$cliente->estado}}</span>
                        @elseif ($cliente->estado == 'activo')
                        <span class="Activo">{{$cliente->estado}}</span>
                        @else
                        <span class="Inactivo">{{$cliente->estado}}</span>
                        @endif
                    </td>
                    <td><strong>Nombre: </strong>{{ $cliente->cargo->nombre}} <br>
                        <strong>Sector: </strong>{{ $cliente->cargo->sector}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</body>

</html>