<?php
//session_start();
//if (!isset($_SESSION['user_id'])) {
//echo '<script type="text/javascript">'
//,'window.location="http://riesgo-academico.test/index.php";'
//,'</script>';
//}
//require 'conexion.php';
 include_once("conexion.php");

?>

<?php
      $id = $_GET['id']; 
      if(isset($_FILES['seleccionArchivos']))
        { 
      $nameimg=$_FILES['seleccionArchivos']['name'];
      $archivo=$_FILES['seleccionArchivos']['tmp_name'];
      $ruta="img";
      $ruta=$ruta."/".$nameimg;
      move_uploaded_file($archivo,$ruta);
      $stmt = $conn->prepare("exec SP_Agregafoto :id,:f"); 
      $stmt->bindParam(':id', $id); 
      $stmt->bindParam(':f', $ruta);
      $stmt->setFetchMode(PDO::FETCH_ASSOC); 
          if ($stmt->execute()) {
              header('Location:perfilalumno.php?id=3');
            }
          }
        
    

       $stmt1 = $conn->prepare("select p.fotoper, CONCAT_WS(' ',p.ApPaterno,p.ApMaterno,p.Nonbre) nombre, a.Codigo,d.direccion,lc.email,lc.celular from persona p
            inner join Alumno a on a.IdPersona=p.IdPersona
            inner join Direccion d on d.IdPersona=p.IdPersona
            left join Fn_ListarContactos(1) lc on lc.idpersona=p.IdPersona
            where p.Estado=1 and a.Estado=1 and p.IdPersona=$id");
        $stmt1->setFetchMode(PDO::FETCH_ASSOC);
        $stmt1->execute();
        $cam=$stmt1->fetchAll();

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
    <h1 class="my-4 font-weight-bold">Perfil académico del alumno</h1>
    <div class="row mb-4" >
        <div class="col col-12 col-lg-4 mb-3">
        <?php foreach ($cam as $dato ):
          ?>

         <div class="card">
            <img class="card-img-top" src="<?php echo $dato['fotoper']?>" id="imgAlumno" class="img-rounded" width="250px" height="250px"> 
                <div class="d-flex justify-content-center my-2">
                    <button type="button" class="btn btn-secondary" id="abrirmodal">Editar</button>
                </div> 
                <div class="card-body">
                    <div>
                    <h5 class="font-weight-bold mb-3" id="titulo"><?php echo  $dato['nombre'];?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" ><b>Codigo:</b><span id="codigo_est"><?php echo  $dato['Codigo'];?></span></li></ul>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>N° Celular:</b><span id="cel_est"><?php echo  $dato['celular'];?></span></li></ul> 
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Correo:</b><span id="correo_est"><?php echo  $dato['email'];?></span></li></ul>  
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Dirección:</b><span id="dir_est"><?php echo  $dato['direccion'];?></span></li></ul>
                        <?php endforeach ?>  
                </div>
            </div>
        </div>    


        <div class="col col-12 col-lg-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Cursos</h5>
                    <table class="table table-hover table-borderless"
                           id="tabla-cursos">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Vez</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $escuela=1;
                        $stmt = $conn->prepare("exec SP_MostrarCursosAlumno :escuela");
                                 $stmt->bindParam(':escuela', $escuela);  
                                 $stmt->setFetchMode(PDO::FETCH_OBJ); 
                                 $stmt->execute();

                                    while($cam = $stmt->fetch()){
                                       ?>
                                        <tr> 
                                        <td><?php echo $cam->id;?></td>
                                        <td><?php echo $cam->Curso;?></td>
                                        <td><?php echo $cam->Vez;?></td>
                                        </tr> 
                                 <?php
                                   }
                                ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col col-12 col-lg-4 mb-3" id="card-docentes">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Historial del Curso: <span id="curso-seleccionado">Sistemas Digitales</span>
                    </h5>
                    <table class="table table-hover table-borderless"
                           id="tabla-docentes">
                        <thead>
                        <tr>
                            <th scope="col">Docente</th>
                            <th scope="col">Semestre</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $curso=1;
                        $per=3;
                        $stmt = $conn->prepare("exec SP_HistorialCurso :curso,:per");
                                 $stmt->bindParam(':curso', $curso);  
                                 $stmt->bindParam(':per', $per);  
                                 $stmt->setFetchMode(PDO::FETCH_OBJ); 
                                 $stmt->execute();

                                    while($cam = $stmt->fetch()){
                                       ?>
                                        <tr> 
                                        <td><?php echo $cam->Nombre;?></td>
                                        <td><?php echo $cam->SemestreAcademico;?></td>
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data" action="perfilalumno.php">
             <div class="modal-header">
                <h3 class="modal-title font-weight-bold" id="exampleModalLabel">Editar Foto de Perfil</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
             </div>
             <div class="modal-body">
               <div class="mb-3 ">
                <div>
                  <input  type="hidden" class="form-control input-lg" name="idsubir" id="idsubir" required>
                </div>
                <div id="dvArchivo">
                   <input type="file" class="form-control-file" id="seleccionArchivos" name="seleccionArchivos" accept="image/*">
                </div>
                <div class="my-3" id="fotocont">
                <img id="imagenPrevisualizacion">
                </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" id="btnCerrar" class="btn btn-default pull-left" data-bs-dismiss="modal" >Cerrar</button>
                   <button type="submit" class="btn btn-primary" id="GuardarFoto" value="Enviar">Guardar</button>
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
    cursoSeleccionado = document.getElementById('curso-seleccionado');
    filaCursos = document.querySelectorAll('table#tabla-cursos > tbody > tr');
    cardDocentes = document.getElementById('card-docentes');
    //empieza Para la Editar Foto
    const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
    $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");
  
  // Escuchar cuando cambie
    $seleccionArchivos.addEventListener("change", () => {
    // Los archivos seleccionados, pueden ser muchos o uno
    const archivos = $seleccionArchivos.files;
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
      $imagenPrevisualizacion.src = "";
      return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    const primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    $imagenPrevisualizacion.src = objectURL;
  });
// Termina para Editar foto

$(document).ready(function () {
        $('#tabla-alumnos').DataTable();
        cardDocentes.classList.add('d-none');

        $("#abrirmodal").click(function(){
            $("#exampleModal").modal('show');
        });
    });

    filaCursos.forEach(fila => {
        fila.addEventListener('dblclick', () => {
            escogerCurso(fila)
        })
    })

    function escogerCurso(fila) {
        columna = fila.querySelectorAll('td')
        cursoSeleccionado.innerText = columna[0].innerText;
        cardDocentes.classList.remove('d-none');
    }

</script>


</body>
</html>
