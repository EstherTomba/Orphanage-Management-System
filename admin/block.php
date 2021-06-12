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
    <title>Block || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Block

                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="block-add.php" style="color: white;">Add Block</a>  
                  </button> 
            </div>
            <div class="info">
                <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
                <?php
                    $query="SELECT * FROM block ORDER BY createdAt DESC";
                    $blockResult = mysqli_query($con, $query);
                    while($row = mysqli_fetch_assoc($blockResult)) {
                        ?>
                            <a href="block-details.php?id=<?php echo $row['blockId'] ?>">
                                <div style="width:100%; background-color: white;">
                                    <div>
                                        <img src="../uploads/<?php echo $row['image'] ?>" width="100%" height="300px" alt="">
                                    </div>
                                    <h1 style="text-align: center; padding-bottom: 15px; padding-top: 10px;">
                                        <?php echo $row['blockName'] ?>
                                        <div>Room numbers: <?php echo $row['totalRoomNumber'] ?> </div>
                                        <div style= "font-size:13px">Date: <?php echo date('M d Y',strtotime($row['createdAt'])) ?></div>
                                    </h1>
                                </div>
                            </a>
                            <hr style="margin-bottom: 10px;">
                        <?php
                    }
                ?>
                 <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

</html>