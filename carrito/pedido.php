<?php
session_start();
include "../config/conexion_mysql.php";
include "../config/helpers.php";

/**
* Obtenemos el total y los productos que el cliente pedio por POST
* Obtenemos el numero de cedula del cliente

* Obtenemos el codigo para el pedido y lo actualizamos
*/
$codigo = getCode('cont_conf', 'PE');
updateCodigo('cont_conf');

$cliente = $_SESSION["1a0b858b9a63f19d654116c9f37ae04194ccfdd0"];
$nombre = $_SESSION["4832ec78c988b19caba3064d548ebce5d09b86ed"];
$address = $_SESSION["a88b7dcd1a9e3e17770bbaa6d7515b31a2d7e85d"];
$total = $_POST["total"];
$carrito = $_POST["carrito"];
$estado = "sinAtencion";
/*
* Guardamos el pedido en mysql
* uso una sentencia prepara para ihacer la insert a la db
*/
$pedido = $db->prepare("INSERT INTO pedido (clien_ped, tot_ped, cod_ped, nom_ped, est_ped)
                        VALUES (?, ?, ?, ?, ?)");

// Ingreso los datos a la sentencia prepara
$pedido->bindParam(1, $cliente);
$pedido->bindParam(2, $total);
$pedido->bindParam(3, $codigo);
$pedido->bindParam(4, $nombre);
$pedido->bindParam(5, $estado);

//Ejecuto la sentencia prepara y recien va a guardar los datos a la tabla
$pedido->execute();

/**
* Guardamos en mysql el detall del pedido
*/
$detalle = $db->prepare("INSERT INTO detalle_pedido (nom_ped, prod_ped, cant_ped, prec_ped, tot_ped, cod_ped)
            VALUES (?, ?, ?, ?, ?, ?)");

//Recorro en un foreach para obtener los productos que el cliente pidio
foreach ($carrito as $row) {
  $id = $row["id"];
  $nombre = $row["nombre"];
  $precio = $row["precio"];
  $cant = $row["cant"];
  $total = $row["total"];

  $detalle->bindParam(1, $nombre);
  $detalle->bindParam(2, $id);
  $detalle->bindParam(3, $cant);
  $detalle->bindParam(4, $precio);
  $detalle->bindParam(5, $total);
  $detalle->bindParam(6, $codigo);

  $detalle->execute();
}

//Obtengo el pedido
$pedido_query = $db->query("SELECT * FROM pedido WHERE cod_ped='$codigo'");
$pedido = $pedido_query->fetch();

$query = $db->query("SELECT * FROM detalle_pedido WHERE cod_ped='$codigo'");

// AQui voy a enviar el correo electronico
include '../class.smtp.php';
include '../class.phpmailer.php';
$mail = new PHPMailer();

//indico a la clase que use SMTP
$mail->isSMTP();

//permite modo debug para ver mensajes de las cosas que van ocurriendo
//$mail->SMTPDebug = 1;

//Debo de hacer autenticación SMTP
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";

//Indico el servidor de Gmail para SMTP
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;

// Indico la clave y usaurio de gmail con la que se enviara el correo

$mail->Username = "ventas.compusoftnet@gmail.com";
$mail->Password = "ventas123";

// Informacion de quien enviara el mensaje
$mail->SetFrom($address, $pedido['nom_ped']);
$mail->AddReplyTo($address, $pedido['nom_ped']);

include "../config/conexion_mysql.php";


// Titulo del mensja
$mail->Subject = utf8_decode("Pedido de compra del Señor(a) ".$pedido['nom_ped']."");

/**
* Formato del mensaje aqui esta la informacion del pedido
* como los productos que el cliente pidio
*/

$html = "<!DOCTYPE html>
  <html lang='es'>
  <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
  </head>
  <body style='background: #e8e8e8'>
   <style type='text/css'>
    table > thead > tr:hover, table > tbody > tr:hover {
      background: #42A5F5;
      color: white;
    }
  </style>
    <h1 style='text-align: center;color: #616161;'>Señor(a) ".$pedido['nom_ped']." ha hecho un el siguiente pedido a CompuSoftNet</h1>
    <table style='width: 100%;display: table;color: #2f2f2f;background: white;border-collapse: collapse;'>
      <thead align='center'>
        <tr style='border-bottom: 1px solid #d0d0d0;transition: all ease .3s;cursor: pointer;'>
          <th style='text-transform: uppercase;border:none;padding:.8em'>#</th>
          <th style='text-transform: uppercase;border:none;padding:.8em'>Codigo</th>
          <th style='text-transform: uppercase;border:none;padding:.8em'>Cant</th>
          <th style='text-transform: uppercase;border:none;padding:.8em'>Producto</th>
          <th style='text-transform: uppercase;border:none;padding:.8em'>Precio</th>
          <th style='text-transform: uppercase;border:none;padding:.8em'>Total</th>
        </tr>
      </thead>
      <tbody align='center'>";

$index = 0;

while($row = $query->fetch()) {
  $index++;

  $html .= "<tr style='border-bottom: 1px solid #d0d0d0;transition: all ease .3s;cursor: pointer;'>
    <td style='border:none;padding:.8em'>$index</td>
    <td style='border:none;padding:.8em'>".$row['prod_ped']."</td>
    <td style='border:none;padding:.8em'>".$row['cant_ped']."</td>
    <td style='border:none;padding:.8em'>".$row['nom_ped']."</td>
    <td style='border:none;padding:.8em'>".$row['prec_ped']."</td>
    <td style='border:none;padding:.8em'>".$row['tot_ped']."</td>
  </tr>";
}

$html .= "
  <tr style='border-bottom: 1px solid #d0d0d0;transition: all ease .3s;cursor: pointer;'>
    <td style='border:none;padding:.8em'></td>
    <td style='border:none;padding:.8em'></td>
    <td style='border:none;padding:.8em'></td>
    <td style='border:none;padding:.8em'></td>
    <td style='border:none;padding:.8em;font-weight:bold;text-transform: uppercase;'>Total</td>
    <td style='border:none;padding:.8em;font-weight:bold;'>".$pedido['tot_ped']."</td>
  </tr>
</tbody>
</table></body></html>";

//Contenido del mensaje conformato html
$mail->MsgHTML($html);

//Aquien se le envia el mensaje
//$mail->AddAddress($address, $nombre);

$mail->AddAddress("ventas.compusoftnet@gmail.com", "compusoftnet");


//Envio el mensaje y compruebo si se envio el mensaje que con exito
if (!$mail->Send()) {
  echo "Error al enviar " . $mail->ErrorInfo;
}
else {
  echo "201";
}

/*
*Si ser guardo correctamente enviamos el codigo http 201 que se ha guardado con exito
*/
