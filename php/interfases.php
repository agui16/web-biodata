<?php
require "funciones.php";
header("Content-type: application/json;charset=utf-8");

$interfases = mostrarInterfases();


echo json_encode($interfases);
