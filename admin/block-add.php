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
                        <label for="name" style="float: left;">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label for="image" style="float: left;">Image</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div>
                    <label for="totalRoomNumber" style="float: left;">Total Room Number</label>
                        <input type="text" name="totalRoomNumber"> 
                    </div>
                    <div>
                    <label for="ageBetween" style="float: left;">Age Between</label>
                        <input type="text" name="ageBetween" id="ageBetween"> 
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