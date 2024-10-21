<?php
include 'conexion.php';
$conn = new Conexion();
$conn = $conn->conectar();
$cedula = $_POST['estCedula'];
$nombre = $_POST['estNombre'];
$apellido = $_POST['estApellido'];
$direccion = $_POST['estDireccion'];
$telefono = $_POST['estTelefono'];
$curId = $_POST['curId'];
$sqlEditar = "UPDATE estudiantes SET estNombre='$nombre',estApellido='$apellido',
estTelefono='$telefono',estDireccion='$direccion',curId='$curId' WHERE estCedula = '$cedula'";

if ($conn->query($sqlEditar)==TRUE) {
    echo  json_encode("Se actualizo");
}else{
    echo "Fallo".$sqlEditar.$conn->error;
}




