<?php
//Importo los componetes head
	include "../head.php";
?>
<section id="FormContainer" class="row center-xs">
  <h4 class="EquipoForm-title col-xs-12 center-align title">Nuevo Integrante</h4>
  <article class="row" style="width: 90%;margin: 0 auto !important;">
    <div class="input-field col-xs-12 col-md-6">
      <input id="cedula" type="text" class="validate" maxlength="13" onkeypress="numeros()">
      <label for="cedula">Ingreso la cedula</label>
    </div>
    <div class="input-field col-xs-12 col-md-6">
      <input id="nombre" type="text" class="validate" onkeypress="textos()" maxlength="140">
      <label for="nombre">Ingreso el nombre completo</label>
    </div>
    <div class="input-field col-xs-12 col-md-6">
      <input id="email" type="email" class="validate">
      <label for="email">Ingreso el E-mail</label>
    </div>

    <div class="input-field col-xs-12 col-md-6">
      <select id="cargo">
        <option value="" disabled selected>Selecione el cargo</option>
        <option value="Administrador">Administrador</option>
        <option value="Vendedor">Vendedor</option>
      </select>
      <label for="cargo">Cargo</label>
    </div>
    <div class="input-field col-xs-12 col-md-6">
      <input id="telefono" type="text" class="validate" maxlength="10" onkeypress="numeros()">
      <label for="telefono">Ingreso el telefono</label>
    </div>
    <div class="input-field col-xs-12 col-md-6">
      <input id="direccion" type="text" class="validate" maxlength="140">
      <label for="direccion">Ingreso la direccion</label>
    </div>
  </article>
  <div class="row center-xs col-xs-12">
    <button class="waves-effect waves-light btn red" id="close" style="margin-right:1em;">
      <i class="material-icons left">close</i>Cerrar
    </button>
    <button class="waves-effect waves-light btn blue" id="guardar" data-type="guardar" data-id="">
      <i class="material-icons left">send</i>Guardar
    </button>
  </div>
</section>

<section class="EmpleadosLayout">
  <header class="row center-xs">
    <h2 class="center-aling title">Empleados</h2>
  </header>
  <div class="row center-xs">
    <div class="containerTable col-xs-10"></div>
  </div>
</section>
<a class="btn-floating btn-large waves-effect waves-light blue darken-3" id='showForm'>
	<i class="material-icons">add</i>
</a>
</main>
<?php
// Importo el footer que llamo los archivos de javascript
	include "../footer.php";
?>
<script src="app/index.js"></script>
</body>
</html>
