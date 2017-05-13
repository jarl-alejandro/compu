;(function () {
  'use strict'

  $('.verFoto').on('click', handleVerFotos)
  $('.editar').on('click', handleEditar)
  $('.eliminar').on('click', handleEliminar)

  //pregunto si el usuario presiono esc la cierro la imagen
  $(document).bind('keydown', function (e) {
    if (e.which === 27) {
      $('.loadImage').removeClass('loadImage-active')
    }
  })

  // muestro la imgagen con un efecto personalizadi usando css
  function handleVerFotos (e) {
    var foto = e.currentTarget.dataset.foto
    document.querySelector(".loadImage-img").src = `../../media/promociones/${foto}`
    $('.loadImage').addClass('loadImage-active')
  }

  // Obtengo la promocion y lo muestro en el formulario
  function handleEditar (e) {
    var id = e.currentTarget.dataset.id
    $.ajax({
      type: 'POST',
      url: 'service/get.php',
      data: { id },
      dataType: 'JSON'
    })
    .done(snap => {
      document.getElementById('guardar-promocion').dataset.id = snap.prom_id
      document.getElementById('guardar-promocion').dataset.type = "editar"
      $('#producto').val(snap.prom_prod)
      $('.nombre-imagen').val(snap.prom_img)
      document.querySelector(".foto-producto").src = `../../media/promociones/${snap.prom_img}`
      $('select').material_select('update')
      $('.containerForm').slideDown()
    })
  }

  //Hago una peticion AJAX para que elimine la promocion
  function handleEliminar (e) {
    var id = e.currentTarget.dataset.id
    $.ajax({
      type: 'POST',
      url: 'service/eliminar.php',
      data: { id }
    })
    .done(snap => {
      console.log(snap);
      if (snap == 201) {
        toast('Se ha eliminado con exito')
        $("#table-container").load("templates/table.php")
      }
    })
  }

})()
