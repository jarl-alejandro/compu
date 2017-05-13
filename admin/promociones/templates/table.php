<?php
	//Importo la conexion de mysql
	include "../../../config/conexion_mysql.php";
	//Traigo de mysql todos los empleados
	$promociones = $db->query("SELECT * FROM promociones");
	$index = 0;
?>
<h3 class="center-align gray-text u-no-margin">PROM0CIONES</h3>
<div class="row center-xs BuscadorContainer">
	<div class="input-field col-xs-8">
		<input id="buscar" type="text" class="validate">
		<label for="buscar">Ingrese lo que desea buscar</label>
	</div>
</div>
<table class="bordered highlight centered responsive-table top-medium card" id="promociones-table">
	<thead>
		<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Cargo</th>
				<th></th>
		</tr>
	</thead>
	<tbody>
	<?php while ($row = $promociones->fetch()){
		$index++;
	?>
		<tr>
			<td><?= $index ?></td>
			<td><?= $row["prom_nom"] ?></td>
			<td>
				<button class="btn waves-effect waves-light cyan darken-2 verFoto" data-foto="<?= $row["prom_img"] ?>">
				    <i class="material-icons">remove_red_eye</i>
				</button>
        <button class="btn waves-effect waves-light blue darken-3 editar" data-id="<?= $row["prom_id"] ?>">
					<i class="material-icons">create</i>
				</button>
				<button class="btn waves-effect waves-light red eliminar" data-id="<?= $row["prom_id"] ?>">
					<i class="material-icons">delete_forever</i>
				</button>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<div class="row center-xs">
	<ul id="paginador" class="pagination"></ul>
</div>
<script src="app/promocion.js"></script>

<script>
	/*
	* Instacio la clase Pager y pagino la tabla
	*/
	var pager = new Pager('promociones-table', 5);
	 pager.init();
	 pager.showPageNav('pager', 'paginador');
	 pager.showPage(1);

	 /**
   * Aqui voy a llamar a funcion buscarEnTabla para busar en la table productos-table,
   */
  $('#buscar').keyup(function () {
    buscarEnTabla('promociones-table', 'buscar', 5)
  })
</script>
