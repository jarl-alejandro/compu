<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";

$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$cargo = $_POST["cargo"];
$password = sha1($cedula);
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];

$employeExist = $db->query("SELECT * FROM empleados WHERE emp_ced='$cedula'");

if($employeExist->rowCount() > 0) {
  echo 1;
  return false;
}

$empleado = $db->prepare("INSERT INTO empleados (emp_ced, emp_nomb, emp_emai, emp_carg, emp_pass, emp_tele,
                          emp_dir) VALUES (?, ?, ?, ?, ?, ?, ?)");

$empleado->bindParam(1, $cedula);
$empleado->bindParam(2, $nombre);
$empleado->bindParam(3, $email);
$empleado->bindParam(4, $cargo);
$empleado->bindParam(5, $password);
$empleado->bindParam(6, $telefono);
$empleado->bindParam(7, $direccion);

$empleado->execute();

if ($empleado) {
  echo 201;
}
