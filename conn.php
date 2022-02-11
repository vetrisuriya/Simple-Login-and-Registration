<?php

$dbname = "heroku_a3945330c99fc52";
$userName = "bd6a8702036a66";
$userPass = "4a9939fd";
$connection = "mysql:host=us-cdbr-east-05.cleardb.net;dbname=".$dbname."";

try {
    $con = new PDO($connection, $userName, $userPass);
}
catch(Exception $e) {
    echo $e->getMessage();
}

?>