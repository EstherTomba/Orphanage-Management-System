<?php 
    require_once('../config/user.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Change Password || Coms</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Change Password
                <?php 
                    include("profileLogout.php")
                ?>
                </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
               
            <form name="changePasswordForm" method="POST" onsubmit="return changePasswordValidation()">
                <?php 
                        include('../error.php');
                    ?>
                   <div>
                    <label for="oldPassword" style="float: left;">Old Password</label>
                    <input type="password" id="oldPassword" name="oldPassword">
                   </div>
                   <div>
                   <label for="password" style="float: left;">New Password</label>
                    <input type="password" id="newPassword" name="newPassword">
                   </div>
                   <div>
                   <label for="confirmNewPassword" style="float: left;">Confirm New Password</label>
                    <input type="password" id="confirmNewPassword" name="confirmNewPassword">
                   </div>
                          
                   <div>
                    <input type="submit" name="changePassword" value="Change Password">
                   </div>

               
            </form>
                          
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>
</html>