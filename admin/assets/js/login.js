;(function () {
  'use strict'

  var $email = $('#emailLogin')
  var $password = $('#passwordLogin')

  $('#entrar-login-admin').on('click', handleEntrar)

  function handleEntrar (e) {
    e.preventDefault()
    if (validarEmail()) {
      $.ajax({
        type: "POST",
        url: "service/login.php",
        data: { email: $email.val(), password: $password.val() }
      })
      .done(function (snap) {
        console.log(snap)
        if (snap == 404) {
          toast("Usuario no existe o es incorrecto")
          $email.focus()
        }
        if (snap == 200) {
          toast("Ha iniciado sesión con exito")
          setTimeout(function() {
						location.reload()
					}, 500);
        }
      })
    }
  }

  function validarEmail () {
    if ($email.val() == "") {
      toast("Porfavor ingrese su email")
      $email.focus()
      return false
    }
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test($email.val()) == false) {
			$email.focus()
			toast("Ingresa un email valido")
			return false
		}
    if ($password.val() == "") {
      toast("Porfavor ingrese su contraseña")
      $password.focus()
      return false
    }
    else return true
  }
})()
