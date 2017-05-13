<?php
	/*
		Importo la conexion, obtengo los productos.
		Creo una variable index para el contador, una para el nombre de la pagina.
		Importo los componetes head y menu.
			head.php contiene en encabezado de la pagina y llama los archivos css

		* Llamo a la conexion de la db y hago el query para obetener todos los productos
	*/
	include "./config/conexion_mysql.php";
	$promociones = $db->query("SELECT * FROM promociones");

	$title = "Promociones";
	include "./head.php";
	include "./menu.php";
?>
<style>
  .brand-logo{
    position: absolute;
  }
  main{
    margin-top: 0 !important;
    position: fixed;
    top: 13em;
  }
</style>
<h3 class="center-align gray-text u-no-margin full-width Productos-title"
  style="font-size: 1.7em;">
  Productos en promocion
</h3>
<section class="Promociones">
  <?php
  if ($promociones->rowCount() == 0) {
    echo '<style>.Promociones{display: block}</style>
    <h3 class="Productos-title NoahyProm">No hay promociones</h3>';
  }
  while ($row = $promociones->fetch()){ ?>
    <article class="PromocionesItem">
      <figure class="z-depth-3 PromocionesFigure">
        <img src="media/promociones/<?= $row['prom_img'] ?>" alt="<?= $row['prom_nom'] ?>">
      </figure>
      <h5 class="PromocionesItem-item"><?= $row['prom_nom'] ?></h5>
      <h5 class="PromocionesItem-precio">$ <?= $row['prom_prec'] ?></h5>
    </article>
  <?php }  ?>
</section>
</main>

<?php
// Importo el footer que tiene los cierres de html y body. llamos los archivos de javascript
	include "./footer.php";
?>
</body>
</html>
