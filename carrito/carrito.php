<article class="row center-xs full-width">
	<div class="col s10 push-s1 col m7 push-m2 Carrito">
		<div class="z-depth-1">
			<table class="bordered highlight responsive-table">
				<thead>
					<tr>
						<th>CANT</th>
						<th>PRODUCTO</th>
						<th>PRECIO</th>
						<th>TOTAL</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="detalle-carrito">
					<tr>
						<td colspan="5" class="center-align">No hay productos</td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td style="font-weight:bold;">TOTAL $</td>
						<td style="font-weight:bold;" id="total-carrito">0.00</td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<div class="col-xs-12 Carrito-footer">
				<button class="waves-effect waves-light btn red darken-2" id="cancelar-carrito">Cancelar Pedido</button>
				<button class="waves-effect waves-light btn red" id="cerrar-carrito">Cerrar</button>
				<button class="waves-effect waves-light btn blue lighten-1" id="comprar-carrito">Enviar Pedido</button>
			</div>
		</div>
	</div>
</article>

<div class="row center-xs">
  <form class="col s10 push-s1 col m5 push-m4 z-depth-1" id="formulario-cantCanasta" name="formulariocantCanasta">
    <h4 class="center-align FormCliente-title">Ingresa la cantidad que deses</h4>
    <div class="row">
      <div class="input-field col s12">
        <input id="cantCanasta" type="number" class="validate" maxlength="80">
        <label for="cantCanasta" class="cant-canasta">Cuantos deseas</label>
      </div>
      <div class="col-xs-12 u-padding-bottom">
        <button class="waves-effect waves-light btn red" id="cancelar-canasta">
          <i class="material-icons right">close</i>Cerrar
        </button>
        <button class="waves-effect waves-light btn blue lighten-1" id="agregar-canasta">
          <i class="material-icons right">send</i>Agregar
        </button>
      </div>
    </div>
  </form>
</div>
