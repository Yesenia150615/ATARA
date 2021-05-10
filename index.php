<?php
// session_start();
// if (isset($_SESSION['user_id'])) {
// echo '<script type="text/javascript">'
// ,'window.location="http://riesgo-academico.test/principal.php";'
// ,'</script>';
// }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>ATARA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/navstyle.css">
  <link rel="stylesheet" href="css/bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>

<body class="cover" style="background-image: url(./assets/img/loginFont.jpg);">
	   <nav class="navbar navbar-expand-lg navbar-light " style="background: rgba(0,0,255,0.2) ; height: 50px;">
          <ul></ul><ul></ul><ul></ul><ul></ul>
             <div class="container-fluid" >  
            		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            		<span class="navbar-toggler-icon"></span>
            		</button>
            			<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
              			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
               					 <ul class="nav nav-pills navbar-right">
                  					  <li><a class="nav-link-active" href="principal.php">Ingresar</a></li>

               					 </ul>
                       		</div>
       
           				 </section> 
		        </div>
		        
		     </nav>

	
	<!--====== Scripts -->
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>