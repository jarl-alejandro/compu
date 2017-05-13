<?php
include '../../../config/conexion_mysql.php';

$empleados = $db->query("SELECT * FROM empleados");
$index = 0;
?>
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
        <th>Cedula</th>
				<th>Nombre</th>
				<th>Cargo</th>
				<th></th>
		</tr>
	</thead>
	<tbody>
	<?php while ($row = $empleados->fetch()){
		$index++;
	?>
		<tr>
			<td><?= $index ?></td>
      <td><?= $row["emp_ced"] ?></td>
			<td><?= $row["emp_nomb"] ?></td>
			<td><?= $row["emp_carg"] ?></td>
			<td>
				<button class="btn waves-effect waves-light blue darken-3 editar" data-id="<?= $row["emp_ced"] ?>">
					<i class="material-icons">create</i>
				</button>
				<button class="btn waves-effect waves-light red eliminar" data-id="<?= $row["emp_ced"] ?>">
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
<script src="app/app.js"></script>

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
