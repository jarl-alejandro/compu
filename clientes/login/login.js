;(function () {
	`use strict`

	//Cacheo las variables del DOM
	var $emailLogin = $("#emailLogin")
	var $passwordLogin = $("#passwordLogin")

	//Asignos los eventos del DOM
	$(".Login-btnShow").on('click', handleLoginShow)
	$("#cancelar-login").on('click', handleLoginCancelar)
	$("#entrar-login").on('click', handleLoginEntar)
  $('.olvarPassword').on('click', handleOlvidarPassword)

	//Eventos del personalizados
	function handleLoginShow () {
		$('#formulario-login').slideDown()
	}

	/** Llama la funcion clearFormLogin para limpiar el formulario login */
	function handleLoginCancelar (e) {
		e.preventDefault()
		clearFormLogin()
	}

	function handleLoginEntar (e) {
		e.preventDefault()
		/**
		 * Verifico si ha ingresado el formulario correctamente y si es asi inicia session si el usuario existe
		 * si no existe envie un mensaje que el cliente no existe
		 */
		if (validarLogin()) {
			$.ajax({
				type: "POST",
				url: "clientes/login/login.php",
				data: { email: $emailLogin.val(), password: $passwordLogin.val() }
			})
			.done(function (snap) {
				console.log(snap)
				if (snap == 404) {
					toast("Cliente no exite o esta incorrrecto")
					$emailLogin.focus()
				}
				else {
					toast("Ha iniciado sessiòn con exito")
					clearFormLogin()
					setTimeout(function() {
						location.reload()
					}, 500);
				}
			})
			//clearFormLogin()
		}
	}

  function handleOlvidarPassword () {
    if ($emailLogin.val() === '') {
      toast('Ingrese su email para enviar un e-mail a su correo')
      $emailLogin.focus()
      return false
    }
    $.ajax({
      type: 'POST',
      url: 'clientes/login/olvidar.php',
      data: { email: $emailLogin.val() }
    })
    .done(snap => {
      console.log(snap)
      if (parseInt(snap) === 404) {
        toast('Usuario no existe')
      }
      if (parseInt(snap) === 200) {
        toast('Se establecio su numero cedula / RUC como contraseña')
      }
    })
  }

	// Validar que el login del formulario este correcto
	function validarLogin () {
		if( $emailLogin.val()  == "") {
			$emailLogin.focus()
			toast("Ingrese su email")
			return false
		}
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test($emailLogin.val()) == false) {
			$emailLogin.focus()
			toast("Ingresa un email valido")
			return false
		}
		if ($passwordLogin.val() == "") {
			$passwordLogin.focus()
			toast("Ingrese su contraseña")
			return false
		}
		else return true
	}

	//funcion para limpiar el formulario login
	function clearFormLogin () {
		$('#formulario-login').slideUp()
		$emailLogin.val("")
		$passwordLogin.val("")

		$(".valid").removeClass("valid")
		$("label.active").removeClass("active")
		$(".label-sexo").addClass("active")
	}

})()
