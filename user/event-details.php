<?php 
    require_once('../config/db.php'); 
    require_once('../config/user.php');    
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
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
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
                        <div>
                        <form method="POST"> 
                            <input type="hidden" name="eventId" value="<?php echo $_GET['id'] ?>">
                            <input type="submit" value="Participate" name="eventParticipate">
                        </form>
                        </div>
                        <p><?php echo $eventData['description'] ?></p>
                
                     </div>
                </div><br>

                <?php
                    // GET ACTIVITY COMMENTS DATA
                    $eventCommentQuery = "SELECT * FROM eventcomment WHERE eventId='$eventId'";
                    $eventCommentResult = mysqli_query($con, $eventCommentQuery);
                    while ($comments = mysqli_fetch_assoc($eventCommentResult)) {
                        // GET USER DETAILS
                        $getUserId = $comments['userId'];
                        $getUserQuery = "SELECT * FROM user WHERE userId='$getUserId'";
                        $getUserResult = mysqli_query($con, $getUserQuery);
                        if($getUserResult){
                            $userData = $getUserResult->fetch_assoc();
                        }
                        ?>
                            <div style="border: 1px solid #4b4276; padding:10px; border-radius: 15px; background-color: white; margin-bottom: 10px">
                                <div style="font-size: 20px; color: #4b4276"> <?php echo $userData['firstName']; ?> <?php echo $userData['lastName']; ?></div>
                                <div>
                                    <?php echo $comments['description']; ?>
                                </div>
                            </div>
                        <?php
                    }
                ?>
                
                <br><br>
                <form name="contactAdminForm" method="POST" onsubmit="return contactAdminValidation()">
                    <div>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    <div>
                        <input type="hidden" id="eventId" name="eventId" value="<?php echo $eventId ?>">
                    </div>
                    
                     <div>
                         <input type="submit" name="addEventComment" value="Comment">
                     </div> 
                 </form>
            </div>
        </div>
    </div>
</body>

</html>