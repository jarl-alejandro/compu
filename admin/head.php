<?php
session_start();

if (!isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])) {
	header("Location: ../");
}
else {
	if ($_SESSION["18e0707ea726c45bd34d5bc7d12111c265a05010"] != "empleado")
		header("Location: ../");
}
$cargo = $_SESSION["e0d6ae5cf2a2d0c1075943593a36cc5377382a05"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Administrador | CompuSoftNet</title>
  <link rel="stylesheet" href="../../assets/css/material-icons.css">
	<link rel="stylesheet" href="../../assets/css/materialize.css">
	<link rel="stylesheet" href="../../assets/css/flexboxgrid.css">
	<link rel="stylesheet" href="../../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
  <div id="toast">CompuSoftNet</div>
  <nav>
    <div class="nav-wrapper blue lighten-1">
      <a href="#!" class="brand-logo" style="font-size:1.5em">CompuSoftNet</a>
      <ul class="right hide-on-med-and-down">
        <!-- Verifico que tipo de empleado es y lo redirecciono -->
        <?php if ($cargo == "Administrador"){ ?>
          <li><a href="../equipo">Equipo</a></li>
          <li><a href="../empleados">Empleados</a></li>
        <?php } else if ($cargo == "Vendedor") { ?>
          <li><a href="../pedidos">Pedidos</a></li>
        <?php } ?>
        <li><a href="../promociones">Promociones</a></li>
        <li><a href="../mejores-productos">Mejores Productos</a></li>
        <li><a href="../pedidos-facturados">Pedidos Facturados</a></li>
        <li><a id="changePassoword">Cambiar Contraseña</a></li>
        <li><a href="../../service/logout.php"><i class="material-icons">exit_to_app</i></a></li>
      </ul>
    </div>
  </nav>
  <main>
    <div class="row center-xs">
      <section class="PasswordForm card z-depth-2 col-xs-10 col-md-5">
        <h4 class="title">Cambiar contraseña</h4>
        <div class="input-field col-xs-12">
          <input id="passwordCambiar" type="password" class="validate">
          <label for="passwordCambiar">Ingreso su nueva contraseña</label>
        </div>
        <div class="row center-xs col-xs-12" style="margin-bottom:1em !important;">
          <button class="waves-effect waves-light btn red" id="closePassword" style="margin-right:1em;">
            <i class="material-icons left">close</i>Cerrar
          </button>
          <button class="waves-effect waves-light btn blue" id="guardarPassword">
            <i class="material-icons left">send</i>Guardar
          </button>
        </div>
      </section>
    </div>
