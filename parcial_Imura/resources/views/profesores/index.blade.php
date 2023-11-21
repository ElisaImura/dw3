<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>Profesores</title>
<div class="container" id="todo" style="margin-top: 50px; margin-bottom: 50px;">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h1>Listado de Profesores</h1>

        <a href="{{ route('nuevo') }}" class="btn btn-primary">Nuevo</a>
    </div>
    <div class="input-group mb-3">
        <form action="{{ route('buscar') }}"class="d-flex">
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
                <th>CI</th>
                <th>Correo</th>
                <th>Fecha de Nacimiento</th>
                <th>Direccion</th>
                <th>Profesion</th>
                <th>Materia</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profesores as $profesor)
            <tr>
                <td>{{ $profesor->id ?? 'NN' }}</td>
                <td>{{ $profesor->nombre ?? 'NN' }}</td>
                <td>{{ $profesor->apellido ?? 'NN' }}</td>
                <td>{{ $profesor->ci ?? 'NN' }}</td>
                <td>{{ $profesor->correo ?? 'NN' }}</td>
                <td>{{ $profesor->fecha_nac ?? 'NN' }}</td>
                <td>{{ $profesor->direccion ?? 'NN' }}</td> 
                <td>{{ $profesor->profesion ?? 'NN' }}</td>
                <td>{{ $profesor->materia ?? 'NN' }}</td>  
                <td>
                    <a href="{{ route('eliminar', ['id' => $profesor->id]) }}"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');" class="btn btn-danger"
                        ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                          <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg>
                    </a>
                    <a href="{{ route('editar', ['id' => $profesor->id]) }}" class="btn btn-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                          <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </a>
                    <a href="{{ route('ver', ['id' => $profesor->id]) }}" class="btn btn-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    {{$profesores->links()}}
</div>
