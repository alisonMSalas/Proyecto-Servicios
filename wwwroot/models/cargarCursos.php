<?php
include 'conexion.php';

$sqlSelect = "SELECT * FROM cursos";
$conn = new conexion();
$conn = $conn->conectar();
$respuesta = $conn->query($sqlSelect);
$resultado= array();
if ($respuesta->num_rows >0) {
    while ($fila=$respuesta->fetch_array()) {
        array_push($resultado,$fila);
    }
}else{
    $resultado = "No hay cursos";
}

echo json_encode ($resultado);

?>
