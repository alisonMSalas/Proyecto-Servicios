<?php
include 'conexion.php';
$conn = new conexion();
$conn = $conn->conectar();
$cedula = $_POST['estCedula'];
$nombre = $_POST['estNombre'];
$apellido = $_POST['estApellido'];
$direccion = $_POST['estDireccion'];
$telefono = $_POST['estTelefono'];
$curId = $_POST['curId'];

$sqlInsert = "INSERT  INTO estudiantes VALUES('$cedula','$nombre','$apellido','$telefono','$direccion','$curId')";

if ($conn->query($sqlInsert)==TRUE) {
    echo ("Se inserto Correctamente");
}else{
    echo("No se inserto");
}
header('Location: http://localhost/cuarto/index.php?action=contactanos');