<?php
include '../../../config/conexion_mysql.php';

$id = $_POST["id"];

$query = $db->query("UPDATE pedido SET est_ped='facturado' WHERE cod_ped='$id'");
$detalle = $db->query("SELECT * FROM detalle_pedido WHERE cod_ped='$id'");

while($row = $query->fetch()) {
  $id = $row['prod_ped'];
  $cant = $row['cant_ped'];

  include "../../../config/conexion.php";
  $prod_query = $pdo->query("SELECT * FROM Emp2_P01_PROD WHERE ID_PROD='$id'");
  $prod = $prod_query->fetch();

  //$cant_prod = $prod[""];
}


if ($query) {
  echo 201;
}
