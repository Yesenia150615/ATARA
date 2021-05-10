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
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(40,10,'REPORTE ESTUDIANTES',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(20,10,'Codigo',1,0,'C',0);
    $this->Cell(65,10,'Alumno',1,0,'C',0);
    $this->Cell(40,10,'Curso',1,0,'C',0);
    $this->Cell(7,10,'Vez.',1,0,'C',0);
    $this->Cell(23,10,'Celular',1,0,'C',0);
    $this->Cell(35,10,'Correo',1,1,'C',0);
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
	$lim=1000;
	$busc='';
    $esc=1;
    $vez=3;
    $stmt = $conn->prepare("exec AlumRiesgo :busc,:lim,:esc,:vez"); 
    $stmt->bindParam(':busc', $busc); 
    $stmt->bindParam(':lim', $lim); 
    $stmt->bindParam(':esc', $esc); 
    $stmt->bindParam(':vez', $vez); 
    $stmt->setFetchMode(PDO::FETCH_OBJ); 
    $stmt->execute();
    $location = array();

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',8);
while( $row = $stmt->fetch()){

    $pdf->Cell(20,10,$row->Codigo,1,0,'C',0);
    $pdf->Cell(65,10,utf8_decode($row->Alumno),1,0,'C',0);
    $pdf->Cell(40,10,utf8_decode($row->Curso),1,0,'C',0);
    $pdf->Cell(7,10,$row->Vez,1,0,'C',0);
    $pdf->Cell(23,10,$row->Celular,1,0,'C',0);
    $pdf->Cell(35,10,utf8_decode($row->Correo),1,1,'C',0);
}

$pdf->Output();
?>
