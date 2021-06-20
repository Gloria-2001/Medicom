<?php
    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    $mensaje = $_POST['message'];
    
    $header = 'From: ' . $correo . " \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain";

    $message = "Este mensaje fue enviado por: " . $nombre . " \r\n";
    $message .= "Su e-mail es: " . $correo . " \r\n";
    $message .= "Mensaje: " . $_POST['message'] . " \r\n";
    $message .= "Enviado el: " . date('d/m/Y', time());

    $para = 'pablomorzafebrero@gmail.com';
    $asunto = 'Contacto MediCom';

    mail($para, $asunto, utf8_decode($message), $header);

    header("Location:index.html");
?>