<?php 
include_once 'conexion.php';
$id=$_POST['id'];
$stmt = $conn->prepare("exec DarBajaAlumno :idper");
$stmt->bindParam(':idper',$id); 
$stmt->setFetchMode(PDO::FETCH_OBJ); 
if ($stmt->execute()) {
	header('Location: alumno.php');
}

 ?>