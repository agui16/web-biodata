<?php
require "funciones.php";
header("Content-type: application/json;charset=utf-8");
$input = json_decode(file_get_contents('php://input'), true);

$id = $input["id"];

$pass = checkPass($id);

echo json_encode($pass);


// echo json_encode($r);
