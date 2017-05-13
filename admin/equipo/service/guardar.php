<?php
//Importo la conexion de mysql
include "../../../config/conexion_mysql.php";
include "../../helpers_admin.php";

//Obtengo los datos del empleado
$nombre = $_POST["nombre"];
$cargo = $_POST["cargo"];
$detalle = $_POST["detalle"];
$is_imagen = $_POST["is_imagen"];

//Otengo un nombre para imagen
$codigo = getCode('cont_img_conf', 'IM');
updateCodigo('cont_img_conf');

// Llago a la funcio upload_image para que cargue a iamgen que se envio, cambien su nombre y la guarde dentro
// de la carpeta media -> equipo
$img = upload_image($codigo, "equipo");

//haga una setencia prepara para guardar el empleado
$equi = $db->prepare("INSERT INTO equipo (equi_nombre, equi_cargo, equi_det, equi_img) VALUES (?, ?, ?, ?)");

//Inserto los datos del empleado
$equi->bindParam(1, $nombre);
$equi->bindParam(2, $cargo);
$equi->bindParam(3, $detalle);
$equi->bindParam(4, $img);

//Guardo el empleado en la db
$equi->execute();

if ($equi) {
  echo 201;
}