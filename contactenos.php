<?php
	/*
		Creo una variable  para el nombre de la pagina.
		Importo los componetes head y menu.
			head.php contiene en encabezado de la pagina y llama los archivos css
	*/
	$title = "Inicio";

	include "./head.php";
	include "./menu.php";

	include "config/conexion_mysql.php";
	$equipos = $db->query("SELECT * FROM equipo");
?>
<style media="screen">
  main {
    margin-top: 6em;
  }
</style>
<section class="Mapa">
  <img src="assets/img/mapa.jpg" alt="Mapa" class="mapa-ubicacion">
</section>
<section class="Contactenos row center-xs">
  <h3 class="Contactenos-title col-xs-10">Contactenos</h3>
  <article class="Contactenos-form row center-xs col-xs-8 card z-depth-2">
    <div class="input-field col-xs-12 col-md-6">
      <input id="nombreContactenos" type="text" class="validate">
      <label for="nombreContactenos">Nombre</label>
    </div>
    <div class="input-field col-xs-12 col-md-6">
      <input id="emailContactenos" type="text" class="validate">
      <label for="emailContactenos">Email</label>
    </div>
    <div class="input-field col-xs-12">
      <input id="temaContactenos" type="text" class="validate">
      <label for="temaContactenos">Tema</label>
    </div>
    <div class="input-field col-xs-12">
      <textarea id="mensajeContactenos" class="materialize-textarea"></textarea>
      <label for="mensajeContactenos">Mensaje</label>
    </div>
    <a class="waves-effect waves-light btn blue darken-3 save"><i class="material-icons right">send</i> Enviar</a>
  </article>
</section>
</main>
<?php
// Importo el footer que tiene llamos los archivos de javascript y el footer
	include "./footer.php";
?>
<script type="text/javascript">
var $nombreContactenos = $('#nombreContactenos')
var $emailContactenos = $('#emailContactenos')
var $temaContactenos = $('#temaContactenos')
var $mensajeContactenos = $('#mensajeContactenos')

function validarEmail () {
  if ($nombreContactenos.val() == "") {
    toast("Ingrese su nombre")
    $nombreContactenos.focus()
    return false
  }
  if ($emailContactenos.val() == "") {
    toast("Ingrese su email")
    $emailContactenos.focus()
    return false
  }
  if ($temaContactenos.val() == "") {
    toast("Ingrese el tema")
    $temaContactenos.focus()
    return false
  }
  if ($mensajeContactenos.val() == "") {
    toast("Ingrese el mensaje")
    $mensajeContactenos.focus()
    return false
  }
  if ($mensajeContactenos.val().length < 15) {
    toast("Debe ingrese el mensaje ms de 15")
    $mensajeContactenos.focus()
    return false
  }
  else return true
}

$('.save').on('click', function () {
  if (validarEmail()) {
    $.ajax({
      type: 'POST',
      url: 'service/email.php',
      data: { nombre: $nombreContactenos.val(), email: $emailContactenos.val(),
          temaContactenos: $temaContactenos.val(), mensaje: $mensajeContactenos.val() }
    })
    .done(snap => {
      console.log(snap)
      if (snap == 201) {
        toast("Se ha enviado con exito el mensaje")
        limpiarForm()
      }
    })
  }
})

function limpiarForm () {
  $nombreContactenos.val("")
  $emailContactenos.val("")
  $temaContactenos.val("")
  $mensajeContactenos.val("")
  $('.Contactenos-form label').removeClass('active')
  $('.valid').removeClass('valid')
}
</script>
</body>
</html>
