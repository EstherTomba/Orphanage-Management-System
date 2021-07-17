
<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $userId= $_SESSION['userId'];
    $userQuery= "SELECT * FROM user WHERE userId='$userId'";
    $userResult= mysqli_query($con, $userQuery);
    if($userResult) {
        $userData= $userResult->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Change Password || coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
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
                        <label for="newPassword" style="float: left;">New Password</label>
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
                           <?php include('footer.php'); ?>
            </div>
        </div>
    </div>

</body>


<script src="js/validation.js"></script>

</html>