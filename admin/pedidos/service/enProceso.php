<?php
include '../../../config/conexion_mysql.php';

$id = $_POST["id"];

$query = $db->query("UPDATE pedido SET est_ped='enProceso' WHERE cod_ped='$id'");

if ($query) {
  echo 201;
}
