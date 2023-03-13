<?php
require('mail.php');
function validate($name, $email, $subject, $message)
{
  return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

$status = "";

if (isset($_POST['form'])) {
  if (validate($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) { // Array Unpacking
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $body = "$name <$email> te envia el siguiente mensaje: <br><br>
    $message";


    // Mandar correo
    sendMail($subject, $body, $email, $name, true);


    $status = "Success";
  } else {
    $status = "Danger";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario de Contacto</title>
  <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>

  <?php if ($status == "Danger") : ?>
    <div class="alert danger">
      <span>¡Ups! Surgió un problema</span>
    </div>
  <?php endif; ?>

  <?php if ($status == "Success") : ?>
    <div class="alert success">
      <span>¡Mensaje enviado con éxito!</span>
    </div>
  <?php endif; ?>



  <form action="./" method="post">
    <div class="container-info">
      <h1 class="container-info__heading">¡Contactanos!</h1>
      <div class="group-name">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" />
      </div>

      <div class="group-email">
        <label for="email">Correo:</label>
        <input type="email" name="email" id="email" />
      </div>

      <div class="group-subject">
        <label for="subject">Asunto:</label>
        <input type="text" name="subject" id="subject" />
      </div>

      <div class="group-message">
        <label for="message">Mensaje:</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
      </div>

      <div class="container-info__button">
        <button name="form" type="submit">Enviar</button>
      </div>
    </div>
  </form>
</body>

</html>