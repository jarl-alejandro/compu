<?php
//Importo los componetes head
	include "../head.php";
	//Importo la conexion de SqlServer
  include "../../config/conexion.php";
  $prod = $pdo->query("SELECT * FROM Emp2_P01_PROD");

?>
<div class="loadImage full-width full-height center-flex">
  <a class="waves-effect waves-light btn-flat closeImage"><i class="material-icons">clear</i></a>
  <section class="">
    <img src="" class="loadImage-img">
  </section>
</div>
<!-- FormEquipo -->
<section class="containerForm">
	<form class="row col-xs-10 col-md-8 col-xs-1 card PromocionForm full-width" style="margin: 0 auto !important;">
		<h4 class="EquipoForm-title col-xs-12 center-align">Promocion</h4>

    <div class="input-field col-xs-12">
      <select id="producto">
        <option value="" disabled selected>Seleciona el producto</option>
        <?php while ($row = $prod->fetch()) { ?>
          <option value="<?= $row['ID_PROD'] ?>" data-precio='<?= $row['PRECIO4U'] ?>'><?= $row['DESCRIP'] ?></option>
        <?php } ?>
       </select>
			<label for="producto">Producto (promocion)</label>
		</div>

		<div class="row center-xs file-field input-field col-xs-6" style="padding-bottom:1em;align-items:center;">
			<div class="btn blue">
				<span><i class="material-icons">account_box</i></span>
				<input type="file" id="foto-promocion">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate nombre-imagen" type="hidden">
			</div>
		</div>
    <div class="col-xs-12 col-md-6">
			<img class="foto-producto">
		</div>
		<div class="row center-xs col-xs-12">
			<button class="waves-effect waves-light btn red" id="close-promocion" style="margin-right:1em;">
				<i class="material-icons left">close</i>Cerrar
			</button>
			<button class="waves-effect waves-light btn blue" id="guardar-promocion" data-type="guardar" data-id="">
				<i class="material-icons left">send</i>Guardar
			</button>
		</div>
	</form>
</section>
<!-- /FormEquipo -->
<section class="col-xs-10 col-xs-offset-1" id="table-container"></section>
<a class="btn-floating btn-large waves-effect waves-light blue darken-3" id='showForm'>
	<i class="material-icons">add</i>
</a>
</main>
<?php
// Importo el footer que llamo los archivos de javascript
	include "../footer.php";
?>
<script src="app/index.js"></script>
</body>
</html>
