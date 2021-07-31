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
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form name="donationAddForm" method="POST" enctype="multipart/form-data">
                    <?php 
                        include('../error.php');
                    ?>
                    <div>
                    <img src="../uploads/<?php echo $eventData['image'] ?>" width="100%" height="300px" alt="">
                        <input type="file" name="image" id="image">
                    </div>
                    <div style="font-size: 15px; background-color: green; color:white; margin-top: 10px;">Event Date: <?php echo date('M d Y H:i',strtotime($eventData['eventDate'])) ?></div>
                    <div style="font-size: 13px;">Published: 31/12/2020</div>
                    <div>
                    <label for="name" style="float: left;">Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $eventData['name'] ?>">
                    </div>
                    <div>
                    <label for="address" style="float: left;">Address</label>
                        <input type="text" name="address" id="address" value="<?php echo $eventData['address'] ?>">
                    </div>
                    <div>
                    <label for="description" style="float: left;">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10">
                            <?php echo $eventData['description'] ?>
                        </textarea>
                    </div>
                    <div>
                        <input type="hidden" name="eventId" id="eventId" value="<?php echo $eventData['eventId'] ?>">
                    </div>
                    <div>
                        <input type="submit" name="updateEvent" value="Update" style="width: 49.5%;">
                        <input type="submit" name="deleteEvent" style="background-color:red; width: 49.5%;" value="Delete">
                    </div>
                </form><br>
                <!-- LIST ALL PARTICIPANTS -->
                <div style="font-size: 20px">PARTICIPANTS</div>
                <?php
                    // GET ACTIVITY COMMENTS DATA
                    $eventAttendanceQuery = "SELECT * FROM eventattendance WHERE eventId='$eventId'";
                    $eventAttendanceResult = mysqli_query($con, $eventAttendanceQuery);
                    while ($attendances = mysqli_fetch_assoc($eventAttendanceResult)) {
                        // GET USER DETAILS
                        $getEventUserId = $attendances['userId'];
                        $getEventUserQuery = "SELECT * FROM user WHERE userId='$getEventUserId'";
                        $getEventUserResult = mysqli_query($con, $getEventUserQuery);
                        if($getEventUserResult){
                            $userEventData = $getEventUserResult->fetch_assoc();
                        }
                        ?>
                            <div style="border: 1px solid #4b4276; padding:10px; border-radius: 15px; background-color: white; margin-bottom: 10px">
                                <div style="font-size: 20px; color: #4b4276"> <?php echo $userEventData['firstName']; ?> <?php echo $userEventData['lastName']; ?></div>
                            </div>
                        <?php
                    }
                ?>

                <!-- LIST ALL COMMENTS -->
                <br><br><div style="font-size: 20px">COMMENTS</div>
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