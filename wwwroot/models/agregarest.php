<?php


class CrudI
{
    public static function guardarEstudiantes()
    {
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

        if ($conn->query($sqlInsert) == TRUE) {
            $dataJson = json_encode("Se inserto correctamente");
            print_r($dataJson);
        } else {

        }
        //header('Location: http://localhost/cuarto/index.php?action=contactanos');
    }

}
