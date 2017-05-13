<?php
include "../config/conexion.php";

/**
*Obtengo los datos enviados por POST
* y los guardo con en la base de datos de SqlServer
*/

$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$sexo = $_POST["sexo"];
$password = sha1($_POST["password"]);

$clientExiste = $pdo->query("SELECT * FROM Emp2_P01_CLIENTE WHERE CI_RUC='$cedula'");


if ($clientExiste->rowCount() < 0) {
  echo 1;
  return false;
}

include "../config/conexion.php";

// guardo el cliente usando una sentencia prepara
$cliente = $pdo->prepare("INSERT INTO Emp2_P01_CLIENTE (CI_RUC, NOMBRE, EMAIL, TELEFONO, DIRECCION, SEXO, USERPASS)
									VALUES (?, ?, ?, ?, ?, ?, ?)");

//Ingreso los datos
$cliente->bindParam(1, $cedula);
$cliente->bindParam(2, $nombre);
$cliente->bindParam(3, $email);
$cliente->bindParam(4, $telefono);
$cliente->bindParam(5, $direccion);
$cliente->bindParam(6, $sexo);
$cliente->bindParam(7, $password);

//Guardo los datos a la tabla de sql
$cliente->execute();

$clienteX = $pdo->query("SELECT * FROM Emp2_P01_CLIENTE WHERE CI_RUC='$cedula'");
$rowX = $clienteX->fetch();
$xSec = $rowX['x_secuencia'];
$clienteX = $pdo->query("UPDATE Emp2_P01_CLIENTE SET ID_CLIENTE='$xSec' WHERE CI_RUC='$cedula'");

if($cliente) {
	echo 201;
}
