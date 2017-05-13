;(function () {
	'use strict'
	/**
	 * Encierro el codigo dentro de un clouster para no contaminar el ambito globar.
	 * use strict es para escribir javascript en modo estricto asi no podre usar variables si
	 * crearlas primero
	 */

	//Inicalizo el select con el estilo de material disng
	 $('select').material_select();

	 //Cache de inputs
	 var $cedula = $("#cedula")
	 var $nombre = $("#nombre")
	 var $email = $("#email")
	 var $telefono = $("#telefono")
	 var $direccion = $("#direccion")
	 var $sexo = $("#sexo")
	 var $password = $("#password")

	 //Asignos los eventos javasctipt
	$('.registro-clientes').on('click', handleShowForm)
	$('#cancelar-cliente').on('click', handleCancelCliente)
	$('#guardar-cliente').on('click', handleGuardarCliente)
	//Eventos del sitio

	//Muestro el formulario
	function handleShowForm () {
		$("#formulario-cliente").slideDown()
	}

	// Llamo a ala funcion clearForm para cerrar el formulario y limpiearlo
	function handleCancelCliente (e) {
		e.preventDefault()
		clearForm()
	}

	function handleGuardarCliente (e) {
		e.preventDefault()
		/**
		 * Valido que el formulario esta correco
		 * si esta correcto hago un peticion ajax al servidor y lo guardo en la base de datos
		 */
		if (validaRegistroCliente()) {
    $.ajax({
				type: 'POST',
				url: 'clientes/guardar.php',
				data: { cedula: $cedula.val(), nombre: $nombre.val(), email: $email.val(),
								telefono: $telefono.val(), direccion: $direccion.val(), sexo: $sexo.val(),
								password: $password.val()
							}
			})
			.done(function (snap) {
				console.log(snap)
				if (snap == 201) {
					clearForm()
					toast("Se ha guardado con exito")
				}
        if (snap == 1) {
          toast("El usuario ya esta registrado")
          $cedula.focus()
        }
			})
		}
	}

	// Validaciones que el registro del formulario este lleno
	function validaRegistroCliente () {
    if ($cedula.val() === '') {
      toast('Ingrese el numero de cedula')
      $cedula.focus()
      return false
    }
    if (!valida_cedula($cedula.val())) {
      $cedula.focus()
      return false
    }
    if ($nombre.val() === '' || /^\s*$/.test($nombre.val())) {
      $nombre.focus()
      toast('Ingrese su nombre')
      return false
    }
    if ($email.val() === '' || /^\s*$/.test($email.val())) {
      $email.focus()
      toast('Ingrese su email')
      return false
    }
    if ($email.val() === '' || /^\s*$/.test($email.val())) {
      $email.focus()
      toast('Ingrese su email')
      return false
    }
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test($email.val()) === false) {
      $email.focus()
      toast("Ingresa un email valido")
      return false
    }
    if ($telefono.val() === '' || /^\s*$/.test($telefono.val())) {
      $telefono.focus()
      toast('Ingrese su telefono')
      return false
    }
    if ($telefono.val().length < 9) {
      $telefono.focus()
      toast('Ingrese su telefono correcto')
      return false
    }
    if ($direccion.val() === '' || /^\s*$/.test($direccion.val())) {
      $direccion.focus()
      toast('Ingrese su direccion')
      return false
    }
    if ($sexo.val() === '' || /^\s*$/.test($sexo.val())) {
      $sexo.focus()
      toast('Ingrese su sexo')
      return false
    }
    if ($password.val() === '' || /^\s*$/.test($password.val())) {
      $password.focus()
      toast('Ingrese su contraseña')
      return false
    }
    if ($('#Repeatpassword').val() === '' || /^\s*$/.test($('#Repeatpassword').val())) {
      $('#Repeatpassword').focus()
      toast('Repita su contraseña')
      return false
    }
    if ($password.val() != $('#Repeatpassword').val()) {
      $('#Repeatpassword').focus()
      toast('La contraseña no coinciden')
      return false
    } else return true
	}

	// pinta el mensaje de error en los inputs
	function renderTemplete (form, i, msg) {
		var parent = form.parentElement
		var el = document.createElement('span')
		el.classList.add(`message${form.id}${i}`)
		el.classList.add(`red-text`)
		el.classList.add(`size-font`)
		el.textContent = `${form.name} ${msg}`
		parent.appendChild(el)
	}

	// Funcion para limpiar el formulario
	function clearForm () {
		$("#formulario-cliente").slideUp()
		$cedula.val("")
		$nombre.val("")
		$email.val("")
		$telefono.val("")
		$direccion.val("")
		$sexo.val("")
		$password.val("")

		$(".valid").removeClass("valid")
		$("label.active").removeClass("active")
		$(".label-sexo").addClass("active")

		$('select').material_select('update')
	}

})()
