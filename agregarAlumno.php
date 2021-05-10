
                        <?php 
                            
                        ?>

<!DOCTYPE html>
<html lang="es">
<head>

    <?php
    @include_once('links.php');
    ?>
</head>
<body class="body-fondo">

<?php
@include_once('navbar.php');
?>

<div class="container">
    <h1 class="my-4 font-weight-bold">Agregar alumnos</h1>
    <div class="row mb-6">
        <div class="col col-12 col-lg-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Información personal</h5>
                    <form class="mt-2" method="POST" action="insertar.php">
                        <div class="form-group">
                          <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="dni" class="font-weight-bold">DNI</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="dni" name="dni">
                                </div>
                            </div>
                           </div>
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="codigo" class="font-weight-bold">Código</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="codigo" name="codigo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="paterno" class="font-weight-bold">Apellidos</label>
                                </div>
                                <div class="col col-sm-4">
                                    <input type="text" class="form-control bg-light" id="paterno" name="paterno">
                                </div>
                                <div class="col col-sm-4">
                                    <input type="text" class="form-control bg-light" id="materno" name="materno">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="nombres" class="font-weight-bold">Nombres</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="nombres" name="nombres">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="direccion" class="font-weight-bold">Dirección</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="direccion" name="direccion">
                                </div>
                            </div>
                        </div>
                        <div class="divider my-3"></div>
                        <h5 class="font-weight-bold mb-3">Información de contacto</h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="correo" class="font-weight-bold">Correo</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="correo" name="correo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="celular" class="font-weight-bold">N° de Celular</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="celular" name="celular">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col col-12 col-lg-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Información Curso Dictado</h5>
                    <form class="mt-2" method="POST" action="insertar.php">
                        <div class="form-group">
                          <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="dni" class="font-weight-bold">Curso Dictado</label>
                                </div>
                                <div >
                                    <select class="form-control input-lg" id="vez" name="vez"><option value="">Selecionar id</option>
                                    </select>
                                </div>
                            </div>
                           </div>
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="codigo" class="font-weight-bold">Escuela</label>
                                </div>
                                <div >
                                    <select class="form-control input-lg" id="vez" name="vez"><option value="">Selecionar id</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="nombres" class="font-weight-bold">Semestre</label>
                                </div>
                                <div >
                                    <select class="form-control input-lg" id="vez" name="vez"><option value="">Selecionar id</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="direccion" class="font-weight-bold">Docente</label>
                                </div>
                                <div >
                                    <select class="form-control input-lg" id="vez" name="vez"><option value="">Selecionar id</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="divider my-3"></div>
                        <h5 class="font-weight-bold mb-3">Información Alumno Curso</h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="correo" class="font-weight-bold">Alumno</label>
                                </div>
                                <div >
                                    <select class="form-control input-lg" id="vez" name="vez"><option value="">Selecionar id</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="celular" class="font-weight-bold">Curso Dictado</label>
                                </div>
                                <div >
                                    <select class="form-control input-lg" id="vez" name="vez"><option value="">Selecionar id</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="celular" class="font-weight-bold">Veces desaprobados</label>
                                </div>
                                <div >
                                    <select class="form-control input-lg" id="vez" name="vez"><option value="">Selecionar vez</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-light font-weight-bold mr-2">Editar</button>
                            <button  type="submit" class="btn btn-primary font-weight-bold" name="guardar">Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>



<!--====== Scripts -->
<?php
@include_once('scripts.php');
?>

<script>
    $(document).ready(function () {
        $('#tabla-alumnos').DataTable();
    });
</script>
<script>
    $('.editbtn').on('click',function(){
        $tr=$(this).closest('tr');
        var datos=$tr.children("td").map(function(){
            return $(this).text();
        });
        $('#IdPersona').val(datos[0]);
        $('#Codigo').val(datos[1]);
        $('#nombre').val(datos[2]);
        $('#Correo').val(datos[3]);
    });
    
</script>
<script>
    $('.elibtn').on('click',function(){
        $tr=$(this).closest('tr');
        var datos=$tr.children("td").map(function(){
            return $(this).text();
        });
         $('#id').val(datos[0]);
    });
    
</script>

</body>
</html>
