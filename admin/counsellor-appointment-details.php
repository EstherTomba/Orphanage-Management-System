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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Counsellor Appointment || Coms</title>
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
                                $counsellorQuery = "SELECT * FROM user WHERE userRole='Staff'";
                                $counsellorResult = mysqli_query($con,$counsellorQuery);
                                while($counsellor = mysqli_fetch_assoc($counsellorResult)) {
                                    ?>
                                        <option value="<?php echo $counsellor['userId'] ?>" <?php if ($counsellorAppointmentData['counsellorId'] == $counsellor['userId']) echo 'selected="selected"'; ?>><?php echo $counsellor['firstName'] ?> <?php echo $counsellor['lastName'] ?></option>
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
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>