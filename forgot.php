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
    <title>Forgot Password</title>

    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
    <section class="login">

        <?php
        if(isset($_GET["forgot_email"])) {
        ?>
            <form action="action.php" method="POST">
                <input type="hidden" id="userEmail" class="userEmail" name="userEmail" value="<?= $_GET["forgot_email"] ?>">
                <div class="form-control">
                    <label for="userPass">Password</label>
                    <input type="password" id="userPass" class="userPass" name="userPass">
                    <div id="userPass-error" class="errors"></div>
                </div>
                <div class="form-control">
                    <label for="userConfirmPass">Confirm Password</label>
                    <input type="password" id="userConfirmPass" class="userConfirmPass" name="userConfirmPass">
                    <div id="userConfirmPass-error" class="errors"></div>
                </div>
                <div class="form-control">
                    <button type="submit" id="submit" name="forgotPasswordSubmit">Change Password</button>
                </div>
            </form>
        <?php
        } else {
        ?>
            <form action="action.php" method="POST">
                <div class="form-control">
                    <label for="userEmail">Email ID</label>
                    <input type="email" id="userEmail" class="userEmail" name="userEmail">
                    <div id="userEmail-error" class="errors"></div>
                </div>
                <div class="errors"><span><?= (isset($_GET["forgot_error"])) ? "Email Invalid" : "" ?></span></div>
                <div class="form-control">
                    <button type="submit" id="submit" name="forgotSubmit">Forgot Password</button>
                </div>
            </form>
        <?php
        }
        ?>


    </section>


    <script>
    <?php
    if(isset($_GET["forgot_email"])) {
    ?>
        let form = document.querySelector("form");
        let pass = document.getElementById("userPass");
        let passError = document.getElementById("userPass-error");
        let confirmPass = document.getElementById("userConfirmPass");
        let confirmPassError = document.getElementById("userConfirmPass-error");

        let errorCount = 0;
        form.addEventListener("submit", function(e) {
            
            if(pass.value.trim() == "") {
                passError.innerHTML = "<span>Password is empty</span>";
                errorCount = 1;
            } else if(pass.value.length < 6) {
                passError.innerHTML = "<span>Password Value must be greater than 6</span>";
                errorCount = 1;
            } else {
                passError.innerHTML = "";
                errorCount = 0;
            }

            if(confirmPass.value.trim() == "") {
                confirmPassError.innerHTML = "<span>Confirm Password is empty</span>";
                errorCount = 1;
            } else if(pass.value != confirmPass.value) {
                confirmPassError.innerHTML = "<span>Passwords Not Matching</span>";
                errorCount = 1;
            } else {
                confirmPassError.innerHTML = "";
                errorCount = 0;
            }

            if(errorCount != 0) {
                e.preventDefault();
            }
        })
    <?php
    } else {
    ?>
        function validateEmail(emailVal){      
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return emailPattern.test(emailVal); 
        }

        let form = document.querySelector("form");
        let email = document.getElementById("userEmail");
        let emailError = document.getElementById("userEmail-error");

        let errorCount = 0;
        form.addEventListener("submit", function(e) {
            
            if(email.value.trim() == "") {
                emailError.innerHTML = "<span>Email is empty</span>";
                errorCount = 1;
            } else if(!validateEmail(email.value)) {
                emailError.innerHTML = "<span>Email is Invalid</span>";
                errorCount = 1;
            } else {
                emailError.innerHTML = "";
                errorCount = 0;
            }

            if(errorCount != 0) {
                e.preventDefault();
            }
            
        })
    <?php
    }
    ?>
    </script>
</body>
</html>