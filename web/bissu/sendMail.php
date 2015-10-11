<?php
require 'lib/PHPMailer/PHPMailerAutoload.php';
$to=$_POST['to'];
$pass=$_POST['pass'];
$name=$_POST['nombre'];

$mail = new PHPMailer();

//Typical mail data
$mail->AddAddress($to);
$mail->SetFrom("bissu.admon@outlook.com", "Bissu Boutique");
$mail->Subject = "Tu solicitud a servicios Bissu Boutique ha sido aprovada";
$mail->Body = "Estimado (a) $name, su solicitud a acceder a los servicios de cotización electrónica de Bissú Boutique ha sido APROVADA. Ingrese al siguiente enlace: http://alexrojas.cloudapp.net/web/bissu/login.php con las siguientes credenciales:\nUsusario: $to\nContraseña: $pass\n Gracias por su preferencia.";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
