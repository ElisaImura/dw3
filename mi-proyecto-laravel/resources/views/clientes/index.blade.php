<link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jsdelivr.js')}}"></script>
<script src="{{asset('js/jsdelivr_boot.js')}}"></script>

@include('clientes.menu')

<div class="container" id="todo" style="margin-top: 50px; margin-bottom: 50px;">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h1>Listado de Clientes</h1>

        <div>
            <a href="{{ route('ClienteNuevo') }}" class="btn btn-primary">Nuevo</a>
            <a href="{{ route('clientes.pdf') }}" class="btn btn-primary">Generar reporte</a>
        </div>
    </div>
    <div class="input-group mb-3">
        <form action="{{ route('Clientebuscar') }}"class="d-flex">
        <input name="buscar" class="form-control me-1" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-light" type="submit">Buscar</button>
      </form>
    </div>

    @php
    $vacio = isset($vacio) ? $vacio : false;
    @endphp

    @if($vacio)
    <div class="card">
        <div class="card.body">
            <center><a class="card-text">No se encontró el resultado de la búsqueda.</a></center>
        </div>
    </div>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>CI</th>
                <th>Correo</th>
                <th>Fecha de Nacimiento</th>
                <th>Telefono</th>
                <th>Sector</th>
                <th>Estado</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id ?? 'NN' }}</td>
                <td>{{ $cliente->nombre ?? 'NN' }}</td>
                <td>{{ $cliente->apellido ?? 'NN' }}</td>
                <td>{{ $cliente->edad ?? 'NN' }}</td>
                <td>{{ $cliente->ci ?? 'NN' }}</td>
                <td>{{ $cliente->correo ?? 'NN' }}</td>
                <td>{{ $cliente->fecha_nac ?? 'NN' }}</td>
                <td>{{ $cliente->telefono ?? 'NN' }}</td>
                
                </strong><br><strong></td>
                    <td>nombre:<strong>{{$cliente->cargo->nombre}}
                    </strong><br> Sector: <strong>{{$cliente->cargo->sector}}</strong></td>

                <td>
                    @if ($cliente->estado == 'Activo')
                    <span class="badge badge-primary">{{ $cliente->estado }}</span>
                    @elseif ($cliente->estado == 'activo')
                    <span class="badge badge-primary">{{ $cliente->estado }}</span>
                    @else
                    <span class="badge badge-warning">{{ $cliente->estado }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('Clienteeliminar', ['id' => $cliente->id]) }}"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');"
                        class="btn btn-danger">Eliminar
                    </a>
                    <a href="{{ route('Clienteeditar', ['id' => $cliente->id]) }}" class="btn btn-info">Editar</a>
                    <a href="{{ route('Clientever', ['id' => $cliente->id]) }}" class="btn btn-info">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    {{$clientes->links()}}
</div>
