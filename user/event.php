<?php 
    require_once('../config/db.php'); 
    $eventIsTrue = true;
    $searchIsTrue   = false;
    $search   = '';
    if(isset($_GET['q'])) {
        $eventIsTrue = false;
        $searchIsTrue   = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Event || Coms</title>
    <link rel="stylesheet" href="css/style.css">
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
                <form method="GET" class="search"> 
                    <input type="text" placeholder="Search" name="q" value="<?php echo $search ?>">
                    <input type="submit">
                </form><br><br>
              <?php 
                if($eventIsTrue) {
                    $eventIsTrue = true;
                    $searchIsTrue   = false;
                    $eventQuery= "SELECT * FROM event ORDER BY  createdAt DESC";
                } elseif($searchIsTrue) {
                    $eventQuery= "SELECT * FROM event WHERE name LIKE '%$search%' OR date LIKE '%$search%' OR time LIKE '%$search%' ORDER BY  createdAt DESC"; 
                }
                $eventResult = mysqli_query($con,$eventQuery);
                while($row = mysqli_fetch_assoc($eventResult)) {
                    ?>
                        <div style="width:100%; height: 200px; background-color: white;">
                        <div style="width:400px; height:200px;">
                            <a href="event-details.php?id=<?php  echo $row['eventId']?>">
                                <img src="../uploads/<?php echo $row['image'] ?>" width="100%" height="200px" alt="">
                            </a>
                        </div>
                        <div style="position: absolute;margin-top:-190px;margin-left:410px; margin-right: 30px;">
                        <a href="event-details.php?id=<?php  echo $row['eventId']?>">
                            <h1 style="color:#4b4276;"><?php echo $row['name'] ?></h1>
                        </a> 
                        <div>Event Date: 
                            <span style="font-size: 15px; background-color: green; color:white; margin-top: 10px; padding:2px;">
                                <?php echo date('M d Y H:i',strtotime($row['eventDate'])) ?>
                            </span>
                        </div>
                        <div style="font-size: 12px;">Published: <?php echo date('M d Y',strtotime($row['createdAt'])) ?></div> 
                        <div>Address: <?php echo $row['address'] ?></div> 
                        <p style="margin-top: 20px;">
                        <?php echo substr($row['description'], 0, 300) ?>
                        </p>
                        </div>
                    </div>
                    <hr style="margin-bottom: 10px;">
                    <?php
                }
            ?>
            </div>
        </div>
    </div>
</body>

</html>