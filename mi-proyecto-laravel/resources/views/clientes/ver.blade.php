<link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jsdelivr.js')}}"></script>
<script src="{{asset('js/jsdelivr_boot.js')}}"></script>

@include('clientes.menu')

</head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de edicion de Cliente</div>
                    
                    <div class="card-body">
                      <form  method="post" action="{{route('Clienteactualizar',['id'=>$clientes->id])}}">
                            @csrf <!-- Campo CSRF -->
                           
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$clientes->nombre}}" required disabled="true">
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="{{$clientes->apellido}}"  required disabled="true">
                            </div>

                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="number" name="edad" id="edad" class="form-control" value="{{$clientes->edad}}" required disabled="true">
                            </div>

                            <div class="form-group">
                                <label for="ci">CI:</label>
                                <input type="text" name="ci" id="ci" class="form-control" value="{{$clientes->ci}}" required disabled="true">
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" name="correo" id="correo" class="form-control" value="{{$clientes->correo}}" required disabled="true">
                            </div>

                            <div class="form-group">
                                <label for="fecha_nac">Fecha de Nacimiento:</label>
                                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="{{$clientes->fecha_nac}}"required disabled="true">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Numero de telefono:</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="{{$clientes->telefono}}"required disabled="true">
                            </div>

                           <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" id="estado" class="form-control" disabled="true">
                <option value="Activo" {{ $clientes->estado === 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ $clientes->estado === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>

            <label for="estado">Cargo:</label>
            <select name="estado" id="estado" class="form-control" disabled="true">
                <option value="" {{ $clientes->cargo->nombre }}</option>
            </select>
        </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

