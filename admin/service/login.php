<?php
session_start();
//Importo la conexion de mysql
include "../../config/conexion_mysql.php";

$email = $_POST["email"];
$password = sha1($_POST["password"]);

$query = $db->query("SELECT * FROM empleados WHERE emp_emai='$email' AND emp_pass='$password'");

if ($query->rowCount() == 0) {
  echo 404;
}
else {
  $empleado = $query->fetch();
  $_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"] = $empleado["emp_ced"];
  $_SESSION["4832ec78c988b19caba3064d548ebce5d09b86ed"] = $empleado["emp_nomb"];
  $_SESSION["a88b7dcd1a9e3e17770bbaa6d7515b31a2d7e85d"] = $empleado["emp_emai"];
  $_SESSION["e0d6ae5cf2a2d0c1075943593a36cc5377382a05"] = $empleado["emp_carg"];
  $_SESSION["18e0707ea726c45bd34d5bc7d12111c265a05010"] = "empleado";

  echo 200;
}
