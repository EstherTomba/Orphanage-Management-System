<?php 
    require_once('config/db.php');    
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || Coms </title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="center">
        <h1>Login</h1>
        <form name="loginForm" method="POST" onsubmit="return loginValidation()">
            <div>
                <?php 
                include('error.php');
                include('success.php');
                ?>
            </div>
            <div class="txt_field">
                <input type="text" name="userEmail" id="userEmail" placeholder="Email">
            </div>

            <div class="txt_field">
                <input type="password" name="userPassword" id="userPassword" placeholder="Password">
            </div>
            <div class="pass">
                <a href="forgot-password.php">Forgot Password?</a>
            </div>
            <input type="submit" value="Login" name="userLogin">
        </form>
    </div>
   
</body>
<script src="js/validation.js"></script>

</html>