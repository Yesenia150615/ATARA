<?php 
include_once 'conexion.php';
$IdPersona=$_POST['IdPersona'];
$nombre=$_POST['nombre'];
$curso=$_POST['curso'];
$vez=$_POST['vez'];
$correo=$_POST['correo'];
$codigo=$_POST['codigo'];
$stmt = $conn->prepare("exec SP_EditaEstudiante :idper,:nom,:cor,:cod");
$stmt->bindParam(':idper', $IdPersona); 
$stmt->bindParam(':nom', $nombre); 
$stmt->bindParam(':cor', $correo); 
$stmt->bindParam(':cod', $codigo);  
$stmt->setFetchMode(PDO::FETCH_OBJ); 
if ($stmt->execute()) {
	header('Location: alumno.php');
}

 ?>