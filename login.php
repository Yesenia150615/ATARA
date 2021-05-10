<?php
// session_start();
// if (isset($_SESSION['user_id'])) {
// echo '<script type="text/javascript">'
// ,'window.location="principal.php";'
// ,'</script>';

// }
// require 'conexion.php';    

// if(!empty($_POST['usua']) && !empty($_POST['contra'])){
      // $records = $conn->prepare("exec ValidaUsuario :usuario,:codigo");
      // $records->bindParam(':usuario',$_POST['usua']);
      // $records->bindParam(':codigo',$_POST['contra']);
      // $records->execute();
// $results=$records->fetch(PDO::FETCH_ASSOC);  
 // if (!empty($results)){
  	// if (password_verify($_POST['contra'], $results['password'])) {     		
        // $_SESSION['user_id'] = $results['idusuario'];
	// echo '<script type="text/javascript">'
		// ,'window.location="principal.php";'
		// ,'</script>';
     // } else{
     	// echo "contrasenia incorrecta";
       // }
  	// }else{
  		// echo "es nulo";
  	// }
// }else
      // {	echo " noooooooooooooooooooo funciono0";
// }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    @include_once('links.php');
    ?>
</head>
<body class="body-fondo">
<div class="container">
    <div class="row mt-5">
                <div class="col col-12 col-lg-6 mb-3">

                    <div class="contenedorcarousellogincuadro">
     
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                                <img src="img/ISI.jpg" class="d-block w-100" alt="..." style="max-width: 100%; height: 460px;">
                        <div class="carousel-caption d-none d-md-block" >
               
                        </div>
                        </div>
                            <div class="carousel-item">
                                <img src="img/ISI1.jpg" class="d-block w-100" alt="..." style="max-width: 100%; height: 460px;">
                            </div>
                            <div class="carousel-item">
                              <img src="img/ISI2.jpg" class="d-block w-100" alt="..." style="max-width: 100%; height: 460px;">
                            </div>
                        </div>
                        <div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button></div>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"  data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                    </div>
                </div>
        <div class="col col-12 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body p-5">
                    <div class="d-flex flex-row align-items-center">
                        <div class="navbar-brand">
                            <img src="img/isi.png" width="36" height="36" alt="Escudo ISI">
                        </div>
                        <h5 class="font-weight-bold text-dark mt-2"> Iniciar Sesión en ATARA</h5>
                    </div>
                    <form class="my-4" method="POST" action="UsuarioValidar.php">
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-3">
                                    <label for="usua" class="font-weight-bold">Usuario</label>
                                </div>
                                <div class="col col-sm-9">
                                    <input type="text" class="form-control bg-light" id="usua" name="usua">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col col-sm-3">
                                    <label for="contra" class="font-weight-bold">Contraseña</label>
                                </div>
                                <div class="col col-sm-9">
                                    <input type="password" class="form-control bg-light" id="contra" name="contra">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Mantener la sesión iniciado</label>
                        </div>
                        <!--                        <button type="submit" class="btn btn-primary mt-5 btn-block">-->
                        <!--                            <i class="fas fa-sign-in-alt"></i> Iniciar Sesión-->
                        <!--                        </button>-->
                        <a href="principal.php" type="submit" class="btn btn-primary mt-3 btn-block font-weight-bold" style=" background-color: rgb(165, 26,69,1);" id="btnIniciar">
                            Iniciar Sesión
                        </a>
                        <a type="button" class="btn btn-link btn-block my-2" href="#" style="color: rgb(165, 26,69,1);">Olvide mi contraseña</a>
                    </form>
                    <div class="row" id="divregistro">

                        <div class="col-md-12 forgot letranunito">
                            <a href="#" id="registro" style="color: rgb(165, 26,69,1);">Registrarme</a>
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

</body>
</html>