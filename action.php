<?php
include("./conn.php");

if(isset($_POST["regSubmit"])) {

    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPass = $_POST["userPass"];
    $userConfirmPass = $_POST["userConfirmPass"];

    $query = $con->prepare("INSERT INTO `users`(`user_name`, `user_email`, `user_password`) VALUES(?, ?, ?)");
    $query->execute([
        $userName,
        $userEmail,
        $userPass
    ]);

    if($query == true) {
        session_start();
        $_SESSION["userid"] = $con->lastInsertId();
        header("location: ./index.php");
    }
}

if(isset($_POST["loginSubmit"])) {

    $userEmail = $_POST["userEmail"];
    $userPass = $_POST["userPass"];

    $query = $con->prepare("SELECT `user_id` FROM `users` WHERE `user_email`=? AND `user_password`=?");
    $query->execute([
        $userEmail,
        $userPass
    ]);
    $count = $query->rowCount();
    $fetch = $query->fetch();

    var_dump($count);

    if($count != 0) {
        session_start();
        $_SESSION["userid"] = $fetch["user_id"];
        header("location: ./index.php");
    } else {
        header("location: ./login.php");
    }
}

if(isset($_POST["forgotSubmit"])) {

    $userEmail = $_POST["userEmail"];

    $query = $con->prepare("SELECT `user_id` FROM `users` WHERE `user_email`=?");
    $query->execute([
        $userEmail
    ]);
    $count = $query->rowCount();

    if($count != 0) {
        header("location: ./forgot.php?forgot_email=".$userEmail."");
    }
    else {
        header("location: ./forgot.php?forgot_error=yes");
    }
}

if(isset($_POST["forgotPasswordSubmit"])) {

    $userEmail = $_POST["userEmail"];
    $userPass = $_POST["userPass"];
    $userConfirmPass = $_POST["userConfirmPass"];

    $query = $con->prepare("UPDATE `users` SET `user_password`=? WHERE `user_email`=?");
    $query->execute([
        $userPass,
        $userEmail
    ]);

    if($query == true) {
        header("location: ./index.php");
    }
}

if(isset($_POST["changePasswordSubmit"])) {
    session_start();
    $userId = $_SESSION["userid"];
    $userPass = $_POST["userPass"];
    $userConfirmPass = $_POST["userConfirmPass"];

    $query = $con->prepare("UPDATE `users` SET `user_password`=? WHERE `user_id`=?");
    $query->execute([
        $userPass,
        $userId
    ]);

    if($query == true) {
        header("location: ./index.php");
    }
}

?>