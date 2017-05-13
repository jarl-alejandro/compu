;(function () {
	'use strict'

  $("#tableContainer").load('templates/table.php')
  $('#cerrar-carrito').on('click', handleCerrarPedido)

 // llama a la funcion closeForm para cerrar el pedido
	function handleCerrarPedido (e) {
		e.preventDefault()
		closeForm()
	}

	//Esta funcion se encarga de cerrar y limpiear el carrito
	function closeForm () {
    $('.Carrito').slideUp()
		dbLocal.pedidos = []
		toast("Ha cerrado el pedido")
		var template = `<tr>
			<td colspan="5" class="center-align">No hay productos</td>
		</tr>`
		$("#detalle-carrito").html(template)
		$("#total-carrito").html("0.00")
    $("#entregar-carrito").slideUp()
    $("#enProceso-carrito").slideDown()
	}

})()
