<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";


//Obtengo el id del POST del emleado
$id = $_POST["id"];


//Hago una setencia sql para obtener el empleado
$integrante = $db->query("SELECT * FROM equipo WHERE equi_id='$id'");
$row = $integrante->fetch();

//La codifico para que pueda ser enviada al javascript
print json_encode($row);
