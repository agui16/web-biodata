<?php
require "funciones.php";
header("Content-type: application/json;charset=utf-8");
$input = json_decode(file_get_contents('php://input'), true);

$id = $input["id"];
$pass = $input["pass"];
$newPass = $input["newPass"];

$numSerExist = checkNumSer($id);

if (count($numSerExist) > 0) {
    if ($numSerExist[0][1] == $pass) {
        changePassword($id, $newPass);
        echo json_encode('Contraseña Modificada');
    } else {
        echo json_encode('No se cambio la contraseña');
    }
} else {
    echo json_encode('No se cambio la contraseña');
}

// echo json_encode($r);
