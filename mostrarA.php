<?php 
include_once 'conexion.php';
$id=$_POST['IdPersona'];
$escuela=1;
$stmt = $conn->prepare("exec SP_Mostrar :idper,:escuela");
$stmt->bindParam(':idper', $id); 
$stmt->bindParam(':escuela', $escuela); 
$stmt->setFetchMode(PDO::FETCH_OBJ); 
if ($stmt->execute()) {
	header('Location: perfilalumno.php');
}

 ?>