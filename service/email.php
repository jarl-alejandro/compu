<?php

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$temaContactenos = $_POST["temaContactenos"];
$mensaje = $_POST["mensaje"];


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
$mail->SetFrom($email, $nombre);
$mail->AddReplyTo($email, $nombre);

include "../config/conexion_mysql.php";


// Titulo del mensja
$mail->Subject = utf8_decode($temaContactenos);

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
    <h1 style='text-align: center;color: #616161;'>Mensaje de: ".$nombre." </h1>
    <h2 style='text-align: center;color: #616161;'>".$temaContactenos." </h2>
    <p style='text-align: center;color: #616161;'>".$mensaje." </p>
  </body>
</html>";

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
