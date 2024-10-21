<?php
include 'conexion.php';

$sqlSelect = "SELECT e.estCedula, 
        e.estNombre, 
        e.estApellido, 
        e.estTelefono, 
        e.estDireccion, 
        c.curNombre,
        e.curId
        FROM estudiantes e
        JOIN cursos c ON e.curId = c.curId";

$con = new Conexion();
$conn = $con->conectar();

$resultado = array();

if ($conn) {
    $stmt = sqlsrv_query($conn, $sqlSelect);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    while ($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        array_push($resultado, $fila);
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}

print_r(json_encode($resultado));

?>
