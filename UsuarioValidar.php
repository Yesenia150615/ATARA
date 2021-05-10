<?php
include_once 'conexion.php';
$usuario=$_POST['usua'];
$codigo=$_POST['contra'];
$escuela=1;
$lim=1000;
$conexionDB = new conexionDB();
$con = $conexionDB->conectar();
$stmt = $con->prepare("exec ValidaUsuario :usuario,:codigo");
$stmt->bindParam(':usuario', $usuario); 
$stmt->bindParam(':codigo', $codigo); 
$stmt->setFetchMode(PDO::FETCH_OBJ); 
if ($stmt->execute()) {
  header('Location: login.php');
}
?>