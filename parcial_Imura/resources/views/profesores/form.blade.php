<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>Profesores - Form</title>
</head>
    <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Formulario de Registro de Profesores</div>
                    
                    <div class="card-body">
                      <form method="POST" action="/crear">
                            @csrf <!-- Campo CSRF -->

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="ci">CI:</label>
                                <input type="text" name="ci" id="ci" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" name="correo" id="correo" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha_nac">Fecha de Nacimiento:</label>
                                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Direccion:</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="profesion">Profesion:</label>
                                <input type="text" name="profesion" id="profesion" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="materia">Materia:</label>
                                <select name="materia" id="materia" class="form-control" required>
                                    <option value="Matematicas">Matematicas</option>
                                    <option value="Lengua y literatura castellana">Lengua y Literatura Castellana</option>
                                    <option value="Fisica">Fisica</option>
                                    <option value="Quimica">Quimica</option>
                                    <option value="Logica Matematica">Logica Matematica</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="/index" class="btn btn-primary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

