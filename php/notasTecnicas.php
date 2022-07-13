<?php
require "funciones.php";
header("Content-type: application/json;charset=utf-8");

$notas = mostrarNotasTecnicas();

echo json_encode($notas);
