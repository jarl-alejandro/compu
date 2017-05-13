<?php
session_start();
include "service/sistema.php";

if (isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])) {
	if ($_SESSION["18e0707ea726c45bd34d5bc7d12111c265a05010"] == "empleado"){
    if ($_SESSION["e0d6ae5cf2a2d0c1075943593a36cc5377382a05"] == "Administrador") {
      header("Location: empleados");
    }
    else if ($_SESSION["e0d6ae5cf2a2d0c1075943593a36cc5377382a05"] == "Vendedor") {
      header("Location: pedidos");
    }
  }
	else
		header("Location: ../");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inicar Sesiòn</title>
  <link rel="stylesheet" href="../assets/css/material-icons.css">
	<link rel="stylesheet" href="../assets/css/materialize.css">
	<link rel="stylesheet" href="../assets/css/flexboxgrid.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
  <div id="toast">CompuSoftNet</div>
  <nav>
    <div class="nav-wrapper blue lighten-1">
      <a href="#!" class="brand-logo" style="font-size:1.5em">CompuSoftNet</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../">Cliente</a></li>
      </ul>
    </div>
  </nav>
  <main>
    <div class="row center-xs">
      <article class="col-xs-10 col-md-5 z-depth-1 FormEmpleadoLogin">
        <h4 class="center-align FormCliente-title">Iniciar Sesiòn</h4>
        <div class="row">

          <div class="input-field col-xs-12">
            <input id="emailLogin" type="email" class="validate" maxlength="80">
            <label for="emailLogin">Ingrese su e-mail *</label>
          </div>

          <div class="input-field col-xs-12">
            <input id="passwordLogin" type="password" class="validate" maxlength="80">
            <label for="passwordLogin">Ingrese su contraseña *</label>
          </div>

          <div class="col-xs-12 u-padding-bottom">
            <button class="waves-effect waves-light btn red" id="cancelar-login-admin">
              <i class="material-icons right">close</i>Cerrar
            </button>
            <button class="waves-effect waves-light btn blue lighten-1" id="entrar-login-admin">
              <i class="material-icons right">send</i>Entrar
            </button>
          </div>
        </div>
      </article>
    </div>
  </main>
  <footer class="">
    <h4>COMPUSOFT</h4>
    <h5>Todos los derechos reservados.</h5>
  </footer>
  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/materialize.js"></script>
  <script src="assets/js/login.js"></script>
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
</body>
</html>
