<?php
$to = "jared.her20@gmail.com";  // Dirección de correo a la que se enviará el mensaje
$from = $_POST['email'];  // Recoge el correo del remitente desde el formulario
$name = $_POST['name'];  // Recoge el nombre desde el formulario
$phone = $_POST['phone'];  // Recoge el teléfono desde el formulario
$web = $_POST['web'];  // Recoge el servicio de interés desde el formulario
$message = $_POST['message'];  // Recoge el mensaje desde el formulario

// Validar los campos
if(empty($from) || empty($name) || empty($phone) || empty($message)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

if(!filter_var($from, FILTER_VALIDATE_EMAIL)) {
    echo "Correo electrónico no válido.";
    exit;
}

// Establecer los encabezados del correo
$headers = "From: $from\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "X-Mailer: PHP/".phpversion();
$subject = "Tienes un mensaje de la página de redcer :)";

// Construir el cuerpo del mensaje
$body = "Nombre: $name\n";
$body .= "Correo: $from\n";
$body .= "Teléfono: $phone\n";
$body .= "Servicio de interés: $web\n";
$body .= "Mensaje:\n$message\n";

// Enviar el correo
if(mail($to, $subject, $body, $headers)) {
    echo "Tu mensaje se ha enviado correctamente.";
} else {
    echo "Lo sentimos, ha ocurrido un error y no se pudo enviar tu mensaje.";
}
?>
