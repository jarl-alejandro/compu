<?php
session_start();

include "../../config/conexion.php";

$email = $_POST["email"];
$password = sha1($_POST["password"]);

$login = $pdo->query("SELECT * FROM Emp2_P01_CLIENTE WHERE EMAIL='$email' AND USERPASS='$password'");

if ($login->rowCount() == 0) {
  echo 404;
}
else {
  $cliente = $login->fetch();
  $_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"] = $cliente["CI_RUC"];
  $_SESSION["4832ec78c988b19caba3064d548ebce5d09b86ed"] = $cliente["NOMBRE"];
  $_SESSION["a88b7dcd1a9e3e17770bbaa6d7515b31a2d7e85d"] = $cliente["EMAIL"];
  $_SESSION["18e0707ea726c45bd34d5bc7d12111c265a05010"] = $cliente["TIPOPRECIO"];
  echo 200;
}
