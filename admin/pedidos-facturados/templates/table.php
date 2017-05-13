<?php
	//Importo la conexion de mysql
	include "../../../config/conexion_mysql.php";

	//Hago un query para obtener todos los peddos y mostarlos al empleado
	$pedidos = $db->query("SELECT * FROM pedido WHERE est_ped='facturado'");
	$index = 0;
?>
<div class="row center-xs full-width">
	<table class="col-xs-10 z-depth-1 bordered highlight responsive-table" id="productos-table">
		<thead>
			<tr>
				<th>#</th>
				<th>CEDULA</th>
				<th>CLIENTE</th>
				<th>TOTAL</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = $pedidos->fetch()){
				$index++;
			?>
			<tr>
				<td><?= $index ?></td>
				<td><?= $row['clien_ped'] ?></td>
				<td><?= $row['nom_ped'] ?></td>
				<td><?= number_format($row['tot_ped'], 2) ?></td>
				<td>
          <button class="waves-effect waves-light btn blue darken-3 ver-pedido"
						data-id="<?= $row['cod_ped'] ?>" data-estado="<?= $row['est_ped'] ?>">Ver Pedido</button>
        </td>
			</tr>
			<?php	} ?>
		</tbody>
	</table>
</div>
<div class="row center-xs full-width">
	<ul id="paginador" class="pagination"></ul>
</div>
<script src="app/poo.js"></script>
<script src="app/table.js"></script>
<script>
	/*
	* Instacio la clase Pager y pagino la tabla
	*/
	var pager = new Pager('productos-table', 5);
	 pager.init();
	 pager.showPageNav('pager', 'paginador');
	 pager.showPage(1);

	 /**
   * Aqui voy a llamar a funcion buscarEnTabla para busar en la table productos-table,
   */
  $('#buscar').keyup(function () {
    buscarEnTabla('productos-table', 'buscar', 5)
  })
</script>
