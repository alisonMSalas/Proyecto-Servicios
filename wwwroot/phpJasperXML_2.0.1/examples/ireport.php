<?php
include "main.php";

use simitsdk\phpjasperxml\PHPJasperXML;

// Ruta del archivo JRXML
$filename = 'C:/xampp/htdocs/cuarto/reportes/ReportesEstudiantes.jrxml';

// Consulta de la Base de Datos
try {
    $dbh = new PDO('mysql:host=localhost;dbname=cuarto', 'root', '');
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

$stmt = $dbh->prepare("SELECT estudiantes.estCedula, estudiantes.estNombre,estudiantes.estApellido, estudiantes.estTelefono , estudiantes.estDireccion , estudiantes.curId , cursos.curNombre from estudiantes, cursos where estudiantes.curId=cursos.curId");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Configuración de la fuente de datos
$config = ['driver' => 'array', 'data' => $data];

// Crear una instancia de PHPJasperXML y procesar el informe
$report = new PHPJasperXML();
$report->load_xml_file($filename)    
    ->setDataSource($config)
    ->export('Pdf');