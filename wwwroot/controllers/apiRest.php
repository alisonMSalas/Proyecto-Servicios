<?php
//REQUESTMETHOD (GER,PUT,POST;DELETE)
include '../models/acceder.php';
include '../models/agregarest.php';
include '../models/borrar.php';
include '../models/editar.php';
include '../models/buscar.php';
include '../models/cargarCursos.php';
$opc = $_SERVER['REQUEST_METHOD'];

switch ($opc) {
    case 'GET':
        if (isset($_GET['estCedula'])) {
            Buscar::buscarEstudiante($_GET['estCedula']);
        } elseif (isset($_GET['cursos'])) {
            crudC::cargarCursos(); // Llamar al método que obtiene los cursos
        } else {
            CrudEstudiantes::seleccionarEstudiantes();
        }
        break;
    case 'POST':
        CrudI::guardarEstudiantes();
        break;
    case 'DELETE':
        CrudD::eliminarEstudiante();
        break;
    case 'PUT':
        CrudEd::editarEstudiante();
        break;
    default:

        break;
}
