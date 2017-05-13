<?php
	/*
		Importo la conexion, obtengo los productos.
		Creo una variable index para el contador, una para el nombre de la pagina.
		Importo los componetes head y menu.
			head.php contiene en encabezado de la pagina y llama los archivos css

		* Llamo a la conexion de la db y hago el query para obetener todos los productos
	*/
	include "./config/conexion.php";
	$prod = $pdo->query("SELECT * FROM Emp2_P01_PROD");

	/*
		* Llamo a la conexion de la db y hago el query para obetener todos los grupo
	*/
	include "./config/conexion.php";
	$grupos = $pdo->query("SELECT * FROM Emp2_P01_GRUPOPR");

	/*
		* Llamo a la conexion de la db y hago el query para obetener todas las lineas
	*/
	include "./config/conexion.php";
	$lineas = $pdo->query("SELECT * FROM Emp2_P01_LINEA");

	$index = 0;
	$title = "Productos";
	include "./head.php";
	include "./menu.php";

	if (isset($_SESSION["18e0707ea726c45bd34d5bc7d12111c265a05010"])) {
		$precioCliente = $_SESSION["18e0707ea726c45bd34d5bc7d12111c265a05010"];
	}
	else {
		$precioCliente = 0;
	}

  include "./config/conexion_mysql.php";
?>
  <style>
    main{
    	margin-top: 2em !important;
    }
    .input-field label:not(.label-icon).active{
	    transform: translateY(-85%);
    }
  </style>
	<h3 class="center-align gray-text u-no-margin full-width Productos-title"
		style="font-size: 1.7em;">Productos disponibles</h3>
  <!-- <div class="notify-pedidos notify-left z-depth-2">
    <p>Seleciona los pedidos que deseas</p> -->
  </div>
  <?php
  /* Pregunto si el cliente no esta logueado el muestro el mensaje
  if (!isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])){ ?>
    <div class="notify-pedidos notify-right z-depth-2">
      <p>Para hacer sus pedidos debe iniciar sesión</p>
    </div>
  <?php } */?>

	<section class="row center-xs" style="width: 95%;margin: 0 auto !important;">
		<div class="input-field col-md-4 col-xs-11">
			<select id="lineaSelect">
				<option value="" disabled selected>Selecione la linea que desee</option>
				<option value="todos">Todos</option>
				<?php
				// Recorro el query $lineas para mostrar las lineas en el select
				while($linea = $lineas->fetch()){ ?>
					<option value="<?= $linea['ID'] ?>"><?= $linea['NOMBRE'] ?></option>
				<?php } ?>
			</select>
			<label>Lineas (Selecione la linea)</label>
		</div>

		<div class="input-field col-md-4 col-xs-11" id="container-grupos">
			<select id="gruposSelect">
				<option value="" disabled selected>Selecione el Grupo que desee</option>
				<?php
				// Recorro el query $lineas para mostrar los grupos en el select
				while($grupo = $grupos->fetch()){ ?>
					<option value="<?= $grupo['ID_GRUPO'] ?>"><?= $grupo['NOMBRE'] ?></option>
				<?php } ?>
			</select>
			<label>Grupos (Selecione el grupo)</label>
		</div>

		<div class="input-field col-xs-11 col-md-4">
			<input id="buscar" type="text" class="validate">
			<label for="buscar" class="labelBusar">Ingrese el nombre del producto para adquirir</label>
		</div>
	</section>


	<div class="row center-xs full-width">
		<table class="col-xs-10 z-depth-1 bordered highlight responsive-table" id="productos-table">
			<thead>
				<tr>
					<th>PRODUCTO</th>
					<th>PRECIO</th>
					<?php if (isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])){ ?>
						<th></th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php
				// Recoros el query $prod para mostar los producos en la tabla
				while($row = $prod->fetch()){
					$index++;
          $idProd = $row["ID_PROD"];
          $promo = $db->query("SELECT * FROM promociones WHERE prom_prod='$idProd'");

				?>
				<tr data-grupo="<?= $row['GRUPO'] ?>">
					<td><?= $row['DESCRIP'] ?></td>

					<td><?php
            if ($promo->rowCount() == 0) {
              if($precioCliente == 0 || $precioCliente == 1) {
                $precio = number_format($row['PRECIO1U'], 2);
              }
              else if($precioCliente == 2) {
                $precio = number_format($row['PRECIO2U'], 2);
              }
              else if($precioCliente == 3) {
                $precio = number_format($row['PRECIO3U'], 2);
              }
              else if($precioCliente == 4) {
                $precio = number_format($row['PRECIO4U'], 2);
              }
            }
            else {
              $precio = $row['PRECIO4U'];
            }

						echo number_format($precio, 2);
					?></td>

					<?php if (isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])){ ?>
						<td><a class="waves-effect waves-light btn light-blue darken-3 agregar-carrito"
								data-id="<?= $row['ID_PROD'] ?>" 	data-nombre="<?= $row['DESCRIP'] ?>"
								data-precio="<?=  number_format($precio, 2)  ?>">
							<i class="material-icons left">add_shopping_cart</i>Enviar a canasta</a>
						</td>
					<?php } ?>
				</tr>
				<?php	} ?>
			</tbody>
		</table>
	</div>
	<div class="row center-xs full-width">
		<ul id="paginador" class="pagination"></ul>
	</div>
</main>
<?php
// Importo el footer que tiene los cierres de html y body. llamos los archivos de javascript
	include "./footer.php";
?>
<script src="productos/index.js"></script>
<script>
	/*
	* Instacio la clase Pager y pagino la tabla
	*/
	var pager = new Pager('productos-table', 5);
	 pager.init();
	 pager.showPageNav('pager', 'paginador');
	 pager.showPage(1);
</script>
</body>
</html>
