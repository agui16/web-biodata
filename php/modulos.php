<?php
require "funciones.php";
header("Content-type: application/json;charset=utf-8");

$modulos = mostrarModulos();

echo json_encode($modulos);
