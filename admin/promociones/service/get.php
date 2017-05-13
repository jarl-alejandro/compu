<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";

//Obtengo el id del POST del emleado
$id = $_POST["id"];


//Hago una setencia sql para obtener la promocion
$promocion = $db->query("SELECT * FROM promociones WHERE prom_id='$id'");
$row = $promocion->fetch();

//La codifico para que pueda ser enviada al javascript
print json_encode($row);
