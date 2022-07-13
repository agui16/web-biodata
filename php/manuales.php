<?php
require "funciones.php";
header("Content-type: application/json;charset=utf-8");

$manuales = mostrarManuales();

echo json_encode($manuales);
