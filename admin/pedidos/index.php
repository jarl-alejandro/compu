<?php
//Importo los componetes head
	include "../head.php";
	//Importo la el form de pedidos
	include "./table_pedido.php";
?>

<div id="result"></div>
<input type="hidden" id="idPedido">

<h3 class="center-align gray-text u-no-margin full-width">Pedidos</h3>
<div class="row center-xs BuscadorContainer full-width">
	<div class="input-field col-xs-8">
		<input id="buscar" type="text" class="validate">
		<label for="buscar">Ingrese el pedido que desea buscar</label>
	</div>
</div>
<section id="tableContainer"></section>
</main>
<?php
// Importo el footer que tiene los cierres de html y body. llamos los archivos de javascript
	include "../footer.php";
?>
<script src="app/poo.js"></script>
<script src="app/pedidos.js"></script>

</body>
</html>
