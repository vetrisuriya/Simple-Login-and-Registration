<?php
session_start();
if(isset($_SESSION["userid"])) {
    header("location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
    <section class="login">

        <form action="action.php" method="POST">
            <div class="form-control">
                <label for="userEmail">Email ID</label>
                <input type="email" id="userEmail" class="userEmail" name="userEmail">
                <div id="userEmail-error" class="errors"></div>
            </div>
            <div class="form-control">
                <label for="userPass">Password</label>
                <input type="password" id="userPass" class="userPass" name="userPass">
                <div id="userPass-error" class="errors"></div>
            </div>
            <div class="form-control">
                <button type="submit" id="submit" name="loginSubmit">Login</button>
            </div>
        </form>
        <br><br>
        <p>Click here to <a href="./register.php">Sign Up</a></p>
        <p><a href="./forgot.php">Forgot Password</a></p>

    </section>


    <script>
        let form = document.querySelector("form");
        let email = document.getElementById("userEmail");
        let emailError = document.getElementById("userEmail-error");
        let pass = document.getElementById("userPass");
        let passError = document.getElementById("userPass-error");

        let errorCount = 0;
        form.addEventListener("submit", function(e) {
            
            if(email.value.trim() == "" || email.value.length == 0) {
                emailError.innerHTML = "<span>Email is empty</span>";
                errorCount = 1;
            }
            else {
                emailError.innerHTML = "";
                errorCount = 0;
            }

            if(pass.value.trim() == "" || pass.value.length == 0) {
                passError.innerHTML = "<span>Password is empty</span>";
                errorCount = 1;
            }
            else {
                if(pass.value.length <= 6) {
                    passError.innerHTML = "<span>Password Value must be greater than 6</span>";
                    errorCount = 1;
                }
                else {
                    passError.innerHTML = "";
                    errorCount = 0;
                }
            }


            if(errorCount == 1) {
                e.preventDefault();
            }
        })
    </script>
</body>
</html>