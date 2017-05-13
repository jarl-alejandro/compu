<div class="row center-xs full-width">
  <form class="col s10 push-s1 col m5 z-depth-1" id="formulario-login" name="formularioLogin">
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
      <a href="#" class="center-align col-xs-12 olvarPassword">Se me olvido la contraseña</a>
      <div class="col-xs-12 u-padding-bottom">
        <button class="waves-effect waves-light btn red" id="cancelar-login">
          <i class="material-icons right">close</i>Cerrar
        </button>
        <button class="waves-effect waves-light btn blue lighten-1" id="entrar-login">
          <i class="material-icons right">send</i>Entrar
        </button>
      </div>
    </div>
  </form>
</div>
