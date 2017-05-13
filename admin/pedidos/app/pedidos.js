;(function () {
	'use strict'

  $("#tableContainer").load('templates/table.php')
	/**
	 * Instancion la clase Event Source para recivi notificacion del servidor
	 */

	if(typeof(EventSource) !== "undefined") {
		var source = new EventSource("service/nuevo_pedido.php");

		source.onmessage = function(event) {
			console.log(event)
				document.getElementById("result").innerHTML += event.data + "<br>";
		};
	} else {
			document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
	}

	//Asignos los eventos jQuery al DOM

	$('#cerrar-carrito').on('click', handleCerrarPedido)
  $("#enProceso-carrito").on('click', handleEnProceso)
	$('#entregar-carrito').on('click', handleEntregarPedido)
  $('#facturar-carrito').on('click', handleFacturar)

 // llama a la funcion closeForm para cerrar el pedido
	function handleCerrarPedido (e) {
		e.preventDefault()
		closeForm()
	}

  function handleEnProceso (e) {
    e.preventDefault()
    var id = $('#idPedido').val()

    $.ajax({
      type: 'POST',
      url: 'service/enProceso.php',
      data: { id }
    })
    .done(snap => {
      $("#tableContainer").load('templates/table.php')
      if (snap == 201) {
        $("#entregar-carrito").slideDown()
        $("#enProceso-carrito").slideUp()
        toast('Ha pasado a proceso con exito')
      }
    })
  }

	// Esta funcion se encargar de entragar el pedido al cliente que pidio
	function handleEntregarPedido (e) {
		e.preventDefault()
    var id = $('#idPedido').val()

    $.ajax({
      type: 'POST',
      url: 'service/entregar.php',
      data: { id }
    })
    .done(snap => {
      console.log(snap);
      if (snap == 201) {
        $("#entregar-carrito").slideUp()
        $("#facturar-carrito").slideDown()
        toast('Se ha entragado con exito')
      }
    })
	}

  function handleFacturar (e) {
    e.preventDefault()
    var id = $('#idPedido').val()
    $.ajax({
      type: 'POST',
      url: 'service/facturar.php',
      data: { id }
    })
    .done(snap => {
      console.log(snap);
      if (snap == 201) {
        closeForm()
        $("#tableContainer").load('templates/table.php')
        toast('Se ha facturado con exito')
      }
    })
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
