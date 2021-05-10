<?php
require('fpdf/fpdf.php');
require('conexion.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(40,10,'REPORTE ESTUDIANTES EN RIESGO ACADEMICO',0,0,'C');
    // Salto de línea
    $this->Ln(20);
	$this->Cell(7,10,'ID',1,0,'C',0);
    $this->Cell(50,10,'Estudiante',1,0,'C',0);
    $this->Cell(25,10,'Codigo',1,0,'C',0);
    $this->Cell(25,10,'Curso',1,0,'C',0);
    $this->Cell(7,10,'V.',1,0,'C',0);
    $this->Cell(10,10,'M.',1,0,'C',0);
    $this->Cell(7,10,'S.',1,0,'C',0);
    $this->Cell(50,10,'Docente',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
	$lim=100;
	$busc='';
    $stmt = $conn->prepare("exec SP_MostrarEstadoActualRiesgo :lim,:busc");
    $stmt->bindParam(':lim', $lim); 
    $stmt->bindParam(':busc', $busc); 
    $stmt->setFetchMode(PDO::FETCH_OBJ); 
    $stmt->execute();
    $location = array();
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',6);
while( $row = $stmt->fetch()){
    $pdf->Cell(7,10,$row->IdAlumno,1,0,'C',0);
    $pdf->Cell(50,10,$row->Estudiante,1,0,'C',0);
    $pdf->Cell(25,10,$row->Codigo,1,0,'C',0);
    $pdf->Cell(25,10,$row->Curso,1,0,'C',0);
    $pdf->Cell(7,10,$row->vez,1,0,'C',0);
    $pdf->Cell(10,10,$row->Matricula,1,0,'C',0);
    $pdf->Cell(7,10,$row->Estadomatricula,1,0,'C',0);
    $pdf->Cell(50,10,$row->Docente,1,1,'C',0);
}

$pdf->Output();
?>