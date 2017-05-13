<?php
// Pregunto si el cliente esta logueado el muestro el boton de carrito de compras
if (isset($_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"])){ ?>
  <p class="messageMisProductos">Click para ver mis pedidos</p>
  <a class="btn-floating btn-large waves-effect waves-light blue darken-3 Carrito-btn">
    <i class="material-icons">add_shopping_cart</i>
  </a>
<?php } ?>
<div class="cambiarPasswordContainer">
  <article class="card col-xs-10 col-md-4 col-xs-offset-1 col-md-offset-4">
    <h3 class="cambiarPasswordContainer-title">Cambiar Contraseña</h3>
    <div class="input-field col s12 m6">
      <input id="cambiarPasswordForm" type="password" class="validate">
      <label for="cambiarPasswordForm">Ingresa tu nueva contraseña</label>
    </div>
    <div class="input-field col s12 m6">
      <input id="cambiarPasswordForm2" type="password" class="validate">
      <label for="cambiarPasswordForm2">Repite tu contraseña</label>
    </div>
    <div class="center-xs" style="padding-bottom:1em">
      <button class="waves-effect waves-light btn red" id='CancelarCambiarPass'>Cerrar</button>
      <button class="waves-effect waves-light btn cyan" id="AceptCambiarPass">Aceptar</button>
    </div>
  </article>
</div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/materialize.js"></script>
<script src="assets/js/buscador-table.js"></script>
<script src="assets/js/paginador-table.js"></script>
<script type="text/javascript" src="assets/js/validaciones.js"></script>
<script>
  // Esta funcion muestra en mensaje en pantalla y lo desaparace 1seg y medio despues de haberlo mostrado
  function toast (msg) {
    window.$('#toast').html(msg)
    window.$('#toast').slideDown()
    setTimeout(function () {
      window.$('#toast').slideUp()
    }, 1500)
  }
  window.$('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    })

$(document).ready(function(){
  var altura = $('nav').offset().top;

  $(window).on('scroll', function(){
    if ( $(window).scrollTop() > altura ){
      $('nav').addClass('menu-fixed');
      $('.Login-btnShow').addClass('login-fixed')
    } else {
      $('nav').removeClass('menu-fixed');
      $('.Login-btnShow').removeClass('login-fixed')
    }
  })

})
</script>
<script src="clientes/cliente.js"></script>
<script src="clientes/login/login.js"></script>
<script src="carrito/carrito.js"></script>
<script src="clientes/login/cambiarPassword.js"></script>
