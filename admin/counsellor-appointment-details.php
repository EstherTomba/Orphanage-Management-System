<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $counsellorAppointmentId= $_GET['id'];
    $counsellorAppointmentQuery= "SELECT * FROM counsellorappointment WHERE counsellorAppointmentId='$counsellorAppointmentId'";
    $counsellorAppointmentResult= mysqli_query($con, $counsellorAppointmentQuery);
    if($counsellorAppointmentResult) {
        $counsellorAppointmentData= $counsellorAppointmentResult->fetch_assoc();
    }

    // GET COUNSLLOR AND THEN USER DETAILS
    $counsellorId= $counsellorAppointmentData['counsellorId'];
    $counsellorQuery= "SELECT * FROM counsellor WHERE counsellorId='$counsellorId'";
    $counsellorResult= mysqli_query($con, $counsellorQuery);
    if($counsellorResult) {
        $counsellorData= $counsellorResult->fetch_assoc();
        $staffId= $counsellorData['staffId'];
        $staffQuery= "SELECT * FROM user WHERE userId='$staffId'";
        $staffResult= mysqli_query($con, $staffQuery);
        if($staffResult) {
            $staffData= $staffResult->fetch_assoc();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Counsellor Appointment Details || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
            <a href="counsellor-appointment.php">Counsellor Appointment /</a>Details
            </div>
            <div class="info">
                <form name="counsellorAddAppointmentForm" method="POST" onsubmit="return counsellorAddAppointmentValidation()">
                <?php 
                    include('../error.php');
                ?>
                  <div>
                    <select name="orphanId" id="orphanId">
                        <option value="">Select Orphan</option>
                        <?php 
                            $orphanQuery = "SELECT * FROM user WHERE userRole='Orphan'";
                            $orphanResult = mysqli_query($con,$orphanQuery);
                            while($orphan = mysqli_fetch_assoc($orphanResult)) {
                                ?>
                                    <option value="<?php echo $orphan['userId'] ?>" <?php if ($counsellorAppointmentData['orphanId'] == $orphan['userId']) echo 'selected="selected"'; ?>><?php echo $orphan['firstName'] ?> <?php echo $orphan['lastName'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </div>
                  <div>
                      <select name="counsellorId" id="counsellorId">
                          <option value="">Select Counsellor</option>
                          <?php 
                                $counsellor2Query = "SELECT * FROM counsellor";
                                $counsellor2Result = mysqli_query($con,$counsellor2Query);
                                while($counsellor2 = mysqli_fetch_assoc($counsellor2Result)) {
                                    $userId= $counsellor2['staffId'];
                                    $userQuery= "SELECT * FROM user WHERE userId='$userId'";
                                    $userResult= mysqli_query($con, $userQuery);
                                    if($userResult) {
                                        $userData= $userResult->fetch_assoc();
                                    }
                                    ?>
                                        <option value="<?php echo $counsellor2['counsellorId'] ?>" <?php if ($counsellor2['staffId'] == $userData['userId']) echo 'selected="selected"'; ?>><?php echo $userData['firstName'] ?> <?php echo $userData['lastName'] ?></option>
                                    <?php
                                }
                            ?>
                      </select>
                  </div>
                  <div>
                    <input name="date" id="date" type="date" value="<?php echo $counsellorAppointmentData['date'] ?>">
                  </div>
                  <div>
                    <input name="time" id="time" type="time" value="<?php echo $counsellorAppointmentData['time'] ?>">
                  </div>
                  <div>
                    <input name="counsellorAppointmentId" id="counsellorAppointmentId" type="hidden" value="<?php echo $counsellorAppointmentData['counsellorAppointmentId'] ?>">
                  </div>
                  <div>
                      <input type="submit" name="aupdateCounsellorAppointment" value="Update">
                  </div>
                 
              </form>
              <form action="" method="POST">
                    <div>
                        <input type="hidden" name="counsellorAppointmentId" value="<?php echo $counsellorAppointmentData['counsellorAppointmentId'] ?>" value="Update">
                    </div>
                    <div>
                        <input type="submit" name="deletecounsellorAppointment" style="background-color:red;" value="Delete">
                    </div>
                    </form>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>