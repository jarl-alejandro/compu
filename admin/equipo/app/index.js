;(function () {
	'use strict'
	
	// Cargar la tabla
	$("#table-container").load("table.php")

	//Cacheo las variables del DOM
	var $nombre = $('#nombre')
	var $cargo = $('#cargo')
	var $detalle = $('#detalle')

	//Asigno Eventos al DOM con jQuery
	$('#close-equipo').on('click', handleCloseForm)
	$('#guardar-equipo').on('click', handleGuardar)
	$("#showForm").on('click', handleShowForm)
	$('#avatar-integrante').on('change', handleChangeIntegrante)

	// llamoa a la funcion clear para que se encargue de cerrar y limpiar el form
	function handleCloseForm (e) {
		e.preventDefault()
		clear()
	}

	//Hago un peticion ajax a php y dependiendo del type se hara la accion sea guardar o editar
	function handleGuardar (e) {
		e.preventDefault()
		//Otengo el tipo y el id que puede o no contener algo
		var type = e.currentTarget.dataset.type
		var id = e.currentTarget.dataset.id

		// Verifico el que el formulario este lleno
		//agrego mas informacion a la peticion ajax porque se enviara una imagen
		if (validarForm ()) {
			$.ajax({
				type: "POST",
				data: getData(id),
				url: `service/${type}.php`,
				cache: false,
				contentType: false,
				processData: false
			})
			.done(function (snap) {
				console.log(snap)
				//Si todo salio bien enviara el codigo HTTP 201 que deice que se inserto o modifico exitosamente
				//y si salio mal enviara el error
				if (snap == 201) {
					clear()
					toast("Se ha guardado con exito.")
					$("#table-container").load("table.php")
				}
				else toast("Tuvimos Problemas intente nuevamente")
			})
		}

	}

	function handleShowForm (e) {
		$('.containerForm').slideDown()
	}

	//Muestra la foto en el form
	function handleChangeIntegrante (e) {
		var file = e.target.files[0]
		var reader = new FileReader()
		
		reader.onload = (function (theFile) {
			return function(e) {
					document.querySelector(".foto-equipo").src = e.target.result
					$(".nombre-imagen").val(e.target.result)
			};
		})(file);
		reader.readAsDataURL(file);

	}

	//Valido que el form no tenga ningun error y que esten todos los campos llenos
	function validarForm () {
		if ($nombre.val() === "" || /^\s*$/.test($nombre.val())) {
			toast("Ingrese el nombre")
			$nombre.focus()
			return false
		}
		else if ($cargo.val() === "" || /^\s*$/.test($cargo.val())) {
			toast("Ingrese el cargo")
			$cargo.focus()
			return false
		}
		else if ($detalle.val() === "" || /^\s*$/.test($detalle.val())) {
			toast("Ingrese el detalle")
			$detalle.focus()
			return false
		}
		else if ($(".nombre-imagen").val() === "") {
			toast("Ingrese la foto")
			return false
		}
		else return true
	}

	//Funciones utilitarias
	function clear () {
		$('.containerForm').slideUp()
		$nombre.val("")
		$cargo.val("")
		$detalle.val("")
		$(".nombre-imagen").val("")
		$("#avatar-integrante").val("")
		document.querySelector(".foto-equipo").src = ""
		$(".active").removeClass("active")
		$(".valid").removeClass("valid")
		document.getElementById('guardar-equipo').dataset.type = "guardar"
    document.getElementById('guardar-equipo').dataset.id = ""
	}

	//Preparo la informacion que va hacer enviado a PHP para que sea guardada
	//en un formData porque se enviara una imagen
	function getData (id) {
		var formData = new FormData()
		var file_image = document.getElementById("avatar-integrante")

		formData.append("is_imagen", file_image.files.length)
		formData.append("imagen", file_image.files[0])

		formData.append("id", id)
		formData.append("nombre", $nombre.val())
		formData.append("cargo", $cargo.val())
		formData.append("detalle", $detalle.val())

		return formData
	}

})()