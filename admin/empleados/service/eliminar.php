<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";

$id = $_POST["id"];

$empleado = $db->query("DELETE FROM empleados WHERE emp_ced='$id' LIMIT 1");


if ($empleado) {
  echo 201;
}
