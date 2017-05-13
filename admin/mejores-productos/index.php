<?php
//Importo los componetes head
	include "../head.php";
  include "../../config/conexion_mysql.php";

  $mejores = $db->query("SELECT id_ped, nom_ped, SUM(cant_ped) as cant FROM detalle_pedido GROUP BY prod_ped
              ORDER BY SUM(cant_ped) DESC LIMIT 0 , 5");
  $mejores1 = $db->query("SELECT id_ped, nom_ped, SUM(cant_ped) as cant FROM detalle_pedido GROUP BY prod_ped
                          ORDER BY SUM(cant_ped) DESC LIMIT 0 , 5");
?>
<h3 class="center-align gray-text u-no-margin full-width">Mejores Productos</h3>
<div id="container"></div>
</main>
<?php
// Importo el footer que tiene los cierres de html y body. llamos los archivos de javascript
	include "../footer.php";
?>

<script src='../assets/js/highcharts.js'></script>
<script src='../assets/js/highcharts-3d.js'></script>
<script src='../assets/js/exporting.js'></script>

<script type="text/javascript">
var chart = Highcharts.chart('container', {
  chart: {
    renderTo: 'container',
    type: 'column',
    options3d: {
      enabled: true,
      alpha: 15,
      beta: 15,
      depth: 50,
      viewDistance: 25
    }
  },
  title: {
    text: 'Los 5 Mejores Productos'
  },

  subtitle: {
    text: ''
  },

  xAxis: {
    categories: [
      <?php while ($row = $mejores->fetch()){ ?>
        '<?= $row["nom_ped"] ?>',
      <?php } ?>
    ]
  },

  series: [{
    type: 'column',
    colorByPoint: true,
    data: [
      <?php while ($row = $mejores1->fetch()){ ?>
        <?= $row["cant"] ?>,
      <?php } ?>
    ],
    showInLegend: false
  }]

});
</script>
</body>
</html>
