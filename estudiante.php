                       


<?php
 include_once("conexion.php");
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
    <h1 class="my-4 font-weight-bold">Alumnos en riesgos</h1>

    <div class="row mb-4">
        <div class="col col-12">
            <div class="card">
                <div class="card-header pt-3 pb-0 px-3">
                    <ul class="nav nav-tabs border-bottom-0 text-muted">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#cuarto"> 4° vez</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tercero">3° vez</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#segundo">2° vez</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#primer">1° vez</a></li>
                    </ul>
                </div>
     <div class="card-body">
     <div class="tab-content">
        <div id="cuarto" name="cuarto" class="tab-pane fade in active px-3 py-4">
        <h4 class="font-weight-bold mb-4">
        Lista de Alumnos con 4° matricula sobre un curso este ciclo
        </h4>
        <p><div align="right">
        <a class="btn btn-primary " href="reporteriesgo4.php"><i class="bi bi-printer">Imprimir</i></a></div></p>
        <table class="table table-hover-danger table-borderless mt-2"
        id="tabla-alumnos4">
        <thead class="bg-danger text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Alumno</th>
                <th scope="col">Curso</th>
                <th scope="col">Vez</th>
                <th scope="col">Celular</th>
                <th scope="col">Correo</th>
                <th scope="col">Opción</th>
            </tr>
        </thead>
                               
        <tbody>
        <?php
            $escuela=1;
            $vez=4;
            $stmt = $conn->prepare("exec AlumRiesgo '',1000,:escuela,:vez");
            $stmt->bindParam(':escuela', $escuela); 
            $stmt->bindParam(':vez', $vez); 
            $stmt->setFetchMode(PDO::FETCH_OBJ); 
            $stmt->execute();

             while($cam = $stmt->fetch()){
                                       ?>
                 <tr> 
                  <td><?php echo $cam->Persona;?></td>
                  <td><?php echo $cam->Codigo;?></td>
                    <td><?php echo $cam->Alumno;?></td>
                    <td><?php echo $cam->Curso;?></td>
                    <td><?php echo $cam->Vez;?></td>
                    <td><?php echo $cam->Celular;?></td>
                    <td><?php echo $cam->Correo;?></td>
                    <td><a class="btn btn-info" href="perfilalumno.php?id=<?php echo $cam->Persona;?>"><i class="bi bi-person"></i></a></td>
                </tr> 
                    <?php
                  }
                ?>    
                </tbody>
             </table>
            </div>
             <div id="tercero" class="tab-pane fade px-3 py-4">
            <h4 class="font-weight-bold mb-4">
            Lista de Alumnos con 3° matricula sobre un curso este ciclo
            </h4>
            <p><div align="right">
            <a class="btn btn-primary " href="reporteriesgo3.php"><i class="bi bi-printer">Imprimir</i></a></div></p>
            <table class="table table-hover-tercero table-borderless mt-2"
            id="tabla-alumnos3">
            <thead class="bg-tercero text-white">
            <tr>
             <th scope="col">#</th>
            <th scope="col">Código</th>
            <th scope="col">Alumno</th>
            <th scope="col">Curso</th>
            <th scope="col">Vez</th>
            <th scope="col">Celular</th>
            <th scope="col">Correo</th>
            <th scope="col">Opción</th>
            </tr>
            </thead>
                             
            <tbody>
            <?php
            $escuela=1;
            $vez=3;
            $stmt = $conn->prepare("exec AlumRiesgo '',1000,:escuela,:vez");
            $stmt->bindParam(':escuela', $escuela); 
            $stmt->bindParam(':vez', $vez); 
            $stmt->setFetchMode(PDO::FETCH_OBJ); 
            $stmt->execute();

            while($cam = $stmt->fetch()){
                                       ?>
            <tr> 
                <td><?php echo $cam->Persona;?></td>
                <td><?php echo $cam->Codigo;?></td>
                <td><?php echo $cam->Alumno;?></td>
                <td><?php echo $cam->Curso;?></td>
                <td><?php echo $cam->Vez;?></td>
                <td><?php echo $cam->Celular;?></td>
                <td><?php echo $cam->Correo;?></td>
                <td><a class="btn btn-info editbtn" href="perfilalumno.php?id=<?php echo $cam->Persona;?>"><i class="bi bi-person"></i></a></td>
                </tr> 
                 <?php
                     }
                 ?>    
                </tbody>
            </table>
        </div>
        <div id="segundo" class="tab-pane fade px-3 py-4">
            <h4 class="font-weight-bold mb-4">
             Lista de Alumnos con 2° matricula sobre un curso este ciclo</h4>
            <p><div align="right">
                <a class="btn btn-primary " href="reporteriesgo2.php"><i class="bi bi-printer">Imprimir</i></a></div></p>
                <table class="table table-hover-warning table-borderless mt-2" id="tabla-alumnos2">
                <thead class="bg-warning">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Código</th>
                    <th scope="col">Alumno</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Vez</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Opción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $escuela=1;
                $vez=2;
                $stmt = $conn->prepare("exec AlumRiesgo '',1000,:escuela,:vez");
                $stmt->bindParam(':escuela', $escuela); 
                $stmt->bindParam(':vez', $vez); 
                $stmt->setFetchMode(PDO::FETCH_OBJ); 
                $stmt->execute();

                while($cam = $stmt->fetch()){
                                       ?>
                <tr> 
                <td><?php echo $cam->Persona;?></td>
                    <td><?php echo $cam->Codigo;?></td>
                    <td><?php echo $cam->Alumno;?></td>
                    <td><?php echo $cam->Curso;?></td>
                    <td><?php echo $cam->Vez;?></td>
                    <td><?php echo $cam->Celular;?></td>
                    <td><?php echo $cam->Correo;?></td>
                    <td><a class="btn btn-info editbtn" href="perfilalumno.php?id=<?php echo $cam->Persona;?>"><i class="bi bi-person"></i></a></td>


                </tr> 
                <?php
                }
                ?>    
                </tbody>
                </table>
         </div>
        <div id="primer" class="tab-pane fade px-3 py-4">
        <h4 class="font-weight-bold mb-4">Lista de Alumnos con 1° matricula sobre un curso este ciclo</h4>
        <p><div align="right">
            <a class="btn btn-primary " href="reporteriesgo1.php"><i class="bi bi-printer">Imprimir</i></a></div></p>
            <table class="table table-hover-success table-borderless mt-2" id="tabla-alumnos1">
            <thead class="bg-success text-white">
            <tr class=" rounded">
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Alumno</th>
                <th scope="col">Curso</th>
                <th scope="col">Vez</th>
                <th scope="col">Celular</th>
                <th scope="col">Correo</th>
                <th scope="col">Opción</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $escuela=1;
                $vez=1;
                $stmt = $conn->prepare("exec AlumRiesgo '',1000,:escuela,:vez");
                $stmt->bindParam(':escuela', $escuela); 
                $stmt->bindParam(':vez', $vez); 
                $stmt->setFetchMode(PDO::FETCH_OBJ); 
                $stmt->execute();

                while($cam = $stmt->fetch()){
                                       ?>
                    <tr> 
                        <td><?php echo $cam->Persona;?></td>
                        <td><?php echo $cam->Codigo;?></td>
                        <td><?php echo $cam->Alumno;?></td>
                        <td><?php echo $cam->Curso;?></td>
                        <td><?php echo $cam->Vez;?></td>
                       <td><?php echo $cam->Celular;?></td>
                        <td><?php echo $cam->Correo;?></td>
                        <td><a class="btn btn-info editbtn" href="perfilalumno.php?id=<?php echo $cam->Persona;?>"><i class="bi bi-person"></i></a></td>

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
    </div>
</div>


</div>


<!--====== Scripts -->
<?php
@include_once('scripts.php');
?>


<script>
    tablaselecc = document.getElementById('cuarto');
    $(document).ready(function () {
        $('#tabla-alumnos4').DataTable();
        $('#tabla-alumnos3').DataTable();
        $('#tabla-alumnos2').DataTable();
        $('#tabla-alumnos1').DataTable();

        trs = document.querySelectorAll('tr')

        trs.forEach(tr => {
            tr.addEventListener('dblclick', () => {
                mostrarAlumno()
            })
        })
    });

    function mostrarAlumno(tr) {
        //Agregar EventListener al crear cada fila
        // alert('colocar id de la fila, ejemplo ' + tr);
        
         window.location = "perfilalumno.php";
    }

</script>



</body>
</html>
