<?php

class CrudEd
{

    public static function editarEstudiante()
    {
        include 'conexion.php';
        parse_str(file_get_contents("php://input"), $_PUT);
        $conn = new Conexion();
        $conn = $conn->conectar();
        $cedula = $_GET['estCedula'];
        $nombre = $_PUT['estNombre'];
        $apellido = $_PUT['estApellido'];
        $direccion = $_PUT['estDireccion'];
        $telefono = $_PUT['estTelefono'];
        $curId = $_PUT['curId'];
        $sqlEditar = "UPDATE estudiantes SET estNombre='$nombre',estApellido='$apellido',
        estTelefono='$telefono',estDireccion='$direccion',curId='$curId' WHERE estCedula = '$cedula'";

        if ($conn->query($sqlEditar) == TRUE) {
            $data = json_encode("Se edito Correctamente");
            print_r($data);
        } else {
            $data = json_encode("Error");
            print_r($data);
        }

    }
}





