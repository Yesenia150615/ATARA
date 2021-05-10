<?php 
include_once 'conexion.php';
$codigo=$_POST['codigo'];
$curso=$_POST['curso'];
$credito=$_POST['credito'];
$tipo=$_POST['tipo'];
$estado=$_POST['estado'];
$ciclo=$_POST['ciclo'];
$stmt = $conn->prepare("INSERT into Curso(Codigo,Curso,Creditos,Tipo,estado,IdCiclo) values ('$codigo', '$curso', '$credito', '$tipo', '$estado', '$ciclo')");
$stmt->setFetchMode(PDO::FETCH_OBJ); 
if ($stmt->execute()) {
	header('Location: curso.php');
}

 ?>