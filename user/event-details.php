<?php 
    require_once('../config/db.php'); 
    // require_once('../config/user.php');    
    // if (!isset($_SESSION['isStaff'])) {
    //     header('location: ../login.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Event Details || Coms</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
            <a href="event.php">Event /</a>Event Details
            </div>
            <div class="info">
            <?php 
                // GET EVENT DATA
                $eventId = $_GET['id'];
                $eventQuery = "SELECT * FROM event WHERE eventId='$eventId'";
                $eventResult = mysqli_query($con, $eventQuery);
                if($eventResult) {
                    $eventData = $eventResult->fetch_assoc();
                }
            
            ?>
                <div>
                    <div>
                        <img src="../uploads/<?php echo $eventData['image'] ?>" width="100%" height="400px" alt="">
                    </div>
                    <div>
                        <h1><?php echo $eventData['name'] ?></h1>
                        <div style="font-size: 13px;">Date: <?php echo date('M D Y', strtotime($eventData['createdAt']))  ?></div>
                        <div>Address: <?php echo $eventData['address'] ?></div>
                        <p><?php echo $eventData['description'] ?></p>
                
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>