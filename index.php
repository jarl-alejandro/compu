<?php
	/*
		Creo una variable  para el nombre de la pagina.
		Importo los componetes head y menu.
			head.php contiene en encabezado de la pagina y llama los archivos css
	*/
	$title = "Inicio";

	include "./head.php";
	include "./menu.php";
?>
<style>
	body{
		background: #e8e8e8;
	}
  main {
    margin-top: 0 !important;
  }
  .Preguntas article{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  footer{
    position: fixed;
    z-index: 111;
    bottom: 0;
  }
</style>
<div class="VideoContainer">
  <div class="row center-xs MisionVisonContainer">
    <h1 class="empresa col-xs-12 col-md-6">CompuSoftNet</h1>
    <div class="MisionVison">
      <h3 class="MisionVison-titulo">NUESTRA MISION</h3>
      <p class="MisionVison-mensaje col-xs-12">Buscar la excelencia en la provisión de la comunicación de datos, a través del uso de la mejor tecnología disponible y la preparación continua de nuestros recursos humanos, en beneficio de la comunidad, cliente y empresa</p>
    </div>
    <div class="MisionVison">
      <h3 class="MisionVison-titulo">NUESTRA VISION</h3>
      <p class="MisionVison-mensaje col-xs-12">Ser una empresa reconocida en el pais brindando mejores soluciones tecnologicas de la actualidad.</p>
    </div>
  </div>
</div>

<section class="Servicios" id="Servicios">
  <div class="Servicios-image"></div>
  <h3 class="Servicios-titulo">Nuestro servicio</h3>
  <div class="row center-xs">
    <p class="col-xs-12 col-md-6 Servicios-mensaje">
      Nuestra amplia gama de soluciones para el puesto de trabajo engloba posiciones fijas y de movilidad ofreciendo un mayor beneficio a tu negocio y a tus trabajadores.
    </p>
    <section class="col-xs-11 ServiceLayout">
      <div class="row center-xs">
        <article class="col-xs-11 col-sm-5 col-md-3 ServiciosItem z-depth-4">
          <h3>Ventas partes de PC</h3>
          <img src="assets/img/services1.jpg">
          <p>Venta de equipos y mantenimiento de PC</p>
        </article>
        <article class="col-xs-11 col-sm-5 col-md-3 ServiciosItem z-depth-4">
          <h3>Venta de Suministros</h3>
          <img src="assets/img/services2.jpg">
          <p>Equipos de Impresión,Cableado Estructurado de Voz, Datos</p>
        </article>
        <article class="col-xs-11 col-sm-5 col-md-3 ServiciosItem z-depth-4">
          <h3>Cableado Estructurado</h3>
          <img src="assets/img/services3.jpg">
          <p>Diseño-Instalación-Certificación Estándares ANSI-TIA-EIA/ISO-IEC</p>
        </article>
        <article class="col-xs-11 col-sm-5 col-md-3 ServiciosItem z-depth-4">
          <h3>Video Vigilancia</h3>
          <img src="assets/img/services4.jpg">
          <p>Monitoreo y visualizacion en cualquier hora y lugar</p>
        </article>
        <article class="col-xs-11 col-sm-5 col-md-3 ServiciosItem z-depth-4">
          <h3>Servidores</h3>
          <img src="assets/img/services5.jpg">
          <p>Optimice fácilmente las cargas de trabajo en el centro de datos</p>
        </article>
        <article class="col-xs-11 col-sm-5 col-md-3 ServiciosItem z-depth-4">
          <h3>Telefonía</h3>
          <img src="assets/img/services6.png">
          <p>Soluciones como:CDR,CALL CENTER,CONTACT CENTER</p>
        </article>
      </div>
    </section>
  </div>
</section>

<section class="Trabajos">
	<article class="diagonal-container">
		<h3 class="Trabajos-titulo">Trabajos recientes</h3>
		<div class="row center-xs">
			<p class="Trabajos-mensaje col-xs-6">
				Contamos con el aporte de profesionales con mucha experiencia en la industria
				de la computación y esto hace que COMPUSOFT se comprometa con sus clientes
			</p>
			<div class="col-xs-12 col-md-8">
				<section class="row center-xs TrabajosGaleria">
					<article class="col-xs-6 col-sm-6 col-md-3 TrabajosGaleriaItem">
						<img src="assets/img/item1.jpg">
						<div class="TrabajosOverlay">
							<h3 class="TrabajosOverlay-titulo">Instalacion de camaras</h3>
							<p  class="TrabajosOverlay-mensaje">Monitoreo y visualizacion en cualquier hora y lugar la estructura de red ya existente</p>
						</div>
					</article>
					<article class="col-xs-6 col-sm-6 col-md-3 TrabajosGaleriaItem">
						<img src="assets/img/item2.jpg">
						<div class="TrabajosOverlay">
							<h3 class="TrabajosOverlay-titulo">Cableado Estructurado</h3>
							<p  class="TrabajosOverlay-mensaje">Realizamos construcciones de Cableado Estructurado bajo normas internacionales</p>
					</article>
					<article class="col-xs-6 col-sm-6 col-md-3 TrabajosGaleriaItem">
						<img src="assets/img/item3.jpg">
						<div class="TrabajosOverlay">
							<h3 class="TrabajosOverlay-titulo">Telefonia IP</h3>
							<p  class="TrabajosOverlay-mensaje">Ofrecemos la solución para tus comunicaciones desde centralitas convencionales hasta la ultima tecnología en voz sobre IP.</p>
					</article>
					<article class="col-xs-6 col-sm-6 col-md-3 TrabajosGaleriaItem">
						<img src="assets/img/item4.jpg">
						<div class="TrabajosOverlay">
							<h3 class="TrabajosOverlay-titulo">Data Center</h3>
							<p  class="TrabajosOverlay-mensaje">Ofrecemos la solución para tus comunicaciones desde centralitas convencionales hasta la ultima tecnología en voz sobre IP.</p>
					</article>

					<article class="col-xs-6 col-sm-6 col-md-3 TrabajosGaleriaItem">
						<img src="assets/img/item5.jpg">
						<div class="TrabajosOverlay">
							<h3 class="TrabajosOverlay-titulo">Racks de Comunicaciones</h3>
							<p  class="TrabajosOverlay-mensaje">Nuestros racks de comunicaciones le permiten organizar, gestionar y administrar de forma centralizada el núcleo de las comunicaciones</p>
					</article>
					<article class="col-xs-6 col-sm-6 col-md-3 TrabajosGaleriaItem">
						<img src="assets/img/item6.jpg">
						<div class="TrabajosOverlay">
							<h3 class="TrabajosOverlay-titulo">Video Vigilancia</h3>
							<p  class="TrabajosOverlay-mensaje">Nuestra cartera de productos abarca opciones de vídeo vigilancia analógicas, de IP e híbridas que se pueden integrar de forma perfecta en su arquitectura ya existente</p>
					</article>
					<article class="col-xs-6 col-sm-6 col-md-3 TrabajosGaleriaItem">
						<img src="assets/img/item7.jpg">
						<div class="TrabajosOverlay">
							<h3 class="TrabajosOverlay-titulo">Centrales Telefonicas</h3>
							<p  class="TrabajosOverlay-mensaje">Instalaciones Y Reparacion de centrales telefonicas,somos personal calificado con muchos años de experiencia.</p>
					</article>
					<article class="col-xs-6 col-sm-6 col-md-3 TrabajosGaleriaItem">
						<img src="assets/img/item8.png">
						<div class="TrabajosOverlay">
							<h3 class="TrabajosOverlay-titulo">Instalacion de camaras</h3>
							<p  class="TrabajosOverlay-mensaje">Monitoreo y visualizacion en cualquier hora y lugar la estructura de red ya existente</p>
					</article>
				</section>
			</div>
		</div>
	</article>
</section>

<section class="Marcas">
  <div class="Marcas-img"></div>
  <div class="MarcasItemLayout">
    <div class="MarcasItem"><img src="assets/img/marcas/php-logo.png"></div>
    <div class="MarcasItem"><img src="assets/img/marcas/Grandstream-logo.png"></div>
    <div class="MarcasItem"><img src="assets/img/marcas/mikrotik.png"></div>
    <div class="MarcasItem"><img src="assets/img/marcas/cisco_logo.png"></div>

    <div class="MarcasItem"><img src="assets/img/marcas/genius.gif"></div>
    <div class="MarcasItem"><img src="assets/img/marcas/tp-link-logo.png"></div>
    <div class="MarcasItem"><img src="assets/img/marcas/Acer-logo.png"></div>

    <div class="MarcasItem"><img src="assets/img/marcas/epson.png"></div>
    <div class="MarcasItem"><img src="assets/img/marcas/toshiba.png"></div>
    <div class="MarcasItem"><img src="assets/img/marcas/apc.png"></div>

  </div>
</section>

<div class="Preguntas row center-xs">
	<article class="col-xs-11">
		<i class="material-icons" style="width:100%;">perm_phone_msg</i>
		<h3 class="col-xs-12 col-md-9" style="margin:0">¿Tiene alguna pregunta o necesita un presupuesto personalizado?</h3>
		<p class="col-xs-12">En Compusoft acercamos soluciones tecnológicas innovadoras a nuestros clientes para proporcionar un impacto positivo en su organización no dudes en llamarnos 023711934</p>
	</article>
</div>
</main>
<?php
// Importo el footer que tiene los cierres de html y body. llamos los archivos de javascript
	include "./footer.php";
?>
<script type="text/javascript">
$( document ).ready(function() {

  scaleVideoContainer();

  initBannerVideoSize('.video-container .poster img');
  initBannerVideoSize('.video-container .filter');
  initBannerVideoSize('.video-container video');

  $(window).on('resize', function() {
      scaleVideoContainer();
      scaleBannerVideoSize('.video-container .poster img');
      scaleBannerVideoSize('.video-container .filter');
      scaleBannerVideoSize('.video-container video');
  });

});

function scaleVideoContainer() {

  var height = $(window).height() + 5;
  var unitHeight = parseInt(height) + 'px';
  $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){

  $(element).each(function(){
      $(this).data('height', $(this).height());
      $(this).data('width', $(this).width());
  });

  scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

  var windowWidth = $(window).width(),
  windowHeight = $(window).height() + 5,
  videoWidth,
  videoHeight;

  // console.log(windowHeight);

  $(element).each(function(){
      var videoAspectRatio = $(this).data('height')/$(this).data('width');

      $(this).width(windowWidth);

      if(windowWidth < 1000){
          videoHeight = windowHeight;
          videoWidth = videoHeight / videoAspectRatio;
          $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

          $(this).width(videoWidth).height(videoHeight);
      }

      $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

  });
}
</script>
</body>
</html>
