;(function () {
  'use strict'

  /**
  * Aqui voy a llamar a funcion buscarEnTabla para busar en la table productos-table,
   */
  $('#buscar').keyup(function () {
    buscarEnTabla('productos-table', 'buscar', 5)
  })

  //Asignos los eventos al DOM
  $("#gruposSelect").on("change", handleFilterGrupos)
  $('#lineaSelect').on('change', handleFilterLinea)

  //Eventos Personalizado

  //Filtro los productos por su respectivo grupo
  function handleFilterGrupos () {
    var grupo = $("#gruposSelect").val()

    $(`[data-grupo]`).fadeOut()
    $(`[data-grupo='${grupo}']`).fadeIn()
  }

  //Filtro los grupos por su respectiva linea
  function handleFilterLinea () {
    var linea = $("#lineaSelect").val()
    $('#container-grupos').load(`templates/grupos_filter.php?id=${linea}`, function () {
      $('select').material_select();
      $("#gruposSelect").on("change", handleFilterGrupos)
    })
  }

})()
