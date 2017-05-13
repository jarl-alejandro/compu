<footer class="">
	<h4>CompuSofNet</h4>
	<h5>Todos los derechos reservados.</h5>
</footer>
<script src="../../assets/js/jquery.js"></script>
<script src="../../assets/js/materialize.js"></script>
<script src="../../assets/js/buscador-table.js"></script>
<script src="../../assets/js/paginador-table.js"></script>
<script type="text/javascript" src="../../assets/js/validaciones.js"></script>
<script type="text/javascript" src="../assets/js/password.js"></script>
<script>
  //Esta funcion muestra en mensaje en pantalla y lo desaparace 1seg y medio despues de haberlo mostrado
  function toast (msg) {
    $("#toast").html(msg)
    $("#toast").slideDown()
    setTimeout(function() {
      $("#toast").slideUp()
    }, 1500);
  }
</script>
