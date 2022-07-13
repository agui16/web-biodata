<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$laboratorio = $_POST['laboratorio'];
$telefono = $_POST['telefono'];
$destinatario = $_POST['destinatario'];
$consulta = $_POST['consulta'];

$txtMail = "Nueva consulta realizada en la web.\nDe: " . $nombre . "\nEmail: " . $email . "\nLaboratorio: " . $laboratorio . "\nTelefono: " . $telefono . "\nConsulta: " . $consulta;
$headers = "From: info@biodatasa.com.ar" . "\r\n" . 'Reply-To: biodata.comercial@gmail.com';
$txtclient = "Hola " . $email . " Recibimos tu solicitud de DEMO LABWIN, en breve nos pondremos en contacto! Muchas Gracias. Biodata SA\n\n\n Este email ha sido generado automaticamente, por favor no responda a este email. Por consultas puede ponerse en contacto con Biodata SA.";

$emailAdministracion = 'biodata.comercial@gmail.com';
$emailGerman = 'biodata.german@gmail.com';
$emailSebastian = 'biodata.sebastian@gmail.com';
$emailNicolas = 'biodata.nicolas@gmail.com';
$emailAgustin = 'biodata.agustin@gmail.com';
$emailSoporte = $emailGerman . ',' . $emailSebastian . ',' . $emailNicolas . ',' . $emailAgustin;

if ($destinatario == 'administracion') {
    try {
        mail($emailAdministracion, 'Consulta web', $txtMail, $headers);
    } catch (Exception $e) {
        echo 'Ocurrio un error, por favor comuniquese al 0236 - 4231050. Disculpe las molestias, Biodata SA';
    }
} else {
    try {
        mail($emailSoporte, 'Consulta web', $txtMail, $headers);
    } catch (Exception $e) {
        echo 'Ocurrio un error, por favor comuniquese al 0236 - 4231050. Disculpe las molestias, Biodata SA';
    }
}

try {
    mail($email, 'Consulta web', $txtclient, $headers);
    echo '<script language="javascript">window.location.href =  "../index.html"</script>';
} catch (Exception $e) {
    echo 'Ocurrio un error, por favor comuniquese al 0236 - 4231050. Disculpe las molestias, Biodata SA';
}
