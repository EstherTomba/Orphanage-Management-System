<?php 
    require_once('config/db.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event || Coms</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="box-area">
    <?php include('header.php'); ?>
        <div class="banner">
            <h2> Events</h2>
        </div>
        <div class="content-area">
            <div class="wrapper">
           <?php 
                 $eventQuery= "SELECT * FROM event ORDER BY  createdAt DESC";
                 $eventResult= mysqli_query($con, $eventQuery);
                 while($row = mysqli_fetch_assoc($eventResult)) {
                     ?>
                        <div style="width:100%; height: 200px; background-color: white;">
                            <div style="width:400px; height:200px;">
                                <a href="event-details.php">
                                    <img src="user/images/cleaning.jpg" width="100%" height="200px" alt="">
                                </a>
                            </div>
                            <div style="position: absolute;margin-top:-190px;margin-left:410px; margin-right:90px">
                            <a href="event-details.php">
                                <h1 style="color:#4b4276;"><?php echo $row['name']?></h1>
                            </a> 
                            <div style="font-size: 12px;"><?php echo date('M d Y',strtotime($row['createdAt'])) ?></div> 
                            <div>Address: <?php echo $row['address']?></div> 
                            <p style="width: 100%;">
                                <?php echo substr($row['description'], 0, 250) ?>
                            </p>
                            </div>
                        </div>
                        <hr style="margin-bottom: 10px;">
                     <?php
                 }
           
           ?> 

               
               
            </div>
            <?php include('footer.php') ?>
        </div>
    </div>
</body>

</html>