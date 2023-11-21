<link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jsdelivr.js')}}"></script>
<script src="{{asset('js/jsdelivr_boot.js')}}"></script>

@include('cargos.menu')

<div class="container" id="todo" style="margin-top: 50px; margin-bottom: 50px;">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h1>Listado de Cargos</h1>

        <a href="{{ route('CargoNuevo') }}" class="btn btn-primary">Nuevo</a>
    </div>
    <div class="input-group mb-3">
        <form action="{{ route('Cargobuscar') }}"class="d-flex">
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
                <th>Descripción</th>
                <th>Sector</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cargos as $cargo)
            <tr>
                <td>{{ $cargo->id ?? 'NN' }}</td>
                <td>{{ $cargo->nombre ?? 'NN' }}</td>
                <td>{{ $cargo->descripcion ?? 'NN' }}</td>
                <td>{{ $cargo->sector ?? 'NN' }}</td>
                <td>{{ $cargo->empresa ?? 'NN' }}</td>
                
                <td>
                    <a href="{{ route('Cargoeliminar', ['id' => $cargo->id]) }}"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');"
                        class="btn btn-danger">Eliminar
                    </a>
                    <a href="{{ route('Cargoeditar', ['id' => $cargo->id]) }}" class="btn btn-info">Editar</a>
                    <a href="{{ route('Cargover', ['id' => $cargo->id]) }}" class="btn btn-info">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    {{$cargos->links()}}
</div>
