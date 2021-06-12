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
            </div>
            <div class="info">
                <form name="eventAddForm" method="POST" onsubmit="return eventAddValidation()" enctype="multipart/form-data">
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
                        <input type="text" name="address" name="address" placeholder="Addres">
                    </div>
                    <div>
                        <input type="date" name="date" id="date">
                    </div>
                    <div>
                        <input type="time" name="time" id="time">
                    </div>
                    <div>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
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