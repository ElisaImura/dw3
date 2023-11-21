<link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jsdelivr.js')}}"></script>
<script src="{{asset('js/jsdelivr_boot.js')}}"></script>

@include('cargos.menu')

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
                    <div class="card-header">Formulario de Creación de Cargo</div>
                    
                    <div class="card-body">
                      <form method="POST" action="/cargos/crear">
                            @csrf <!-- Campo CSRF -->

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion')}}">
                            </div>

                            <div class="form-group">
                                <label for="sector">Sector:</label>
                                <input type="text" name="sector" id="sector" class="form-control" value="{{old('sector')}}">
                            </div>

                            <div class="form-group">
                                <label for="empresa">Empresa:</label>
                                <input type="text" name="empresa" id="empresa" class="form-control" value="{{old('empresa')}}">
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

