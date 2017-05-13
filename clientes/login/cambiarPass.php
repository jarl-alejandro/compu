<?php session_start();
include "../../config/conexion.php";

$cedula = $_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"];
$password = sha1($_POST['password']);

$update = $pdo->query("UPDATE Emp2_P01_CLIENTE SET USERPASS='$password' WHERE CI_RUC='$cedula'");

if ($update) {
  echo 200;
}
