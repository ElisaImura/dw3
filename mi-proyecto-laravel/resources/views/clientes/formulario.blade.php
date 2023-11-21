<link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jsdelivr.js')}}"></script>
<script src="{{asset('js/jsdelivr_boot.js')}}"></script>

@include('clientes.menu')

</head>
    <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de Creación de Cliente</div>
                    
                    <div class="card-body">
                      <form method="POST" action="/clientes/crear">
                            @csrf <!-- Campo CSRF -->

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="{{old('apellido')}}">
                            </div>

                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="number" name="edad" id="edad" class="form-control" value="{{old('edad')}}">
                            </div>

                            <div class="form-group">
                                <label for="ci">CI:</label>
                                <input type="text" name="ci" id="ci" class="form-control" value="{{old('ci')}}">
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" name="correo" id="correo" class="form-control" value="{{old('correo')}}">
                            </div>

                            <div class="form-group">
                                <label for="fecha_nac">Fecha de Nacimiento:</label>
                                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="{{old('fecha_nac')}}">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Numero de telefono:</label>
                                <input type="text" name="telefono" id="telefono"
                                    placeholder="Ingrese su número de telefono" class="form-control" value="{{ old('telefono') }}">
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="estado">Cargos:</label>
                                <select name="id_cargo" id="estado" class="form-control">
                                    <option value="opcion">Seleccione una opcion</option>
                                    @foreach($cargos as $id => $nombre)
                                    <option value="{{$id}}">{{$nombre}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

