<?php
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

// Indico la clave y usaurio de gmail cpm ña qie se enviara el corro
$mail->Username = "jarlalejor@gmail.com";
$mail->Password = "jarlalejor1997";


// Informacion de quien enviara el mensaje
$mail->SetFrom("jarlalejor@gmail.com", "Alejandro Rivas");
$mail->AddReplyTo("jarlalejor@gmail.com", "Alejandro Rivas");

// Configuramos el encoding

include "../config/conexion_mysql.php";

$id = "PE-003";
$pedido_query = $db->query("SELECT * FROM pedido WHERE cod_ped='$id'");
$pedido = $pedido_query->fetch();

$query = $db->query("SELECT * FROM detalle_pedido WHERE cod_ped='$id'");

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
    <h1 style='text-align: center;color: #616161;'>Señor(a) ".$pedido['nom_ped']." ud ha hecho un al siguiente pedido a compusoftnet</h1>
    <table style='width: 100%;display: table;color: #2f2f2f;background: white;border-collapse: collapse;'>
      <thead align='center'>
        <tr style='border-bottom: 1px solid #d0d0d0;transition: all ease .3s;cursor: pointer;'>
          <th style='text-transform: uppercase;border:none;padding:.8em'>#</th>
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
    <td style='border:none;padding:.8em;font-weight:bold;text-transform: uppercase;'>Total</td>
    <td style='border:none;padding:.8em;font-weight:bold;'>".$pedido['tot_ped']."</td>
  </tr>
</tbody>
</table></body></html>";

//Contenido del mensaje conformato html
$mail->MsgHTML($html);

//Aquien se le envia el mensaje
$address = "jarlalejor@gmail.com";
$mail->AddAddress($address, "Alexander");


//Envio el mensaje y compruebo si se envio el mensaje que con exito
if (!$mail->Send()) {
  echo "Error al enviar " . $mail->ErrorInfo;
}
else {
  echo "Mensaje Enviado";
}
