<?php 
    require_once('../config/user.php'); 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Appointment || Coms</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">New  Appointment
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info">
                <form name="newAppointmentForm" method="POST" onsubmit="return newAppointmentValidation()">
                <?php 
                    include('../error.php');
                ?>
                <div>
                    <select name="counsellorId" id="counsellorId">
                        <option value="">Select Counsellor</option>
                        <?php
                            $counsellorQuery = "SELECT * FROM counsellor ORDER BY createdAt DESC";
                            $counsellorResult = mysqli_query($con, $counsellorQuery);
                            while($row = mysqli_fetch_assoc($counsellorResult)) {
                                $userId = $row['staffId'];
                                $userQuery = "SELECT * FROM user WHERE userId='$userId'";
                                $userResult = mysqli_query($con, $userQuery);
                                if($userResult) {
                                    $userData = $userResult->fetch_assoc();
                                }
                                ?>
                                    <option value="<?php echo $row['counsellorId'] ?>"><?php echo $userData['firstName'] ?> <?php echo $userData['lastName'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                 </div>
                <div>
                    <input type="date" name="date" id="date">
                </div>
                <div>
                    <input type="time" name="time" id="time">
                </div>
                <div>
                    <input type="submit" name="newAppointment" value="Save">
                </div>
             </form>  
            </div>
        </div>
    </div>
</body>
<script src="js/header.js"></script>
<script src="js/validation.js"></script>

</html>