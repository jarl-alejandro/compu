<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";

//Obtengo el id del empleado
$id = $_POST["id"];


// Hago un setencia sql para que elimine el empleado
$delete = $db->query("DELETE FROM equipo WHERE equi_id='$id'");

if ($delete) {
  echo 200;
}