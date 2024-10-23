<?php

class Buscar
{

    public static function buscarEstudiante($cedula)
    {
        include_once "conexion.php";
        $sqlSelect = "select e.estCedula, e.estNombre,e.estApellido,e.estTelefono,e.estDireccion,c.curNombre,e.curId from estudiantes as e inner join cursos as c on e.curId = c.curId where e.estCedula='$cedula'";
        $conn = new conexion();
        $conn = $conn->conectar();
        $respuesta = $conn->query($sqlSelect);
        $resultado = array();
        if ($respuesta->num_rows > 0) {
            while ($fila = $respuesta->fetch_array()) {
                array_push($resultado, $fila);
            }
        } else {
            $resultado = "No existe ese estudiante";
        }

        echo json_encode($resultado);
    }
}