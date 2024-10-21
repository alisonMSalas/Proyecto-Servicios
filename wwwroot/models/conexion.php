<?php

class Conexion
{
  private $serverName = "soa-quinto.database.windows.net";
  private $database = "soa-quinto";
  private $username = "servicios";
  private $password = "994enWTBye6xePhV";

  public function conectar()
  {
    $connectionOptions = array(
      "Database" => $this->database,
      "Uid" => $this->username,
      "PWD" => $this->password
    );

    // Establecer la conexión
    $conn = sqlsrv_connect($this->serverName, $connectionOptions);

    // Verificar si la conexión fue exitosa
    if ($conn === false) {
      die(print_r(sqlsrv_errors(), true));
    }
    return $conn;
  }
}