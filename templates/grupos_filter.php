<?php
  $id = $_GET["id"];
  /*
		* Llamo a la conexion de la db y hago el query para filtar todo los grupos por la linea que pidio
	*/
	include "../config/conexion.php";

  if ($id == "todos") {
	  $grupos = $pdo->query("SELECT * FROM Emp2_P01_GRUPOPR");
  }
  else {
	  $grupos = $pdo->query("SELECT * FROM Emp2_P01_GRUPOPR WHERE ID_LINEA='$id'");
  }
	
?>

<select id="gruposSelect">
  <option value="" disabled selected>Selecione el Grupo que desee</option>
  <?php 
  // Recorro el query $lineas para mostrar los grupos en el select 
  while($grupo = $grupos->fetch()){ ?>
    <option value="<?= $grupo['ID_GRUPO'] ?>"><?= $grupo['NOMBRE'] ?></option>
  <?php } ?>
</select>
<label>Grupos</label>