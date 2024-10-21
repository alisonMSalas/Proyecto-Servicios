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
    echo  json_encode("Se guardo");
    
}else{
    echo json_encode("Fallo".$sqlInsert.$conn->error);
}

?>