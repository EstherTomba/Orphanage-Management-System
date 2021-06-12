<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $eventId= $_GET['id'];
    $eventQuery= "SELECT * FROM event WHERE eventId='$eventId'";
    $eventResult= mysqli_query($con, $eventQuery);
    if($eventResult) {
        $eventData= $eventResult->fetch_assoc();
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
            <div class="header" style="color: red; font-size: 20px;">
                <a href="event.php">Event /</a>Details
            </div>
            <div class="info">
                <form name="donationAddForm" method="POST" enctype="multipart/form-data">
                    <?php 
                        include('../error.php');
                    ?>
                    <div>
                    <img src="../uploads/<?php echo $eventData['image'] ?>" width="100%" height="300px" alt="">
                        <input type="file" name="image" id="image">
                    </div>
                    <div style="font-size: 13px;">Date:31/12/2020</div>
                    <div>
                        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $eventData['name'] ?>">
                    </div>
                    <div>
                        <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $eventData['address'] ?>">
                    </div>
                    <div>
                        <textarea name="description" id="description" cols="30" rows="10">
                            <?php echo $eventData['description'] ?>
                        </textarea>
                    </div>
                    <div>
                        <input type="hidden" name="eventId" id="eventId" value="<?php echo $eventData['eventId'] ?>">
                    </div>
                    <div>
                        <input type="submit" name="updateEvent" value="Update" style="width: 49.8%;">
                        <input type="submit" name="deleteEvent" style="background-color:red; width: 49.8%;" value="Delete">
                    </div>
                </form><br>

                <div style="font-size: 20px">COMMENTS</div>

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
                    <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

</html>