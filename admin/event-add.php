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
    <title>Add Event || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
            <a href="event.php"> Event /</a>Add
            <?php 
                include("profileLogout.php")
            ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form name="eventAddForm" method="POST" onsubmit="return eventAddValidation()" enctype="multipart/form-data">
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
                    <label for="address" style="float: left;">Address</label>
                        <input type="text" name="address" name="address">
                    </div>
                    <div>
                    <label for="date" style="float: left;">Date</label>
                        <input type="date" name="date" id="date">
                    </div>
                    <div>
                    <label for="time" style="float: left;">Time</label>
                        <input type="time" name="time" id="time">
                    </div>
                    <div>
                    <label for="description" style="float: left;">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="addEvent" value="Save">
                    </div>
             </form>
             <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>