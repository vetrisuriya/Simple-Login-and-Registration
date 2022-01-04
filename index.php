<?php
session_start();
if(!isset($_SESSION["userid"])) {
    header("location: ./login.php");
}

include("./conn.php");

$query = $con->prepare("SELECT `user_name` FROM `users` WHERE `user_id`=:userid");
$query->execute([
    ':userid' => $_SESSION["userid"]
]);
$fetch = $query->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>

<h2>Welcome <?= $fetch["user_name"] ?></h2>
<div><a href="./settings.php">Settings</a> - <a href="./logout.php">Log Out</a></div>
    
</body>
</html>