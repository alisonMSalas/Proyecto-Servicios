<?php
require('../fpdf186/fpdf.php');
include('../models/conexion.php');
$conn = new conexion();
$conn = $conn->conectar();
$sqlSelect = "SELECT e.estCedula, 
        e.estNombre, 
        e.estApellido, 
        e.estTelefono, 
        e.estDireccion, 
        c.curNombre,
        e.curId
         FROM estudiantes e, cursos c where e.curId = c.curId ";

         
$respuesta = $conn->query($sqlSelect);
$pdf=new FPDF();
$pdf->AddPage('L');
$pdf->SetFont("Arial", 'B', 16);
$pdf->Cell(50,10,"Cedula", 1);
$pdf->Cell(50,10,"Nombre", 1);
$pdf->Cell(50,10,"Apellido", 1);
$pdf->Cell(50,10,"Telefono", 1);
$pdf->Cell(50,10,"Direccion", 1);
$pdf->Cell(30,10,"Curso", 1);
$pdf->Ln();


while ( $row=$respuesta->fetch_object()) {
    $cedula = $row->estCedula;
    $nombre = $row->estNombre;
    $apellido = $row->estApellido;
    $telefono = $row->estTelefono;
    $direccion = $row->estDireccion;
    $curNombre = $row->curNombre;
    $pdf->Cell(50,10,$cedula,1);
    $pdf->Cell(50,10,$nombre,1);
    $pdf->Cell(50,10,$apellido,1);
    $pdf->Cell(50,10,$telefono,1);
    $pdf->Cell(50,10,$direccion,1);
    $pdf->Cell(30,10,$curNombre,1);

    $pdf->Ln();
}


$pdf->Output();


