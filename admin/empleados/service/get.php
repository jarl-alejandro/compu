<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";

$id = $_POST["id"];

$empl = $db->query("SELECT * FROM empleados WHERE emp_ced='$id'");
$row = $empl->fetch();

print json_encode($row);
