<?php
include 'conexion.php';

function ObtenerEstudiantes()
{
    $sql = "SELECT * FROM estudiantes";
    $con = new Conexion();
    $con = $con->conectar();
    $res = $con->query($sql);
    $lista = array();

    if ($res->num_rows > 0) {
        while ($fila = $res->fetch_array()) {
            array_push($lista, $fila);
        }
    }
    return $lista;
}

function ObtenerCursos()
{
    $sqlSelect = "SELECT * FROM cursos";
    $conn = new conexion();
    $conn = $conn->conectar();
    $respuesta = $conn->query($sqlSelect);
    $lista = array();

    if ($respuesta->num_rows>0){
        while ($fila = $respuesta->fetch_array()) {
            array_push($lista,$fila);
        }
    }
    return $lista;
}
