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
                        <div style="width:100%; height: 210px; background-color: white;">
                            <div style="width:400px; height:200px;">
                                <a href="event-details.php?id=<?php echo $row['eventId'] ?>">
                                    <img src="uploads/<?php echo $row['image'] ?>" width="100%" height="210px;" alt="">
                                </a>
                            </div>
                            <div style="position: absolute;margin-top:-190px;margin-left:410px; margin-right: 175px">
                                <a href="event-details.php?id=<?php echo $row['eventId'] ?>">
                                    <h1 style="color:#4b4276; text-align: left;"><?php echo $row['name']?></h1>
                                </a> 
                                <div style="font-size: 12px; text-align: left;"><?php echo date('M d Y',strtotime($row['createdAt'])) ?></div> 
                                <div style="text-align: left;">Address: <?php echo $row['address']?></div> 
                                <p style="margin-top: 20px;text-align: left;">
                                <?php echo substr($row['description'], 0, 300) ?>
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