<?php
$email = $_POST['email'];


$to = "biodata.comercial@gmail.com";
$subject = "Solicitud de demo";
$txt = "Solicitaron un demo, ponerse en contacto con " . $email;
$txtclient = "Hola " . $email . " Recibimos tu solicitud de DEMO LABWIN, en breve nos pondremos en contacto! Muchas Gracias. Biodata SA\n\n\n Este email ha sido generado automaticamente, por favor no responda a este email. Por consultas puede ponerse en contacto con Biodata SA.";
$headers = 'From: demo@biodatasa.com.ar' . "\r\n" . 'Reply-To: biodata.comercial@gmail.com';

try {
    mail($to, $subject, $txt, $headers);
    mail($email, $subject, $txtclient, $headers);
    echo '<script language="javascript">window.location.href =  "../index.html"</script>';
} catch (Exception $e) {
    echo 'Ocurrio un error, por favor comuniquese al 0236 - 4231050. Disculpe las molestias, Biodata SA';
}
