;(function () {
	'use strict'

	//En este array se van a guardarlos productos
	var miCarrito = []

	if (localStorage.getItem('carrito') != null && JSON.parse(localStorage.getItem('carrito')).length > 0) {
		miCarrito = JSON.parse(localStorage.getItem('carrito'))
		buildCarrito()
	}

	//Cache de las variables para manupular el Dom
	var $cantCanasta = $("#cantCanasta")

	//Asignos los eventos del DOM
	$(".Carrito-btn").on('click', handleShowCarrito)
	$("#cerrar-carrito").on('click', handleCerrarCarrito)
	$("#cancelar-carrito").on('click', handleCancelarCarrito)
	$("#comprar-carrito").on('click', handleComprarCarrito)
	$('.agregar-carrito').on('click', handleAgregarCarrito)
	$('#agregar-canasta').on('click', handleAgregaraCanasta)
	$('#cancelar-canasta').on('click', handleCancelarCanasta)

	//Eventos personalizado

	function handleShowCarrito (e) {
		e.preventDefault()
		$(".Carrito").slideDown()
	}

	function handleCerrarCarrito () {
		$(".Carrito").slideUp()
	}

	/**
	 * Envio por ajax el pedido para que lo guarde en mysql
	 */
	function handleComprarCarrito () {
		if (miCarrito.length === 0) {
			toast("No tiene pedidos")
		$(".Carrito").slideDown()
			return false;
		}
		$(".containerLoader").fadeIn()
		$.ajax({
			type: "POST",
			url: "carrito/pedido.php",
			data: { carrito: miCarrito, total: $("#total-carrito").html() }
		})
		.done(function (snap) {
			console.log(snap)
			$(".containerLoader").fadeOut()
			if (snap == 201) {
				handleCancelarCarrito()
				toast("Se ha realizado su pedido con exito")
			}
			else toast("Tuvimos problemas intente nuevamente")
		})
	}

	// Esta funcion se encarga de cerrar y limpiear el carrito de compras y cancelar su pedido
	function handleCancelarCarrito () {
		localStorage.clear()
		miCarrito = []
		handleCerrarCarrito()
		toast("Se ha cancelado su pedido con exito")
		var template = `<tr>
			<td colspan="5" class="center-align">No hay productos</td>
		</tr>`
		$("#detalle-carrito").html(template)
		$("#total-carrito").html("0.00")
		$('.Carrito-btn').removeClass('Carrito-btn-active')
	}

	/**
	 * Obtiene los datos del producto
	 * como son id, nombre, precio.
	 * Mostramos un card para que ingrese la cantidad
	 */
	function handleAgregarCarrito (e) {
		$(".nombre-canasta").html(`Cuantos ${ e.currentTarget.dataset.nombre.trim() } deseas`)
		$("#formulario-cantCanasta").slideDown()
		document.getElementById("agregar-canasta").dataset.id = e.currentTarget.dataset.id.trim()
		document.getElementById("agregar-canasta").dataset.nombre = e.currentTarget.dataset.nombre.trim()
		document.getElementById("agregar-canasta").dataset.precio = e.currentTarget.dataset.precio.trim()
	}

	// Esta funcion inserta en un arra un objeto JSON el procuto que el ciente pidio
	function handleAgregaraCanasta (e) {
		e.preventDefault()
		if ($cantCanasta.val() == "" || $cantCanasta.val() == 0) {
			toast("Ingrese la cantidad que desea")
			$cantCanasta.focus()
			return false
		}

		var producto = {
			id: e.currentTarget.dataset.id,
			nombre: e.currentTarget.dataset.nombre,
			precio: e.currentTarget.dataset.precio,
			cant: $cantCanasta.val(),
			total: parseInt($cantCanasta.val()) * parseFloat(e.currentTarget.dataset.precio),
		}
		miCarrito.push(producto)
		localStorage.setItem('carrito', JSON.stringify(miCarrito))
		cleanFormCanasta()
		buildCarrito()
	}

	/**
	 * uso preventDefault para detener el comportamiento normal del navegador
	 * Llamo a la funcion cleanFormCanasta para limpiar el formulario
	 */
	function handleCancelarCanasta (e) {
		e.preventDefault()
		cleanFormCanasta()
	}

	// Cierro la canastes
	function cleanFormCanasta () {
		$("#formulario-cantCanasta").slideUp()
		$('.cant-canasta').removeClass("active")
		$cantCanasta.val("")
		$cantCanasta.removeClass("valid")
	}

	/**
	 * recorro el array miCarrito donde tengo los productos que el el cliente pidio
	 * y lo renderizo en HTML para que el clinete pueda visualizar el cliente
	 */
	function buildCarrito () {
		if (miCarrito.length == 1) {
			$('.Carrito-btn').addClass('Carrito-btn-active')
		}
		$("#detalle-carrito").html("")
		var total = 0;
		for (var i in miCarrito) {
			var producto = miCarrito[i]
			total += parseFloat(producto.total);
			var template = `<tr>
				<td>${producto.cant}</td>
				<td>${producto.nombre}</td>
				<td>${producto.precio}</td>
				<td>${producto.total.toFixed(2)}</td>
				<td><button class="waves-effect waves-light btn red lighten-1 eliminarProducto" data-index="${i}">
					<i class="material-icons">delete_forever</i></button>
				</td>
			</tr>`
			$("#detalle-carrito").append(template)
		}
		$("#total-carrito").html(total.toFixed(2))
		//Asigno el evento para que el cliente pueda eliminar un producto
		$(".eliminarProducto").on('click', handleDeleteProducto)
	}

	// Esta funcion se encarga de eliminar el producto que el cliente ya no desea
	function handleDeleteProducto (e) {
		var index = e.currentTarget.dataset.index
		miCarrito.splice(index, 1)
		localStorage.setItem('carrito', JSON.stringify(miCarrito))
		buildCarrito()

		if (miCarrito.length == 0) {
			var template = `<tr>
					<td colspan="5" class="center-align">No hay productos</td>
				</tr>`
			$("#detalle-carrito").html(template)
			$('.Carrito-btn').removeClass('Carrito-btn-active')
		}
	}


})()
