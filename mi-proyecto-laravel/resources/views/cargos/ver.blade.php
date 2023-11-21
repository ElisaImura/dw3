<link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jsdelivr.js')}}"></script>
<script src="{{asset('js/jsdelivr_boot.js')}}"></script>

@include('cargos.menu')

</head>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vista de Cargo</div>
                    
                    <div class="card-body">
                      <form  method="post" action="{{route('actualizar',['id'=>$cargos->id])}}">
                            @csrf <!-- Campo CSRF -->
                           
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$cargos->nombre}}" required disabled="true">
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$cargos->descripcion}}"  required disabled="true">
                            </div>

                            <div class="form-group">
                                <label for="sector">Sector:</label>
                                <input type="text" name="sector" id="sector" class="form-control" value="{{$cargos->sector}}" required disabled="true">
                            </div>

                            <div class="form-group">
                                <label for="empresa">Empresa:</label>
                                <input type="text" name="empresa" id="empresa" class="form-control" value="{{$cargos->empresa}}" required disabled="true">
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

