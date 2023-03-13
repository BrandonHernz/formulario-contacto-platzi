<?php


use PHPMailer\PHPMailer\PHPMailer;

require("vendor/autoload.php");

function sendMail($subject, $body, $email, $name, $html = false)
{

  /* $phpmailer->Encoding = 'base64'; */

  // Configuración inicial de servidor de correos 'mailtrap'
  $phpmailer = new PHPMailer();
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.gmail.com';
  $phpmailer->SMTPAuth = true;
  $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $phpmailer->CharSet = PHPMailer::CHARSET_UTF8;
  $phpmailer->Port = 465;
  $phpmailer->Username = ''; // Correo
  $phpmailer->Password = ''; // Contraseña de Apps en el correo

  // Añadir destinatarios
  $phpmailer->setFrom('mark@facebook.com', 'Facebook');
  $phpmailer->addAddress($email, $name);

  // Definir el contenido de mi email

  $phpmailer->isHTML($html);
  $phpmailer->Subject = $subject;
  $phpmailer->Body = $body;

  // Mandar correo
  $phpmailer->send();
}
