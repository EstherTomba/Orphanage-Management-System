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
    <title>Add Donation Type || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
        <div class="header" style="color: red; font-size: 20px;">
                <a href="donation-type.php">Donation Type /</a> Add
            </div>
            <div class="info">
                <form name="donationTypeAddForm" method="POST" onsubmit="return donationTypeAddValidation()">
                <?php 
                    include('../error.php');
                ?>
                 <div>
                     <input type="text" name="name" placeholder="Name">
                 </div>
                 <div>
                     <input type="submit" name="donationtype" value="Save">
                 </div>
             </form>
            </div>
        </div>
    </div>
</body>
<script src="js/validation.js"></script>



</html>