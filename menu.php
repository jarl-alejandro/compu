<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">Telefonia IP</a></li>
  <li class="divider"></li>
  <li><a href="#!">Telefonia Digital</a></li>
</ul>
<a href="index.php" class="brand-logo">
  <img src="assets/img/logo.png" class="Logo">
</a>
<nav>
  <div class="nav-wrapper">
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

    <ul class="right hide-on-med-and-down">
      <li><a href="index.php">Inicio</a></li>
      <li><a href="index.php#Servicios">Servicio Generales</a></li>
      <li><a href="redes.php">Redes</a></li>
      <li><a href="promociones.php">Promociones</a></li>
      <li><a href="productos.php">Productos</a></li>
      <li><a href="#" class="registro-clientes">Registro clientes</a></li>
      <li><a href="contactenos.php">Contactenos</a></li>
      <li><a href="acerca.php">Acerca De</a></li>
      <?php
      if (isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])){ ?>
        <li><a class="cambiarPassword">Cambiar Contraseña</a></li>
      <?php } ?>
    </ul>
    <ul class="side-nav" id="mobile-demo">
      <li><a href="index.php">Inicio</a></li>
      <li><a href="index.php#Servicios">Servicio Generales</a></li>
      <li><a href="redes.php">Redes</a></li>
      <li><a href="promociones.php">Promociones</a></li>
      <li><a href="productos.php">Productos</a></li>
      <li><a href="#" class="registro-clientes">Registro clientes</a></li>
      <li><a href="contactenos.php">Contactenos</a></li>
      <li><a href="acerca.php">Acerca De</a></li>
      <?php
      if (isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])){ ?>
        <li><a class="cambiarPassword">Cambiar Contraseña</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>
<div class="row end-xs Cliente-content">
  <?php
  // Preguntos si no esta loguqedo el usario le muestro el boton iniciar sesion.
  // Caso contrario el muestro el mensaje Bienvenido con su nombre y el boton de cerrar sesiòn.
  if (!isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])){ ?>
    <a class="waves-effect waves-light btn Login-btnShow"
      style="display: flex;background: #0054a6;">
      <i class="material-icons" style="margin-right:5px">shopping_cart</i>Inicia sesíon para tus pedidos
    </a>
  <?php } else { ?>
    <h5 class="Cliente-nombre">Bienvenido: <?=  $_SESSION["4832ec78c988b19caba3064d548ebce5d09b86ed"]?> </h5>
    <a class="waves-effect waves-light btn red lighten-1 Cliente-logout" href="service/logout.php">
      <i class="material-icons">exit_to_app</i>
    </a>
  <?php } ?>

</div>

<main>
