<?php

class CrudD
{
    public static function eliminarEstudiante()
    {
        include 'conexion.php';
        $conn = new conexion();
        $conn = $conn->conectar();
        $cedula = $_GET['estCedula'];
        $sqlDelete = "DELETE  FROM estudiantes WHERE estCedula= '$cedula'";

        if ($conn->query($sqlDelete) == TRUE) {
            $dataJSon = json_encode("se elimino correctamente");
            print_r($dataJSon);
        } else {
            $dataJSon = json_encode("NO SE elimino correctamente");
            print_r($dataJSon);
        }
    }

}
