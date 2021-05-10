
                        <?php 
                            include_once 'conexion.php';
                            $busc='';
                            $escuela=1;
                            $lim=1000;
                            $stmt = $conn->prepare("exec mostrarEstuRiesgo :busc, 1000,:escuela");
                            $stmt->bindParam(':busc', $busc); 
                            $stmt->bindParam(':escuela', $escuela); 
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
    <h1 class="my-4 font-weight-bold">Registro y modificación de alumnos</h1>
    <div class="row mb-4">
        <div class="col col-12 col-lg-12">
            <div class="card"> 
               <p><div align="right" >
                    <button  class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAlumno">Agregar Alumno</button></div></p>
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
                            <th scope="col">Vez</th>
                             <th scope="col">Celular</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Opción</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php
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
            <td><div class="btn-group"><button class="btn btn-success editbtn" data-toggle="modal" data-target="#modalEditarAlumno"><i class="bi bi-pencil-square"></i></button>  
            <button class="btn btn-danger elibtn" data-toggle="modal" data-target="#modalEliminarAlumno"><i class="bi bi-trash"></i></button></div></td>
            
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

<!--=====================================
MODAL AGREGAR Alumno
======================================-->

<div id="modalAgregarAlumno" class="modal fade" role="dialog" >
  
  <div class="modal-dialog">

    <div class="modal-content">

       <form role="form" method="POST" action="insertar.php">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#c71239; color:white">
            <h5 class="font-weight-bold mb-3">Agregar Alumnos</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>


        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <h5 class="font-weight-bold mb-3">Ingresar información personal</h5>
            <!-- ENTRADA PARA EL DNI -->
            <div class="form-group">
                 <div class="row">
                    <div class="col col-sm-2 text-right">
                        <label for="dni" class="font-weight-bold">DNI</label>
                    </div>
                    <div class="col col-sm-4">
                        <input type="text" class="form-control bg-light" id="dni" name="dni">
                    </div>
                    <div class="col col-sm-2 text-right">
                        <label for="codigo" class="font-weight-bold">Codigo</label>
                    </div>
                    <div class="col col-sm-4">
                        <input type="text" class="form-control bg-light" id="codigo" name="codigo">
                    </div>
                </div>
            </div>
            
                                
          <!-- ENTRADA PARA APELLIDOS -->
            <div class="form-group">
                 <div class="row">
                    <div class="col col-sm-2 text-right">
                        <label for="paterno" class="font-weight-bold">Apellidos</label>
                    </div>
                    <div class="col col-sm-5">
                        <input type="text" class="form-control bg-light" id="paterno" name="paterno">
                    </div>
                    <div class="col col-sm-5">
                        <input type="text" class="form-control bg-light" id="materno" name="materno">
                    </div>
                </div>
            </div>
            
            <!-- ENTRADA PARA EL NOMBRES -->
            
            <div class="form-group">
                <div class="row">
                    <div class="col col-sm-2 text-right">
                        <label for="nombres" class="font-weight-bold">Nombres</label>
                    </div>
                    <div class="col col-sm-10">
                        <input type="text" class="form-control bg-light" id="nombres" name="nombres">
                    </div>
                </div>
            </div>
            <!-- ENTRADA PARA Direccion -->
            
            <div class="form-group">
                <div class="row">
                    <div class="col col-sm-2 text-right">
                        <label for="direccion" class="font-weight-bold">Dirección</label>
                    </div>
                    <div class="col col-sm-10">
                         <input type="text" class="form-control bg-light" id="direccion" name="direccion">
                    </div>
                </div>
            </div>
            <div class="form-group">
                     <div class="row">
                        <div class="col col-sm-2 text-right">
                            <label for="correo" class="font-weight-bold">Correo</label>
                        </div>
                        <div class="col col-sm-10">
                            <input type="text" class="form-control bg-light" id="correo" name="correo">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col col-sm-2 text-right">
                             <label for="celular" class="font-weight-bold">N° de Celular</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="text" class="form-control bg-light" id="celular" name="celular">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col col-sm-2 text-right">
                             <label for="celular" class="font-weight-bold">Semestre Ingreso</label>
                        </div>
                        <div class="col col-sm-8">
                            <input type="text" class="form-control bg-light" id="semestre" name="semestre">
                        </div>
                    </div>
                </div>

            <div class="divider my-3"></div>

                <h5 class="font-weight-bold mb-3">Ingresar información del Curso</h5>
                <div class="form-group">
                 <div class="row">
                    <div class="col col-sm-2 text-right">
                       <label for="Curso" class="font-weight-bold">Curso</label>
                    </div>
                    <div class="col col-sm-4">
                        <select class="form-control input-lg" id="Curso" name="Curso">
                        </select>
                    </div>
                     <div class="col col-sm-2 text-right">
                       <label for="dni" class="font-weight-bold">Vez</label>
                    </div>
                    <div class="col col-sm-4">
                        <select class="form-control input-lg" id="vez" name="vez"><option value="">Selecionar</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                 <div class="row">
                    <div class="col col-sm-2 text-right">
                       <label for="docente" class="font-weight-bold">Docente</label>
                    </div>
                    <div class="col col-sm-4">
                        <select class="form-control input-lg" id="docente" name="docente">
                           
                            <option value="">Selecionar</option>
                            
                        </select>
                    </div>
                     <div class="col col-sm-2 text-right">
                       <label for="escuela" class="font-weight-bold">Escuela</label>
                    </div>
                    <div class="col col-sm-4">
                        <select class="form-control input-lg" id="escuela" name="escuela"><option value="">Selecionar</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                 <div class="row">
                    <div class="col col-sm-2 text-right">
                       <label for="semestre" class="font-weight-bold">Semestre</label>
                    </div>
                    <div class="col col-sm-4">
                        <select class="form-control input-lg" id="semestre" name="semestre"><option value="">Selecionar</option>
                        </select>
                    </div>
                </div>
            </div>
                
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

         <button  type="submit" class="btn btn-primary font-weight-bold" name="guardar">Guardar</button>

        </div>
    </form>
</div>
</div>
</div>

<!--=====================================
MODAL EDITAR ALUMNO
======================================-->

<div id="modalEditarAlumno" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST" action="editarAlumno.php">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#c71239; color:white">

            <h5 class="modal-title">Editar Alumno</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <!-- ENTRADA PARA EL ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"></span> 

                <input  type="hidden" class="form-control input-lg" name="IdPersona" id="IdPersona" required>

              </div>
            </div>

            <!-- ENTRADA PARA EL CODIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"></span> 

                <input type="text" class="form-control input-lg" name="Codigo" id="Codigo" required>
                
              </div>
            </div>
            <!-- ENTRADA PARA EL ALUMNO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"></span> 

                <input type="text" class="form-control input-lg" name="nombre" id="nombre" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL CURSO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"></span> 

                <input type="text" class="form-control input-lg" name="curso" id="curso" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL VEZ -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"></span> 

                <input type="number" class="form-control input-lg" name="Vez" id="Vez" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL CELULAR -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"></span> 

                <input type="text" class="form-control input-lg" name="Celular" id="Celular" required>

              </div>

            </div>
            
            <!-- ENTRADA PARA EL CORREO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"></span> 

                <input type="text" class="form-control input-lg" name="Correo" id="Correo" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button  type="submit" class="btn btn-primary font-weight-bold" name="guardar">Guardar cambios</button>

        </div>
    </form>
</div>
</div>
</div>
<!--=====================================
MODAL BORRAR ALUMNO
======================================-->

<div id="modalEliminarAlumno" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST" action="eliminarAlumno.php">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#c71239; color:white">

            <h5 class="modal-title">Eliminar Alumno</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
        
        <h5>¿Esta seguro que desea eliminar alumno?</h5>

          <div class="box-body">
            <!-- ENTRADA PARA EL ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"></span> 

                <input  type="hidden" class="form-control input-lg" name="id" id="id" required>

              </div>
            </div>
          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>

          <button  type="submit" class="btn btn-danger font-weight-bold" name="eli">Eliminar</button>

        </div>
    </form>
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
        $('#curso').val(datos[3]);
        $('#Vez').val(datos[4]);
        $('#Celular').val(datos[5]);
        $('#Correo').val(datos[6]);
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
