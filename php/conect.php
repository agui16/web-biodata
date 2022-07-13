<?php
//LOCAL
//$hostname = "localhost";
//$user = "root";
//$password = "123456";
//$database = "web_biodata";

//Biodata
$hostname = "localhost";
$user = "biodatas";
$password = "lgu2x288JI";
$database = "biodatas_biodata";

$db = mysqli_connect($hostname, $user, $password, $database);
mysqli_set_charset($db, "utf8");