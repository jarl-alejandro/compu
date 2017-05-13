<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";

//Obtengo el id del pedido
// creo una array pedidos donde almacenara los pediso del cliente
//para ser enviados por JSON
$id = $_POST['id'];
$pedidos = array();

//Hago un query para tener los detalles de un pedido en concreto
//y los recorro con un while y los alamcenos el array pedidos
$query = $db->query("SELECT * FROM detalle_pedido WHERE cod_ped='$id'");

while($row = $query->fetch()) {
  $pedidos[] = $row;
}

// codifico el array en un objeto JSON para que javascript pueda manejarlo de una mejor manera
$json = json_encode($pedidos);
print $json;