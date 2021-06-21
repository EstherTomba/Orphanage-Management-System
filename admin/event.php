
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
    <title>Event || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Event
            <?php 
            include("profileLogout.php")
            ?>
            </div>
            <div class="info">
                <form action="" class="search"> 
                    <input type="text" placeholder="Search">
                    <input type="submit">
                </form>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                <a href="event-add.php" style="color: white;">Add Event</a>  
                </button><br><br>
                <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
                <?php 
                 $eventQuery= "SELECT * FROM event ORDER BY  createdAt DESC";
                 $eventResult= mysqli_query($con, $eventQuery);
                 while($row = mysqli_fetch_assoc($eventResult)) {
                   ?>
                        <div style="width:100%; height: 200px; background-color: white;">
                            <div style="width:400px; height:200px;">
                                <a href="event-details.php?id=<?php echo $row['eventId'] ?>">
                                    <img src="../uploads/<?php echo $row['image'] ?>" width="100%" height="200px" alt="">
                                </a>
                            </div>
                            <div style="position: absolute;margin-top:-190px;margin-left:410px; margin-right: 25px">
                                <a href="event-details.php?id=<?php echo $row['eventId'] ?>">
                                    <h1 style="color:#4b4276;"><?php echo $row['name']?></h1>
                                </a> 
                                <div style="font-size: 15px; background-color: green; color:white; margin-top: 10px;">Event Date: <?php echo date('M d Y H:i',strtotime($row['eventDate'])) ?></div>
                                <div style="font-size: 12px;">Published: <?php echo date('M d Y',strtotime($row['createdAt'])) ?></div> 
                                <div>Address: <?php echo $row['address']?></div> 
                                <p style="margin-top: 20px;">
                                <?php echo substr($row['description'], 0, 300) ?>
                            </div>
                        </div>
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