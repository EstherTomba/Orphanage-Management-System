<?php 
    require_once('../config/user.php'); 
    // require_once('../config/user.php');    
    // if (!isset($_SESSION['isStaff'])) {
    //     header('location: ../login.php');
    // }
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
                            $counsellorQuery = "SELECT * FROM user WHERE userRole='Staff'";
                            $counsellorResult = mysqli_query($con, $counsellorQuery);
                            while($row = mysqli_fetch_assoc($counsellorResult)) {
                                ?>
                                    <option value="<?php echo $row['userId'] ?>"><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></option>
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