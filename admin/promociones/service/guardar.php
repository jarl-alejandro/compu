<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";
include "../../helpers_admin.php";

//Obtengo los datos de la promocion
$producto = $_POST["producto"];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$is_imagen = $_POST["is_imagen"];

$promo_count = $db->query("SELECT * FROM promociones WHERE prom_prod='$producto'");

if ($promo_count->rowCount() >  0) {
  echo 1;
  return false;
}

//Otengo un producto para imagen
$codigo = getCode('cont_img_conf', 'IM');
updateCodigo('cont_img_conf');

// Llago a la funcio upload_image para que cargue a iamgen que se envio, cambien su producto y la guarde dentro
// de la carpeta media -> promociones
$img = upload_image($codigo, "promociones");

//haga una setencia prepara para guardar el empleado
$promocion = $db->prepare("INSERT INTO promociones (prom_prod, prom_nom, prom_img, prom_prec) 
                          VALUES (?, ?, ?, ?)");

//Inserto los datos del empleado
$promocion->bindParam(1, $producto);
$promocion->bindParam(2, $nombre);
$promocion->bindParam(3, $img);
$promocion->bindParam(4, $precio);

//Guardo el empleado en la db
$promocion->execute();

if ($promocion) {
  echo 201;
}
