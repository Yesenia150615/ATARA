<?php
$Localhost = 'LAPTOP-ITLGT66Q\SQLEXPRESS';
$Usuario_BD = 'sa';
$Password_BD = '1234';
$Nombre_BD = 'BD_EP_ISI';

try{
  $conn = new PDO("sqlsrv:server={$Localhost};database={$Nombre_BD}",$Usuario_BD,$Password_BD);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
  echo $e->getMessage();
}



