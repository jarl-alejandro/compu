;(function ($) {
  'use strict'

  var $pass = $('#cambiarPasswordForm')
  var $pass2 = $('#cambiarPasswordForm2')

  $('.cambiarPassword').on('click', handleChangePassword)
  $('#CancelarCambiarPass').on('click', handleCancelPass)
  $('#AceptCambiarPass').on('click', handleAceptPass)

  function handleChangePassword () {
    $('.cambiarPasswordContainer').slideDown()
    $('.button-collapse').sideNav('hide')
  }

  function handleCancelPass () {
    $('.cambiarPasswordContainer').slideUp()
    $pass.val('')
    $pass2.val('')

    $('.cambiarPasswordContainer label').removeClass('active')
    $('.cambiarPasswordContainer input').removeClass('valid')
  }

  function handleAceptPass () {
    if (validarPass()) {
      $.ajax({
        type: 'POST',
        url: 'clientes/login/cambiarPass.php',
        data: { password: $pass.val() }
      })
      .done(snap => {
        console.log(snap)
        if (parseInt(snap) === 200) {
          window.toast('Se ha cambiado su contraseña con exito')
          handleCancelPass()
        }
      })
    }
  }

  function validarPass () {
    if ($pass.val() === '' || /^\s*$/.test($pass.val())) {
      $pass.focus()
      window.toast('Ingrese su nueva contraseña')
      return false
    }
    if ($pass2.val() === '' || /^\s*$/.test($pass2.val())) {
      $pass2.focus()
      window.toast('Repita su contrseña')
      return false
    }
    if ($pass.val() !== $pass2.val()) {
      $pass2.focus()
      window.toast('No coinciden la contraseña')
      return false
    } else return true
  }
})(window.jQuery)
