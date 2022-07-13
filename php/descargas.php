<?php
require "funciones.php";
header("Content-type: application/json;charset=utf-8");

$descargas = mostrarDescargas();

echo json_encode($descargas);
