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
    <title>Side Navigation Bar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
       <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Welcome to the Orphanage Center</div>
            <div class="info">
                <div>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore culpa facere at omnis nam!
                    Reiciendis iste eveniet aliquam quasi quas atque sint excepturi laudantium. Ipsum dolor es
                    exercitationem fuga dolore minima.
                </div>
            </div>
        </div>
    </div>
</body>


</html>