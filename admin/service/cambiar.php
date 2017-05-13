<?php
session_start();
//Importo la conexion de mysql
include "../../config/conexion_mysql.php";

$id = $_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"];
$password = sha1($_POST["password"]);

$query = $db->query("UPDATE empleados SET emp_pass='$password' WHERE emp_ced='$id'");

if ($query) {
  echo 201;
}
