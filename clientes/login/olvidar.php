<?php
include "../../config/conexion.php";

$email = $_POST['email'];
$cliente = $pdo->query("SELECT * FROM Emp2_P01_CLIENTE WHERE EMAIL='$email'");

if ($cliente->rowCount() == 0) {
  echo 404;
}
else {
  $row = $cliente->fetch();
  $cedula = $row['CI_RUC'];
  $cedulaFormat = trim($cedula);
  $password = sha1($cedulaFormat);

  include "../../config/conexion.php";
  $update = $pdo->query("UPDATE Emp2_P01_CLIENTE SET USERPASS='$password' WHERE CI_RUC='$cedula'");

  if ($update) {
    echo 200;
  }
}
