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
    <title>User Registration</title>

    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
    <section class="registration">

        <form action="action.php" method="POST">
            <div class="form-control">
                <label for="userName">Full Name</label>
                <input type="text" id="userName" class="userName" name="userName">
                <div id="userName-error" class="errors"></div>
            </div>
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
                <label for="userConfirmPass">Confirm Password</label>
                <input type="password" id="userConfirmPass" class="userConfirmPass" name="userConfirmPass">
                <div id="userConfirmPass-error" class="errors"></div>
                <div id="match-error" class="errors"></div>
            </div>
            <div class="form-control">
                <button type="submit" id="submit" name="regSubmit">Sign Up</button>
            </div>
        </form>
        <br><br>
        <p>Click here to <a href="./login.php">Login</a></p>

    </section>


    <script>
        let form = document.querySelector("form");
        let name = document.getElementById("userName");
        let nameError = document.getElementById("userName-error");
        let email = document.getElementById("userEmail");
        let emailError = document.getElementById("userEmail-error");
        let pass = document.getElementById("userPass");
        let passError = document.getElementById("userPass-error");
        let confirmPass = document.getElementById("userConfirmPass");
        let confirmPassError = document.getElementById("userConfirmPass-error");
        let passMatch = document.getElementById("match-error");

        let errorCount = 0;
        form.addEventListener("submit", function(e) {
            
            if(name.value.trim() == "" || name.value.length == 0) {
                nameError.innerHTML = "<span>Name is empty</span>";
                errorCount = 1;
            }
            else {
                nameError.innerHTML = "";
                errorCount = 0;
            }

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

            if(confirmPass.value.trim() == "" || confirmPass.value.length == 0) {
                confirmPassError.innerHTML = "<span>Confirm Password is empty</span>";
                errorCount = 1;
            }
            else {
                if(confirmPass.value.length <= 6) {
                    confirmPassError.innerHTML = "<span>Confirm Password Value must be greater than 6</span>";
                    errorCount = 1;
                }
                else {
                    confirmPassError.innerHTML = "";
                    errorCount = 0;
                }
            }

            // if(pass.value != confirmPass.value) {
            //     passMatch.innerHTML = "<span>Password Must Match</span>";
            //     errorCount = 1;
            // }
            // else {
            //     passMatch.innerHTML = "";
            //     errorCount = 0;
            // }

            if(errorCount == 1) {
                e.preventDefault();
            }
        })
    </script>
</body>
</html>