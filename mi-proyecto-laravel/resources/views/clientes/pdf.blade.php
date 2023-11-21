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
                
                </strong><br> Sector: <strong></td>
                    <td>nombre:<strong>{{$cliente->cargo->sector}}
                    </strong><br> Sector: <strong>{{$cliente->cargo->sector}}</strong></td>
                
                
            </tr>
        @endforeach
    </tbody>
</table>

@endif
</div>