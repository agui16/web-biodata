<?php

// function login($id, $pass)
// {
//     try {
//         require 'conect.php';
//         // header("Content-type: application/json; charset=utf-8");

//         $sql = "SELECT * FROM sys_web_usuario WHERE USER_ID = '$id' AND USER_PASS = '$pass'";

//         $query = mysqli_query($db, $sql) or die(mysqli_error($db));

//         $result = [];
//         $i = 0;

//         while ($row = mysqli_fetch_assoc($query)) {
//             $result[$i][0] = $row['USER_ID'];
//             $result[$i][1] = $row['USER_NAME'];
//             $result[$i][2] = $row['USER_PASS'];
//             $i++;
//         }
//         return ($result);
//         mysqli_close($db);

//         // var_dump($result);

//     } catch (\Throwable $th) {
//         echo "Error: " . $th;
//     }
// }

function mostrarNotasTecnicas()
{
    try {
        require 'conect.php';

        $sql = "SELECT * FROM SYS_WEB_NTECNICA ORDER BY NT_TITULO ASC";

        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        $result = [];
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $result[$i][0] = $row['NT_ID'];
            $result[$i][1] = $row['NT_TITULO'];
            $result[$i][2] = $row['NT_DESCRIPCION'];
            $result[$i][3] = $row['NT_FILE'];

            $i++;
        }
        mysqli_close($db);
        return ($result);
    } catch (\Throwable $th) {
        echo "Error: " . $th;
    }
}

function login($id, $pass)
{
    try {
        require 'conect.php';
        // header("Content-type: application/json; charset=utf-8");

        $sql = "SELECT * FROM SYS_LIC_Licencias WHERE NUMEROSERIE = '$id' AND WEBPASSCLI = '$pass'";

        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        $result = [];
        $i = 0;

        while ($row = mysqli_fetch_assoc($query)) {
            $result[$i][0] = $row['NUMEROSERIE'];
            $result[$i][1] = $row['WEBPASSCLI'];
            $i++;
        }
        return ($result);
        mysqli_close($db);

        // var_dump($result);

    } catch (\Throwable $th) {
        echo "Error: " . $th;
    }
}


function mostrarModulos()
{
    try {
        require 'conect.php';

        $sql = "SELECT * FROM SYS_WEB_MODULO ORDER BY MDL_TITULO ASC";

        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        $result = [];
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $result[$i][0] = $row['MDL_ID'];
            $result[$i][1] = $row['MDL_TITULO'];
            $result[$i][2] = $row['MDL_DESCRIPCION'];

            $i++;
        }
        mysqli_close($db);
        return ($result);
    } catch (\Throwable $th) {
        echo "Error: " . $th;
    }
}

function mostrarManuales()
{
    try {
        require 'conect.php';

        $sql = "SELECT * FROM SYS_WEB_MANUAL ORDER BY MAN_TITULO ASC";

        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        $result = [];
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $result[$i][0] = $row['MAN_ID'];
            $result[$i][1] = $row['MAN_TITULO'];
            $result[$i][2] = $row['MAN_DESCRIPCION'];
            $result[$i][3] = $row['MAN_FILE'];

            $i++;
        }
        mysqli_close($db);
        return ($result);
    } catch (\Throwable $th) {
        echo "Error: " . $th;
    }
}

function mostrarDescargas()
{
    try {
        require 'conect.php';

        $sql = "SELECT * FROM SYS_WEB_DESCARGA ORDER BY DES_TITULO ASC";

        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        $result = [];
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $result[$i][0] = $row['DES_ID'];
            $result[$i][1] = $row['DES_TITULO'];
            $result[$i][2] = $row['DES_DESCRIPCION'];
            $result[$i][3] = $row['DES_FILE'];

            $i++;
        }
        mysqli_close($db);
        return ($result);
    } catch (\Throwable $th) {
        echo "Error: " . $th;
    }
}

function mostrarNovedades()
{
    try {
        require 'conect.php';

        $sql = "SELECT * FROM SYS_WEB_NOVEDAD ORDER BY NOV_TITULO ASC LIMIT 5";

        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        $result = [];
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $result[$i][0] = $row['NOV_ID'];
            $result[$i][1] = $row['NOV_TITULO'];
            $result[$i][2] = $row['NOV_DESCRIPCION'];

            $i++;
        }
        mysqli_close($db);
        return ($result);
    } catch (\Throwable $th) {
        echo "Error: " . $th;
    }
}

function checkNumSer($numSer)
{
    try {
        require 'conect.php';

        $sql = "SELECT NUMEROSERIE, WEBPASSCLI FROM SYS_LIC_Licencias where NUMEROSERIE = $numSer";

        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        $result = [];
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $result[$i][0] = $row['NUMEROSERIE'];
            $result[$i][1] = $row['WEBPASSCLI'];

            $i++;
        }
        mysqli_close($db);
        return ($result);
    } catch (\Throwable $th) {
        echo "Error: " . $th;
    }
}

function changePassword($numSer, $newPass)
{
    try {
        require 'conect.php';

        $sql = " UPDATE SYS_LIC_Licencias SET WEBPASSCLI = '$newPass', WEBPASSCLI_MOD = 1 where NUMEROSERIE = $numSer";

        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        mysqli_close($db);
        return ($query);
    } catch (\Throwable $th) {
        echo "Error: " . $th;
    }
}

function mostrarInterfases()
{
    try {
        require 'conect.php';

        $sql = "SELECT DISTINCT DESCRIP FROM SYS_LIC_HabilitaLic where TIPO = 2 ORDER BY DESCRIP ASC";

        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        $result = [];
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $result[$i][0] = $row['DESCRIP'];

            $i++;
        }
        mysqli_close($db);
        return ($result);
    } catch (\Throwable $th) {
        echo "Error: " . $th;
    }
}

function checkPass($id)
{
    try {
        require 'conect.php';

        $sql = "SELECT WEBPASSCLI FROM SYS_LIC_Licencias where NUMEROSERIE = $id";

        $query = mysqli_query($db, $sql) or die(mysqli_error($db));

        $result = [];
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)) {
            $result[0] = $row['WEBPASSCLI'];

            $i++;
        }
        mysqli_close($db);
        return ($result);
    } catch (\Throwable $th) {
        echo "Error: " . $th;
    }
}

// function generatePassword($length)
// {
//     $key = "";
//     $pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
//     $max = strlen($pattern) - 1;
//     for ($i = 0; $i < $length; $i++) {
//         $key .= substr($pattern, mt_rand(0, $max), 1);
//     }
//     return $key;
// }


// function createUsers()
// {
//     try {
//         require 'conect.php';

//         for ($i = 7; $i < 3001; $i++) {

//             $pass = generatePassword(8);

//             $sql = "INSERT INTO USUARIO (USER_ID, USER_PASS) VALUES ('$i', '$pass')";

//             $query = mysqli_query($db, $sql) or die(mysqli_error($db));
//             $i++;

//             // return ($i);
//         }
//     } catch (\Throwable $th) {
//         echo "Error: " . $th;
//     }
//     mysqli_close($db);
// }