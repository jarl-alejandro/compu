<?php
	/*
		Creo una variable  para el nombre de la pagina.
		Importo los componetes head y menu.
			head.php contiene en encabezado de la pagina y llama los archivos css
	*/
	$title = "Redes de Datos";
	include "./head.php";
	include "./menu.php";
?>
<style>
  main{
    margin-top: 0em;
  }
</style>
<section>
  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 5</div>
      <img src="assets/img/r3.jpg" >
      <div class="text">REDES</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 5</div>
      <img src="assets/img/telefonia-fija.jpg">
      <div class="text">TELEFONIA</div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">3 / 5</div>
      <img src="assets/img/telefonia-ip.jpg">
      <div class="text">TELEFONIA IP</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">4 / 5</div>
      <img src="assets/img/videovigilancia1.jpg" >
      <div class="text">PUNTO DE VIDEO</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">5 / 5</div>
      <img src="assets/img/inalambrico.png" >
      <div class="text">ENLACE INALAMBRICO</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
  </div>
</section>
<div class="row center-xs">
  <section class="RedesDatos">
    <article class="card z-depth-3 RedesDatos-item">
      <h3 class="RedesDatos-title"><i class="material-icons">spellcheck</i> REDES</h3>
      <p class="RedesDatos-message">Instalacion de puntos de red certificados en categorias 5E 6 6A 7 7A,
        realizamos un diseño específico para cubrir su necesidad; y una vez aprobada procedemos con la
        instalación certificada
      </p>
    </article>
    <article class="card z-depth-3 RedesDatos-item">
      <h3 class="RedesDatos-title"><i class="material-icons">mic</i> PUNTO DE VOZ</h3>
      <p class="RedesDatos-message">Una red de voz y datos,unifica en una misma infraestructura de
        telecomunicaciones los servicios de voz, con un sistema de gestión centralizado, aportando beneficios
        para la empresa.
      </p>
    </article>
    <article class="card z-depth-3 RedesDatos-item">
      <h3 class="RedesDatos-title"><i class="material-icons">videocam</i> PUNTO DE VIDEO</h3>
      <p class="RedesDatos-message">En las cámaras de red o los servidores de vídeo puedemos Añadir una
        cámara de red, configurar el horario de grabación Configurar motores analíticos
        (licencia Enterprise únicamente)
      </p>
    </article>
    <article class="card z-depth-3 RedesDatos-item">
      <h3 class="RedesDatos-title" style="font-size:1.6em"><i class="material-icons">settings_input_antenna</i> ENLACE INALAMBRICO</h3>
      <p class="RedesDatos-message">Los enlaces inalámbricos ofrecen la posibilidad de conectar a Internet
        lugares de difícil acceso donde no existen otras posibilidades de servicios de telecomunicaciones.
      </p>
    </article>
  </section>
</div>
<div class="row" style="justify-content: center;">
  <section class="RedesDatosServicios col-xs-11">
    <h3 class="RedesDatosServicios-title">SERVICIOS</h3>
    <section class="RedesDatosServiciosLayout">
      <article class="col-xs-12 col-md-6">
        <p class="RedesDatosServicios-message">En Compusoft estamos especializados en la instalación y administración de Redes, desrrollando un conjunto de técnicas orientadas a mantener una red operativa, eficiente, segura y constantemente monitorizada y con una planificación adecuada y propiamente documentada.</p>
        <ul class="RedesDatosServicios-list collection">
          <li class="collection-header"><h5>Realizamos las siguientes actividades:</h5></li>
          <li class="collection-item"><i class="material-icons">toys</i>
            Instalación completa de redes (datos, voz, imagen), de diversos tipos (inalámbricas, cableadas).
          </li>
          <li class="collection-item"><i class="material-icons">toys</i>
            Mejora de eficiencia de la red y optimización del uso de los recursos.
          </li>
          <li class="collection-item"><i class="material-icons">toys</i>
            Diagnóstico y resolución de incidencia
          </li>
          <li class="collection-item"><i class="material-icons">toys</i>
            Control de cambios y actualizaciones en la red de modo que ocasione las menos interrupciones posibles
          </li>
          <li class="collection-item"><i class="material-icons">toys</i>
            Certificacion de cableado estructurado
          </li>
        </ul>
      </article>
      <figure class="col-xs-12 col-md-6" style="display: flex;align-items: center;margin:1em 0 1em 0">
        <img src="assets/img/r5.jpg" alt="" class="RedesDatosServicios-image"
        style="width:100%;">
      </figure>
    </section>
  </section>
</div>
<div class="row center-xs">
  <section class="RedesDatosInstalacion col-xs-11">
    <h4 class="RedesDatosInstalacion-title">Instalación y Mantenimiento de Redes de Cableado Estructurado</h4>
    <div class="RedesDatosInstalacion-imagen">
      <img src="assets/img/banner1.jpg" alt="Redes de Datos" height="300">
    </div>
    <article class="row center-xs">
      <div class="col-xs-9">
        <p class="RedesDatosInstalacion-messages">Compusoft ofrece soluciones integrales en comunicaciones para su Empresa. Planeamos e implementamos redes de cableado estructurado voz-datos, bajo Normas Técnicas Internacionales en estándares de Categoría 5, 6, 7/Class E de ISO/EIC y TIA. </p>
        <p class="RedesDatosInstalacion-messages">Nuestro proyectos los implementamos usando materiales de la mejor calidad, de los fabricantes más reconocidos: AMP, 3M, Leviton, Brand-Rex, Avaya y Corning. </p>
        <p class="RedesDatosInstalacion-messages">Contamos una amplia experiencia comprobable en instalación de soluciones de cableado estructurado en empresas de todos los sectores, como también con el personal técnico idóneo para desarrollar los proyectos</p>
      </div>
    </article>
  </section>
</div>
</main>
<?php
// Importo el footer que tiene los cierres de html y body. llamos los archivos de javascript
	include "./footer.php";
?>
<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>
