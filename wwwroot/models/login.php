<?php

class Login{

    public static function login(){
        include_once 'conexion.php';
       

            $usuario= $_POST['nombre_user'];
            $pass= $_POST['contrasenia_user'];
            
        $sqlSelect= "SELECT * FROM usuarios WHERE nombre_user= '$usuario' AND contrasenia_user= '$pass'";

        $conn = new conexion();
        $conn = $conn->conectar();
        $respuesta = $conn->query($sqlSelect);
        $resultado = array();
        if ($respuesta->num_rows > 0) {
            $resultado = "Bienvenido";
        } else {
            $resultado = "No existe ese estudiante";
        }

        echo json_encode($resultado);
    }

}
