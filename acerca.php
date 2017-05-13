<?php
	/*
		Creo una variable  para el nombre de la pagina.
		Importo los componetes head y menu.
			head.php contiene en encabezado de la pagina y llama los archivos css
	*/
	$title = "Acerca";

	include "./head.php";
	include "./menu.php";

	include "config/conexion_mysql.php";
	$equipos = $db->query("SELECT * FROM equipo");
?>

<section class="row center-xs">
	<h3 class="center-align Acerca-titulo col-xs-12">SOBRE NOSOTROS</h3>
	<p class="center-align col-xs-8 Acerca-mensaje">Somos una empresa comprometida con el servicio otorgando valor a cada solución ofrecida. Es por este motivo que nuestro portafolio de servicios , nos preocupamos de la calidad en cada uno de los procesos que se siguen, desde el contacto inicial con el cliente hasta el día a día del servicio entregado.</p>

	<!-- Aqui va el slider -->
	<div class="Acerca-slide col-xs-12">
		<div class="Acerca-slide--inner">
			<section class="col-xs-12"><img src="assets/img/dropbox.jpg"></section>
			<section class="col-xs-12"><img src="assets/img/fondoServicio.jpg"></section>
			<section class="col-xs-12"><img src="assets/img/dropbox.jpg"></section>
			<section class="col-xs-12"><img src="assets/img/fondoServicio.jpg"></section>
			<section class="col-xs-12"><img src="assets/img/dropbox.jpg"></section>
		</div>
		<button class="waves-effect waves-light btn btn-flat" id="anterior">
			<i class="material-icons">navigate_before</i>
		</button>
		<button class="waves-effect waves-light btn btn-flat" id="siguiente">
			<i class="material-icons">navigate_next</i>
		</button>
	</div>
</section>

<section class="row center-xs" style="margin-bottom:1em !important;">
	<h3 class="center-align Acerca-titulo col-xs-12">NUESTRO EQUIPO DE TRABAJO</h3>
	<div class="col-xs-11 EquipoLayout">
		<?php while ($row = $equipos->fetch()){ ?>
			<article class="card Equipo">
				<div class="Equipo-container">
					<img class="Equipo-img" src="media/equipo/<?= $row["equi_img"] ?>" alt="">
					<div class="Equipo-info">
						<p class="Equipo-nombre"><?= $row["equi_nombre"] ?></p>
						<p class="Equipo-cargo"><?= $row["equi_cargo"] ?></p>
					</div>
				</div>
				<div class="center-aling">
					<p class="Equipo-detalle"><?= $row["equi_det"] ?></p>
				</div>
			</article>
		<?php } ?>
	</div>
</section>
</main>
<?php
// Importo el footer que tiene llamos los archivos de javascript y el footer
	include "./footer.php";
?>
<script>
	/** Slider
	* creo una variable index para poder moverme en el slider
	* selecion con jQuery el container principal del slider, el slider inner que es el elemto que muevo
	* len para saber cuantos item tengo
	*/
	var index = 0;
	var $slider = $('.Acerca-slide')
	var section = $slider.find('section')
	var $sliderInner = $('.Acerca-slide--inner')
	var len = section.length

	/**
	* pongo el ancho dependiento del elemento de items en el slider
	*/
	$sliderInner.css('width', 100*len+'%')
	section.css('width', 100/len+'%')

	/**
	* Esta funcion se encarga de mover el slider para adelante y para atras dependiento del index
	*/
	function moverSlider () {
		if (index === 0)
			$sliderInner.css('left', 0)
		else if(index > 0)
			$sliderInner.css('left', '-'+100*index+'%')
	}

	/**
	* Esta funciona se encarga de mover la funcion automaticamente dependiendo del intarvalo
	* llama a la funcion moveSlider para mover el slider
	*/

	function setIntervalSlider () {
		if (index < len-1) {
			index++
			moverSlider()
		}
		else index = 0
	}

	/*
	* refreso el setInterval
	*/
	function reFreshInterval() {
		setTimeout(function() {
			sliderInterval = setInterval(setIntervalSlider, 4000)
		}, 3000);
	}

	// setInterval llama a la funcion setIntervalSlider para mover el slider cada 4seg
	var sliderInterval = setInterval(setIntervalSlider, 4000)


	/**
	* Este evento se encarga de llamar a la funcion moverSlider par mover hacia atras
	* limpio el setInterval y llama a la funcion reFreshInterval para que despues de 3seg inicie otra vez el
	*s liderInterval
	*/
	$('#anterior').on('click', function (e) {
		 if (index > 0) {
			clearInterval(sliderInterval)
			index--
			moverSlider()
			reFreshInterval()
		}
	})

	/**
	* Este evento se encarga de llamar a la funcion moverSlider par mover hacia adelante
	* limpio el setInterval y llama a la funcion reFreshInterval para que despues de 3seg inicie otra vez el
	*s liderInterval
	*/
	 $('#siguiente').on('click', function () {
		 if (index < len-1) {
			clearInterval(sliderInterval)
			index++
			moverSlider()
			reFreshInterval()
		}
	})

</script>
</body>
</html>
