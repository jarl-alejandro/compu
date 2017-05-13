<?php
session_start(); // llamo a la funcion session_start para saber si el cliente si ha iniciado o no sesiòn
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title ?> | COMPUSOFTNET</title>

	<link rel="stylesheet" href="assets/css/material-icons.css">
	<link rel="stylesheet" href="assets/css/materialize.css">
	<link rel="stylesheet" href="assets/css/flexboxgrid.css">
	<link rel="stylesheet" href="assets/css/style.css">
  <?php
  if (isset($_SESSION["18e0707ea726c45bd34d5bc7d12111c265a05010"])) {
    if ($_SESSION["18e0707ea726c45bd34d5bc7d12111c265a05010"] == "empleado") {
      header("Location: admin/pedidos");
    }
  }
  ?>
</head>
<body>
<div id="toast">CompuSoftCONet</div>
<div class="containerLoader">
	<div class="loader">
		<div class="loader-inner pacman">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
</div>
<?php
	include "clientes/formulario.php";
	include "clientes/login/formulario.php";
	include "carrito/carrito.php";
?>
