<?php

$dbname = "registration_system";
$userName = "root";
$userPass = "";
$connection = "mysql:host=localhost;dbname=".$dbname."";

try {
    $con = new PDO($connection, $userName, $userPass);
}
catch(Exception $e) {
    echo $e->getMessage();
}

?>