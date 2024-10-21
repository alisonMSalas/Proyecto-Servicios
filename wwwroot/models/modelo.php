<?php
    class EnlacePaginas{
        public static function enlacePaginasModel($enlacesModel){
            if ($enlacesModel == "nosotros" || $enlacesModel == "servicios" ||
             $enlacesModel == "contactanos" ) {
                $module = "views/interfaces/".$enlacesModel.".php";
            
            }else{
                $module = "views/interfaces/inicio.php";
            }
            return $module;
        }
    }
    
?>
