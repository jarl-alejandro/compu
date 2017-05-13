<?php
include "../config/conexion_mysql.php";

/*
* Creamos un codigo dinamico
*/
function getCode ($campo, $serie) {
  global $db;
  $query = $db->query("SELECT * FROM config WHERE id_config=1");
  $config = $query->fetch();

  $contador = $config[$campo];
  $contador++;

  $codigo = $serie."-00".$contador;
  return $codigo;
}
/*
* Actualizamos el codigo dinamico
*/
function updateCodigo ($campo) {
  global $db;

  $query = $db->query("SELECT * FROM config WHERE id_config=1");
  $config = $query->fetch();

  $contador = $config[$campo];
  $contador++;

  $query = $db->query("UPDATE config SET $campo='$contador' WHERE id_config=1");
}

// Funcion para obtener subir imgagen y cambiarle el nombre
function upload_image ($codeImage, $routeImage) {
  $imagen = $_FILES['imagen']['name'];
  $imagen = $codeImage . ".png";
  $ruta = $_FILES["imagen"]["tmp_name"];
  $destino = "../../../media/$routeImage/$imagen";

  copy($ruta, $destino);
  return $imagen;
}
