    <?php
    require "funciones.php";
    // header("Content-type: application/json;charset=utf-8");
    $input = json_decode(file_get_contents('php://input'), true);

    $id = $input["id"];
    $pass = $input["pass"];


    $usuarios = login($id, $pass);



    echo json_encode($usuarios);
