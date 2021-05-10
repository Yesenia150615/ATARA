
                        <?php 
                            include_once 'conexion.php';
                            $lim=100;
                            $busc='';
                            $stmt = $conn->prepare("exec SP_MostrarEstadoActualRiesgo :lim,:busc");
                            $stmt->bindParam(':lim', $lim);
                            $stmt->bindParam(':busc', $busc);  
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
    <h1 class="my-4 font-weight-bold"><center>Alumnos con Alto Riesgo Académico
 Semestre 2020-II.</center>
</h1>
    <div class="row mb-4">
        
        <div class="col col-12 col-lg-12">
          
            <div class="card">
                <p><div align="right">
                   <a class="btn btn-primary " href="reporte.php"><i class="bi bi-printer">Imprimir</i></a></div></p>
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Alumnos Registrados</h5>
                    <table class="table table-hover table-borderless"
                           id="tabla-alumnos">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Código</th>
                            <th scope="col">Alumno</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Veces</th>
                            <th scope="col">Matriculado</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Docente</th>
                        </tr>
                        </thead>

                        <tbody>
                        


                          <?php 
                           while($cam = $stmt->fetch()){
                             ?>
                              <tr>
                               <td><?php echo $cam->IdAlumno;?></td>
                               <td><?php echo $cam->Estudiante;?></td> 
                               <td><?php echo $cam->Codigo;?></td> 
                               <td><?php echo $cam->Curso;?></td>
                               <td><?php echo $cam->vez;?></td>
                               <td><?php echo $cam->Matricula;?></td> 
                               <td><?php echo $cam->Estadomatricula;?></td> 
                               <td><?php echo $cam->Docente;?></td> 
            
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