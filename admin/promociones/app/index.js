;(function () {
  'use strict'
  // Cargar la tabla
  $("#table-container").load("templates/table.php")

  //Inicalizo el select de materialize
  $('select').material_select();

  // Asigno los eventos del DOM
  $('#showForm').on('click', handleShowForm)
  $('#close-promocion').on('click', handlePromocionClose)
  $('#guardar-promocion').on('click', handlePromocionGuardar)
  $('#foto-promocion').on('change', handleChangeFoto)
  $('.closeImage').on('click', handleCloseImage)

  /**
  * Estos eventos se encarga de manejar el formulario
  * como canelar limpiar obtener la informacion, guardar y actualizar las promociones
  */
  function handleShowForm () {
    $('.containerForm').slideDown()
  }

  function handlePromocionClose (e) {
    e.preventDefault()
    clearForm()
  }

  function handlePromocionGuardar (e) {
    e.preventDefault()
    //Otengo el tipo y el id que puede o no contener algo
		var type = e.currentTarget.dataset.type
		var id = e.currentTarget.dataset.id

		// Verifico el que el formulario este lleno
		//agrego mas informacion a la peticion ajax porque se enviara una imagen
    if (validarPromocion()) {
      $.ajax({
				type: "POST",
				data: getData(id),
				url: `service/${type}.php`,
				cache: false,
				contentType: false,
				processData: false
			})
      .done(snap => {
        console.log(snap)
        if (snap == 201) {
          toast("Se guardado con exito la promocion")
          clearForm()
          $("#table-container").load("templates/table.php")
        }
        if (snap == 1) {
          toast("El producto ya esta en promocion")
        }
      })
    }
  }

  function clearForm () {
    $('.containerForm').slideUp()
    $('#producto').val("")
    $('#nombre-imagen').val("")
    document.querySelector(".foto-producto").src = ""
    $(".active").removeClass("active")
    $(".valid").removeClass("valid")
    $('select').material_select('update')
    document.getElementById('guardar-promocion').dataset.id = ""
    document.getElementById('guardar-promocion').dataset.type = "guardar"
  }

  function handleChangeFoto (e) {
    var file = e.target.files[0]
    var reader = new FileReader()

    reader.onload = (function (theFile) {
      return function(e) {
          document.querySelector(".foto-producto").src = e.target.result
          $(".nombre-imagen").val(e.target.result)
      };
    })(file);
    reader.readAsDataURL(file);
  }

  function handleCloseImage () {
    $('.loadImage').removeClass('loadImage-active')
  }

  function validarPromocion () {
    if ($('#producto').val() == null) {
      toast("Porfavor ingrese el producto")
      $('#producto').focus()
      return false
    }
    if ($('.nombre-imagen').val() === "") {
      toast("Porfavor ingrese la imagen del producto")
      return false
    }
    else return true
  }

  //Preparo la informacion que va hacer enviado a PHP para que sea guardada
  //en un formData porque se enviara una imagen
  function getData (id) {
    var formData = new FormData()
    var file_image = document.getElementById("foto-promocion")
    var productos = document.getElementById('producto')
    var selectedIndex = productos.selectedIndex
    var producto = productos[selectedIndex].innerHTML.trim()
    var precio = productos[selectedIndex].dataset.precio

    formData.append("is_imagen", file_image.files.length)
    formData.append("imagen", file_image.files[0])

    formData.append("id", id)
    formData.append("nombre", producto)
    formData.append("precio", precio)
    formData.append("producto", $('#producto').val())

    return formData
  }

})()
