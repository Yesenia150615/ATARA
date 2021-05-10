
                        <?php 
                            include_once 'conexion.php';
                           
                            $stmt = $conn->prepare("select*from Curso;");
                            $stmt->setFetchMode(PDO::FETCH_OBJ); 
                            $stmt->execute();

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
    <h1 class="my-4 font-weight-bold">Cursos</h1>

    <div class="row mb-4">
        <div class="col col-12 col-lg-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Registrar Cursos </h5>
                    <form class="mt-2" method="POST" action="insertarCurso.php">
                        <div class="form-group">
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
                                    <label for="curso" class="font-weight-bold">Curso</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="curso" name="curso">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="credito" class="font-weight-bold">Creditos</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="credito" name="credito">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="tipo" class="font-weight-bold">Tipo</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="tipo" name="tipo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="estado" class="font-weight-bold">Estado</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="estado" class="form-control bg-light" id="estado" name="estado">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-4 text-right">
                                    <label for="ciclo" class="font-weight-bold">Ciclo</label>
                                </div>
                                <div class="col col-sm-8">
                                    <input type="text" class="form-control bg-light" id="ciclo" name="ciclo">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-light font-weight-bold mr-2">
                                Editar
                            </button>
                            <button  type="submit" class="btn btn-primary font-weight-bold" name="guardar">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Cursos Registrados</h5>
                    <table class="table table-hover table-borderless"
                           id="tabla-alumnos">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Código</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Creditos</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ciclo</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($cam = $stmt->fetch()){
                        ?>
            <tr>
            <td><?php echo $cam->IdCurso;?></td>
            <td><?php echo $cam->Codigo;?></td>
            <td><?php echo $cam->Curso;?></td>
            <td><?php echo $cam->Creditos;?></td>
            <td><?php echo $cam->Tipo;?></td>
            <td><?php echo $cam->estado;?></td>
            <td><?php echo $cam->IdCiclo;?></td>
            </tr>
         <?php
           }
        ?>    
                        </tbody>
                    </table>
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

</body>
</html>
