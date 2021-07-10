<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
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
            <a href="counsellor-appointment.php">Counsellor Appointment /</a>Add
            <?php 
                include("profileLogout.php")
            ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form name="counsellorAddAppointmentForm" method="POST" onsubmit="return counsellorAddAppointmentValidation()">
                <?php 
                    include('../error.php');
                ?>
                  <div>
                    <select name="orphanId" id="orphanId">
                        <option value="">Select Orphan</option>
                        <?php 
                            $orphanQuery = "SELECT * FROM user WHERE userRole='Orphan' ORDER BY createdAt DESC";
                            $orphanResult = mysqli_query($con, $orphanQuery);
                            while($row = mysqli_fetch_assoc($orphanResult)) {
                                ?>
                                    <option value="<?php echo $row['userId'] ?>"><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                  </div>
                  <div>
                      <select name="counsellorId" id="counsellorId">
                          <option value="">Select Counsellor</option>
                          <?php 
                                $staffQuery = "SELECT * FROM counsellor ORDER BY createdAt DESC";
                                $staffResult = mysqli_query($con, $staffQuery);
                                while($row = mysqli_fetch_assoc($staffResult)) {
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
                    <input name="date" id="date" type="date">
                  </div>
                  <div>
                    <input name="time" id="time" type="time">
                  </div>
                  <div>
                      <input type="submit" name="addCounsellorAppointment" value="Save">
                  </div>
                 
              </form>
              <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>

<style>
    .footer {
        position: fixed;
        bottom: 0px;
        padding: 15px;
        margin-bottom: 0px;
    }
</style>

</html>