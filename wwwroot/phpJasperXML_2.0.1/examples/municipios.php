<?php
require __DIR__."/../phpJasperXML_2.0.1/autoload.php";

use simitsdk\phpjasperxml\PHPJasperXML;

// Notificar solamente errores de ejecución
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR | E_PARSE);

$filename = __DIR__.'/municipios.jrxml';

/*
$config = [
    'driver'=>'array',
    'data'=>[ 
        ['user_id'=>0, 'fullname' => 'name1','email'=>'email1@a.com','gender'=>'M' ], 
        ['user_id'=>1, 'fullname' => 'name2','email'=>'email2@a.com','gender'=>'F' ], 
        ['user_id'=>2, 'fullname' => 'name3','email'=>'email3@a.com','gender'=>'M' ], 
        ]
];
*/

$config = [
    'driver'=>'mysql',
    'host'=>'127.0.0.1',
    'user'=>'root',
    'pass'=>'humanes',
    'name'=>'runner_reports',
];

$parameters = [];
/*
$parameters = [

    'idProcess'=> 1,
    'tableStatus'=> "EX04_STATUS",
    'language'=> "Spanish"
];
*/
$type = 'Pdf';
$fileOutput= '';
// $fileOutput= __DIR__.'/<name of file>';
$creator = 'FHumanes';
$author = 'fernandohumanes@gmail.com';
$title = 'Nombre del listado';
$keywords = 'PHPRunner';
$format_intl = 'es_ES';

$report = new PHPJasperXML();
$report->load_xml_file($filename)    
    ->setParameter($parameters)
    ->setDataSource($config)
    ->export($type,$fileOutput,$title,$creator,$author,$keywords,$format_intl);
 //   ->export('Pdf');

