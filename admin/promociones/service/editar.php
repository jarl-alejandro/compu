<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";
include "../../helpers_admin.php";

//Obtengo los datos del empleado
$id = $_POST["id"];
$producto = $_POST["producto"];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$is_imagen = $_POST["is_imagen"];

//Pregunto si no existe la imagen no la subo y si existe subo la imagen y actualizo
if($is_imagen == 0){
  $promocion = $db->query("UPDATE promociones SET prom_prod='$producto', prom_nom='$nombre',
    prom_prec='$precio' WHERE prom_id='$id'");
}
else {
  $codigo = getCode('cont_img_conf', 'IM');
  updateCodigo('cont_img_conf');
  $img = upload_image($codigo, "promociones");

  $promocion = $db->query("UPDATE promociones SET prom_prod='$producto', prom_nom='$nombre',
                          prom_img='$img', prom_prec='$precio' WHERE prom_id='$id'");
}


if ($promocion) {
  echo 201;
}
