<div class="row center-xs full-width">
  <form class="col s10 push-s1 col m7 push-m2 z-depth-1" id="formulario-cliente" name="formularioCliente">
    <h4 class="center-align FormCliente-title">Registro de Cliente</h4>
    <div class="row">
      <div class="input-field col s12 m6">
        <input id="cedula" type="text" class="validate" maxlength="13" onkeypress="numeros()">
        <label for="cedula">Ingrese su numero de cedula *</label>
      </div>

      <div class="input-field col s12 m6">
        <input id="nombre" type="text" class="validate" maxlength="80" onkeypress="textos()">
        <label for="nombre">Ingrese su nombre y apellido *</label>
      </div>

      <div class="input-field col s12 m6">
        <input id="email" type="email" class="validate" maxlength="80">
        <label for="email">Ingrese su e-mail *</label>
      </div>

      <div class="input-field col s12 m6">
        <input id="telefono" type="text" class="validate" maxlength="10" onkeypress="numeros()">
        <label for="telefono">Ingrese su telefono *</label>
      </div>

      <div class="input-field col s12 m6">
        <input id="password" type="password" class="validate" maxlength="80">
        <label for="password">Ingrese su contraseña</label>
      </div>


      <div class="input-field col s12 m6">
        <input id="direccion" type="text" class="validate" maxlength="80">
        <label for="direccion">Ingrese su direccion *</label>
      </div>

      <div class="input-field col s12 m6">
        <input id="Repeatpassword" type="password" class="validate" maxlength="80">
        <label for="Repeatpassword">Repite su contraseña</label>
      </div>

      <div class="input-field col s12 m6">
        <select id="sexo">
          <option value="" selected></option>
          <option value="1">Hombre</option>
          <option value="0">Mujer</option>
        </select>
        <label label="label-sexo">Ingrese su sexo</label>
      </div>
      <div class="col-xs-12 u-padding-bottom">
        <button class="waves-effect waves-light btn red" id="cancelar-cliente">
          <i class="material-icons right">close</i>Cancelar
        </button>
        <button class="waves-effect waves-light btn blue lighten-1" id="guardar-cliente">
          <i class="material-icons right">send</i>Aceptar
        </button>
      </div>
    </div>
  </form>
</div>
