<?php
//Importo los componetes head
	include "../head.php";
	//Importo la conexion de mysql
	include "../../config/conexion_mysql.php";
?>
<!-- FormEquipo -->
<section class="containerForm">
	<form class="row col-xs-10 col-md-8 col-xs-1 card EquipoForm full-width" style="margin: 0 auto !important;">
		<h4 class="EquipoForm-title col-xs-12 center-align">Nuevo Integrante</h4>
		<div class="input-field col-xs-12 col-md-6">
			<input id="nombre" type="text" class="validate">
			<label for="nombre">Ingreso el nombre completo</label>
		</div>
		<div class="input-field col-xs-12 col-md-6">
			<input id="cargo" type="text" class="validate">
			<label for="cargo">Ingreso el cargo</label>
		</div>
		<div class="input-field col-xs-12 col-md-6">
			<textarea id="detalle" class="materialize-textarea"></textarea>
			<label for="detalle">Ingreso una descripcion</label>
		</div>
		<div class="col-xs-12 col-md-6">
			<img class="foto-equipo">
		</div>
		<div class="row center-xs file-field input-field col-xs-12" style="padding-bottom:1em;">
			<div class="btn blue">
				<span><i class="material-icons">account_box</i></span>
				<input type="file" id="avatar-integrante">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path validate nombre-imagen" type="hidden">
			</div>
		</div>
		<div class="row center-xs col-xs-12">
			<button class="waves-effect waves-light btn red" id="close-equipo" style="margin-right:1em;">
				<i class="material-icons left">close</i>Cerrar
			</button>
			<button class="waves-effect waves-light btn blue" id="guardar-equipo" data-type="guardar" data-id="">
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