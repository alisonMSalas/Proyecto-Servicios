<?php

/*class Conexion
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

    // Establecer la conexi�n
    $conn = sqlsrv_connect($this->serverName, $connectionOptions);

    // Verificar si la conexi�n fue exitosa
    if ($conn === false) {
      die(print_r(sqlsrv_errors(), true));
    }
    return $conn;
  }
}*/


class Conexion
{
  private $serverName = "sql10.freesqldatabase.com";
  private $database = "sql10740207";
  private $username = "sql10740207";
  private $password = "KPTwlzju9n";

  public function conectar()
  {
    // Establecer la conexión
    $conn = new mysqli($this->serverName, $this->username, $this->password, $this->database);

    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
    }

    return $conn;
  }
}
