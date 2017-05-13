<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";
include "../../helpers_admin.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$cargo = $_POST["cargo"];
$detalle = $_POST["detalle"];
$is_imagen = $_POST["is_imagen"];

if($is_imagen == 0){
  $equi = $db->query("UPDATE equipo SET equi_nombre='$nombre', equi_cargo='$cargo', equi_det='$detalle'
                        WHERE equi_id='$id'");
}
else {
  //Otengo un producto para imagen
  $codigo = getCode('cont_img_conf', 'IM');
  updateCodigo('cont_img_conf');

  // Llago a la funcio upload_image para que cargue a iamgen que se envio, cambien su producto y la guarde dentro
  // de la carpeta media -> promociones
  $img = upload_image($codigo, "promociones");

  $equi = $db->query("UPDATE equipo SET equi_nombre='$nombre', equi_cargo='$cargo', equi_det='$detalle',
                      equi_img='$img' WHERE equi_id='$id'");
}


if ($equi) {
  echo 201;
}
