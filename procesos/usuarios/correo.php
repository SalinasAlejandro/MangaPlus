<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$direccion = dirname(__FILE__);
require $direccion . '/../../librerias/PHPMailer/Exception.php';
$direccion = dirname(__FILE__);
require $direccion . '/../../librerias/PHPMailer/PHPMailer.php';
$direccion = dirname(__FILE__);
require $direccion . '/../../librerias/PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'manga.plus.web@gmail.com';                     //SMTP username
    $mail->Password   = 'manga.plus7';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('manga.plus.web@gmail.com', 'Manga Plus');
    $mail->addAddress($_POST['correo']);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Bienvenido a Manga Plus';
    $mail->Body    = '<html>' .
        '<head><title>Bienvenido a Manga Plus</title></head>' .
        '<body style="background-color: #191919; color: #fff;"><h1 style="background: -webkit-gradient(linear,left top,right top,from(#5d0914),to(rgba(93, 9, 20, 0))); background: linear-gradient(90deg, #5d0914, rgba(93, 9, 20, 0)); padding: 25px 50px 25px 25px;">Bienvenido a Manga Plus</h1>' .
        '<p>Ahora puedes disfrutar de tus mangas favoritos totalmente <span>GRATIS</span></p>' .
        '<hr style="background-color: #dc0914;">' .
        'A disfrutar n.n' .
        '</body>' .
        '</html>';

    $mail->send();
} catch (Exception $e) {
}
