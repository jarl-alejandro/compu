<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";

//Obtengo los datos del empleado
$id = $_POST["id"];
$eliminar = $db->query("DELETE FROM promociones WHERE prom_id='$id'");

if ($eliminar) {
  echo 201;
}
