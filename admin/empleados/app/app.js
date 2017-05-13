;(function () {
  'use strict'

  $('.eliminar').on('click', handleEliminar)
  $('.editar').on('click', handleEditar)

  function handleEliminar (e) {
    var id = e.currentTarget.dataset.id
    $.ajax({
      type: 'POST',
      url: 'service/eliminar.php',
      data: { id }
    })
    .done(snap => {
      console.log(snap)
      if (snap == 201) {
        toast('Se ha eliminado con exito')
        $('.containerTable').load('template/table.php')
      }
    })
  }

  function handleEditar (e) {
    var id = e.currentTarget.dataset.id
    $.ajax({
      type: 'POST',
      url: 'service/get.php',
      data: { id },
      dataType: 'JSON'
    })
    .done(snap => {
      $('#cedula').val(snap.emp_ced)
      $('#cedula').attr('disabled', true)
      $('#nombre').val(snap.emp_nomb)
      $('#email').val(snap.emp_emai)
      $('#cargo').val(snap.emp_carg)
      $('#telefono').val(snap.emp_tele)
      $('#direccion').val(snap.emp_dir)
      $('#FormContainer label').addClass('active')
      document.getElementById('guardar').dataset.id = id
      document.getElementById('guardar').dataset.type = "update"
      $('select').material_select('update');

      $('#FormContainer').slideDown()
      $('.EmpleadosLayout').slideUp()
    })
  }

})()
