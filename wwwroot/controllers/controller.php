<?php
class MvcController
{
    public function plantilla(){
        include "views/plantilla.php";
    }


    public function enlacesPaginasController()
    {
        if (isset ($_GET["action"])) {
            $enlacesController = $_GET["action"];
        }else{
            $enlacesController = "inicio.php";
        }
        $respuesta = EnlacePaginas::enlacePaginasModel($enlacesController);
        include $respuesta;
    }
}
?>