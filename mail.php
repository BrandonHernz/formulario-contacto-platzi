<?php

require("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;

function sendMail($subject, $body, $email, $name, $html = false)
{

  // Configuración inicial de nuestro server
  $phpmailer = new PHPMailer();
  $phpmailer->CharSet = 'UTF-8';
  $phpmailer->Encoding = 'base64';
  $phpmailer->isSMTP();
  $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = '28589dac9ae546';
  $phpmailer->Password = '8c62fe8dad52cb';

  // Añadir destinatarios
  $phpmailer->setFrom('contact@miempresa.com', 'Mi Empresa');
  $phpmailer->addAddress($email, $name);

  // Definir el contenido de mi email

  //Content
  $phpmailer->isHTML($html);
  $phpmailer->Subject = $subject;
  $phpmailer->Body = $body;

  // Mandar correo
  $phpmailer->send();
  echo 'Message has been sent';
}
