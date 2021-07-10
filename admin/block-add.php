<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Block || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
                <a href="block.php">Block </a>/Add
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form  name="blockAddForm" method="POST" onsubmit="return blockAddValidation()" enctype="multipart/form-data">
                <?php 
                    include('../error.php');
                    ?>
                    <div>
                        <input type="text" name="name" id="name" placeholder="Name">
                    </div>
                    <div>
                        <input type="file" name="image" id="image">
                    </div>
                    <div>
                        <input type="text" name="totalRoomNumber" placeholder="Total Room Number"> 
                    </div>
                    <div>
                        <input type="text" name="ageBetween" id="ageBetween" placeholder="Age Between"> 
                    </div>
                    <div>
                        <input type="submit" name="blockAdd" value="Save">
                    </div>
                </form>
            </div>
            <?php include('footer.php'); ?>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>

<style>
    .footer {
        position: fixed;
        bottom: 0px;
        padding: 15px;
        margin-bottom: 0px;
    }
</style>


</html>