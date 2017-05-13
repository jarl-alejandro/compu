;(function () {
  'use strict'

  $('select').material_select();

  //Cacheo la variable
  var $cedula = $('#cedula')
  var $nombre = $('#nombre')
  var $email = $('#email')
  var $cargo = $('#cargo')
  var $telefono = $('#telefono')
  var $direccion = $('#direccion')

  //tragigo la tla tabla de empleado y lo inserto en el contenedor
  $('.containerTable').load('template/table.php')

  //Asignos Eventos al dom
  $('#showForm').on('click', showForm)
  $('#close').on('click', handleClose)
  $('#guardar').on('click', handleGuardar)

  //Eventos personallizado
  function showForm (e) {
    $('#FormContainer').slideDown()
    $('.EmpleadosLayout').slideUp()
  }

  //Limpio el formulario
  function handleClose () {
    $cedula.val('')
    $nombre.val('')
    $email.val('')
    $cargo.val('')
    $telefono.val('')
    $direccion.val('')
    $cedula.attr('disabled', false)
    document.getElementById('guardar').dataset.id = ""
    document.getElementById('guardar').dataset.type = "guardar"
    $('select').material_select('update');

    $('#FormContainer label').removeClass('active')
    $('#FormContainer').slideUp()
    $('.EmpleadosLayout').slideDown()
  }

  //Guardo al empleado
  function handleGuardar (e) {
    var id = e.currentTarget.dataset.id
    var type = e.currentTarget.dataset.type

    if (validarForm()) {
      $.ajax({
        type: 'POST',
        url: `service/${type}.php`,
        data: getData(id)
      })
      .done(snap => {
        console.log(snap);
        if (snap == 201) {
          toast('Se ha guardado con exito')
          handleClose()
          $('.containerTable').load('template/table.php')
        }
        if (snap == 1) {
          toast("Usuario ya esta registrado")
          $cedula.focus()
        }
      })
    }
  }

  //retornno en un objeto JSON la informacion del empleado
  function getData (id) {
    return  {
      id,
      cedula: $cedula.val(),
      nombre: $nombre.val(),
      email: $email.val(),
      cargo: $cargo.val(),
      telefono: $telefono.val(),
      direccion: $direccion.val(),
    }
  }

  //Valido que haya ingresado los datos correcto
  function validarForm () {
    if ($cedula.val() == "") {
      toast("Ingrese el numero de cedula")
      $cedula.focus()
      return false
    }
    if (!valida_cedula($cedula.val())) {
      $cedula.focus()
      return false
    }
    if ($nombre.val() == "") {
      toast("Ingrese el nombre")
      $nombre.focus()
      return false
    }
    if ($email.val() == "") {
      toast("Ingrese el email")
      $email.focus()
      return false
    }
    if (!validarEmail($email.val())) {
      toast("Ingrese el email valido")
      $email.focus()
      return false
    }
    if ($cargo.val() == null) {
      toast("Ingrese el cargo")
      $cargo.focus()
      return false
    }
    if ($telefono.val() == "") {
      toast("Ingrese el telefono")
      $telefono.focus()
      return false
    }
    if ($telefono.val().length < 9) {
      toast("Ingrese el telefono correcto")
      $telefono.focus()
      return false
    }
    if ($direccion.val() == "") {
      toast("Ingrese el direccion")
      $direccion.focus()
      return false
    }
    else return true
  }

})()
