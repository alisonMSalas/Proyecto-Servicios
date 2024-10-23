<?php

class Login{

    public static function login(){
        include_once 'conexion.php';
        $con = new Conexion();
        $conn = $con->conectar();

            $usuario= $_POST['nombre_user'];
            $pass= $_POST['contrasenia_user'];
            
        $sql= "SELECT * FROM usuarios WHERE nombre_user= '$usuario' AND contrasenia_user= '$pass'";

        $result= $conn->prepare($sql);

        $dato= $result->execute();
        
        $resultado = array();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_array()) {
                array_push($resultado, $fila);
            }
        } else {
            $resultado = "No existe ese usuario";
        }

        echo json_encode($resultado);
    }

}
