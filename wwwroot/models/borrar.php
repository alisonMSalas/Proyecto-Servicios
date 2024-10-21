<?php
include 'conexion.php';
$conn = new conexion();
$conn = $conn->conectar();
$cedula = $_POST['cedula'];
$sqlDelete = "DELETE  FROM estudiantes WHERE estCedula= '$cedula'";

if ($conn->query($sqlDelete)==TRUE) {
    echo  json_encode("Se borro");
}else{
    echo json_encode("Fallo".$sqlDelete.$conn->error);
}

?>