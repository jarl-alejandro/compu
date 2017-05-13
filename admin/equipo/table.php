<?php
	//Importo la conexion de mysql
	include "../../config/conexion_mysql.php";
	//Traigo de mysql todos los empleados
	$equipos = $db->query("SELECT * FROM equipo");
	$index = 0;
?>
<h3 class="center-align gray-text u-no-margin">NUESTRO EQUIPO DE TRABAJO</h3>
<div class="row center-xs BuscadorContainer">
	<div class="input-field col-xs-8">
		<input id="buscar" type="text" class="validate">
		<label for="buscar">Ingrese lo que desea buscar</label>
	</div>
</div>
<table class="bordered highlight centered responsive-table top-medium card" id="equipo-table">
	<thead>
		<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Cargo</th>
				<th></th>
		</tr>
	</thead>
	<tbody>
	<?php while ($row = $equipos->fetch()){
		$index++;
	?>
		<tr>
			<td><?= $index ?></td>
			<td><?= $row["equi_nombre"] ?></td>
			<td><?= $row["equi_cargo"] ?></td>
			<td>
				<button class="btn waves-effect waves-light blue darken-3 editar" data-id="<?= $row["equi_id"] ?>">
					<i class="material-icons">create</i>
				</button>
				<button class="btn waves-effect waves-light red eliminar" data-id="<?= $row["equi_id"] ?>">
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
<script src="app/equipo.js"></script>

<script>
	/*
	* Instacio la clase Pager y pagino la tabla 
	*/
	var pager = new Pager('equipo-table', 5); 
	 pager.init(); 
	 pager.showPageNav('pager', 'paginador'); 
	 pager.showPage(1);

	 /**
   * Aqui voy a llamar a funcion buscarEnTabla para busar en la table productos-table,
   */
  $('#buscar').keyup(function () {
    buscarEnTabla('equipo-table', 'buscar', 5)
  })
</script>