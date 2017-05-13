;(function () {
	'use strict'

	// Asigno los eventos al DOM
	$(".editar").on('click', handleEditar)
	$(".eliminar").on('click', handleEliminar)


	//Esta funcion hace una peticion ajax y obtiene los datos del empleado y los poner en 
	// el formularion para ser editado
	function handleEditar (e) {
		var id = e.currentTarget.dataset.id

		$.ajax({
			type: "POST",
			data: { id },
			url: "service/get.php",
			dataType: "JSON"
		})
		.done(function (snap) {
			// Le cambio el tipo de accion que se ara
			document.getElementById('guardar-equipo').dataset.type = "update"
			// Agrego el id del empleado que sera editado
			document.getElementById('guardar-equipo').dataset.id = id
			//Inserto la informacion en sus respectivos campos inputs
			$('#nombre').val(snap.equi_nombre)
			$('#cargo').val(snap.equi_cargo)
			$('#detalle').val(snap.equi_det)
			$("label").addClass("active")
			$(".nombre-imagen").val(snap.equi_img)
			document.querySelector(".foto-equipo").src = `../../media/equipo/${snap.equi_img}`
			$('.containerForm').slideDown()
		})
	}

	function handleEliminar (e) {
		//Obtengo el Id del empleado que sera eliminado
		var id = e.currentTarget.dataset.id
		//Hago una peticion ajax al php para que elimine el empleadoo
		$.ajax({
			type: "POST",
			url: "service/eliminar.php",
			data: { id }
		})
		.done(function (snap) {
			//Si todo salio bien envaira 200 y si algo salio mal enviara el error
			if (snap == 200) {
				toast("Se ha eliminado con exito")
				$("#table-container").load("table.php")
			}
			else toast("Tuvimos problemas itente nuevamente")
		})
	}

})()