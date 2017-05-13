<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$query = $db->query("SELECT * FROM pedido WHERE cod_ped='$id'");


echo "Hay un nuevo pedido";
flush();