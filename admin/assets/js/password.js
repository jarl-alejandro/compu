;(function () {
  'use strict'

  $('#changePassoword').on('click', handleShowForm)
  $('#closePassword').on('click', handleClose)
  $('#guardarPassword').on('click', handleGuardar)

  function handleShowForm () {
    $('.PasswordForm').slideDown()
  }

  function handleClose () {
    $('.PasswordForm').slideUp()
    $('#passwordCambiar').val('')
    $('.PasswordForm label').removeClass('active')
  }

  function handleGuardar () {
    if ($("#passwordCambiar").val() == "") {
      $("#passwordCambiar").focus()
      toast('Ingrese su nueva contraseña')
      return false
    }
    if ($("#passwordCambiar").val().length < 8) {
      $("#passwordCambiar").focus()
      toast('Debe ingresar una contraseña igual o mas de 8 caracteres')
      return false
    }

    $.ajax({
      type: 'POST',
      url: '../service/cambiar.php',
      data: { password: $("#passwordCambiar").val() }
    })
    .done(snap => {
      console.log(snap)
      if (snap == 201) {
        toast("Ha cambiado con exito si contrasña")
        handleClose()
      }
    })
  }

})()
