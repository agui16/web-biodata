<?php
require "funciones.php";
header("Content-type: application/json;charset=utf-8");

$novedades = mostrarNovedades();

echo json_encode($novedades);
