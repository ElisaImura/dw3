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
            <th>Empresa</th>
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
            </tr>
        @endforeach
    </tbody>
</table>

@endif
</div>