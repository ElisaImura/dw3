<link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jsdelivr.js')}}"></script>
<script src="{{asset('js/jsdelivr_boot.js')}}"></script>

@include('productos.menu')

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
        <h1>Listado de Productos</h1>

        <a href="{{ route('ProductoNuevo') }}" class="btn btn-primary">Nuevo</a>
    </div>
    <div class="input-group mb-3">
        <form action="{{ route('Productobuscar') }}"class="d-flex">
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
                <th>Descripcion</th>
                <th>Marca</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>IVA</th>
                <th>stock minimo</th>
                <th>estado</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id ?? 'NN' }}</td>
                <td>{{ $producto->nombre ?? 'NN' }}</td>
                <td>{{ $producto->descripcion ?? 'NN' }}</td>
                <td>{{ $producto->marca ?? 'NN' }}</td>
                <td>{{ $producto->stock ?? 'NN' }}</td>
                <td>{{ $producto->precio ?? 'NN' }}</td>
                <td>{{ $producto->iva ?? 'NN' }}</td>
                <td>{{ $producto->stock_min ?? 'NN' }}</td>
                <td>
                    @if ($producto->estado == 'Activo')
                    <span class="badge badge-primary">{{ $producto->estado }}</span>
                    @elseif ($producto->estado == 'activo')
                    <span class="badge badge-primary">{{ $producto->estado }}</span>
                    @else
                    <span class="badge badge-warning">{{ $producto->estado }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('Productoeliminar', ['id' => $producto->id]) }}"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');"
                        class="btn btn-danger">Eliminar
                    </a>
                    <a href="{{ route('Productoeditar', ['id' => $producto->id]) }}" class="btn btn-info">Editar</a>
                    <a href="{{ route('Productover', ['id' => $producto->id]) }}" class="btn btn-info">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    {{$productos->links()}}
</div>