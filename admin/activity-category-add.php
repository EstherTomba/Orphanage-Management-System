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
    <title> Add Activity - Category || Coms  </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
            <a href="activity-category.php">Activity Category /</a>Add
            <?php 
                include("profileLogout.php")
            ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form name="activityCategoryAddForm" method="POST" onsubmit="return activityCategoryAddValidation()"  enctype="multipart/form-data">
                <?php 
                    include('../error.php');
                    ?>
                    <div>
                        <label for="description" style="float: left;">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    
                   <div>
                        <label for="description" style="float: left;">Image</label>
                      <input type="file" name="image" id="image">
                   </div>
                   <div>
                       <input type="submit" name="addActivityCategory" value="Save">
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