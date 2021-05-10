<?php 
include_once 'conexion.php';
$dni=$_POST['dni'];
$paterno=$_POST['paterno'];
$materno=$_POST['materno'];
$nombres=$_POST['nombres'];
$Codigo=$_POST['codigo'];
$stmt = $conn->prepare("exec IngresaAlRiesgo :dni,:ap,:am,:nom,output");

$stmt = $con->prepare("exec SP_IngresaAlAl :cod,:cor,:si,1,:dni,:ap ,:am ,:nom ,output");
$stmt = $con->prepare("exec SP_ingresaCursoDictado :idesc,:idcur,:idsem,:iddoc,output");
$stmt = $con->prepare("exec SP_IngresaAlCurso :idalcur,:cod,:cor,:si,:esc,:dni,:ap,:am,:nom,:idesc,:idcur,:idsem,:iddoc,:vez,:tipo");
$stmt->bindParam(':dni', $dni); 
$stmt->bindParam(':ap', $paterno); 
$stmt->bindParam(':am', $materno); 
$stmt->bindParam(':nom', $nombres); 
$stmt->setFetchMode(PDO::FETCH_OBJ); 
if ($stmt->execute()) {
	header('Location: alumno.php');
}

 ?>
 