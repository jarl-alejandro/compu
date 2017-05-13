<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$cargo = $_POST["cargo"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];

$empleado = $db->query("UPDATE empleados SET emp_nomb='$nombre', emp_emai='$email', emp_carg='$cargo',
                  emp_tele='$telefono', emp_dir='$direccion' WHERE emp_ced='$id'");


if ($empleado) {
  echo 201;
}
