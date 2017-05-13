;(function () {
  'use strict'

  $('.ver-pedido').on('click', handleVerPedido)

  // Hace una peticion ajax a servidor para obtener algun pedido en concreto
  function handleVerPedido (e) {
    var id = e.currentTarget.dataset.id
  	var estado = e.currentTarget.dataset.estado

    if (estado === "enProceso") {
      $("#entregar-carrito").slideDown()
      $("#enProceso-carrito").slideUp()
    }
    if (estado === "entregar") {
      $("#entregar-carrito").slideUp()
      $("#enProceso-carrito").slideUp()
      $("#facturar-carrito").slideDown()
    }

    $('#idPedido').val(id)
    $.ajax({
      type: "POST",
      url: "service/pedido.php",
      data: { id },
      dataType: "JSON"
    })
    .done(function (snap) {
      dbLocal.pedidos = []
      //Recorro el array de los pedidos del cliente y los guardo en el array pedidos
      for (var i in snap) {
        var item = snap[i]
        var producto = {
          id: item.prod_ped,
          nombre: item.nom_ped,
          cant: item.cant_ped,
          precio: item.prec_ped,
          total: item.tot_ped,
        }
        dbLocal.pedidos.push(producto)
      }
      //llamo a la funcion build para renderizar en html para que pueda ser visualizado
      build()
      setTimeout(() => $('.Carrito').slideDown(), 500)
    })
  }

  //Recorro el array pedidos para renerizo en html el pedidos para que pueda ser visualiazado de una mejor manera
  function build () {
    var total = 0;
    $("#detalle-carrito").html("")
    for (var i in dbLocal.pedidos) {
      var producto = dbLocal.pedidos[i]
      total += parseFloat(producto.total);
      var template = `<tr>
        <td>${producto.cant}</td>
        <td>${producto.nombre}</td>
        <td>${producto.precio}</td>
        <td>${producto.total}</td>
      </tr>`
      $("#detalle-carrito").append(template)
    }
    $("#total-carrito").html(total)
  }


})()
