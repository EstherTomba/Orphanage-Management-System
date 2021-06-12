<?php 
    require_once('../config/db.php'); 
    // require_once('../config/user.php');    
    // if (!isset($_SESSION['isStaff'])) {
    //     header('location: ../login.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Counsellor Appointments || Coms</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Counsellor Appointment
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="orphan-new-appointment.php" style="color: white;">New Appointment</a>  
                  </button> 
            </div>
            <div class="info">
                <table>
                    <tr>
                        <th>Counsellor First Name</th> 
                        <th>Counsellor Last Name</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Created At</th>
                        
                    </tr>
                    <?php
                        $orphanId = $_SESSION['userId'];
                        $appointmentQuery = "SELECT * FROM counsellorappointment WHERE orphanId='$orphanId' ORDER BY createdAt DESC";
                        $appointmentResult = mysqli_query($con,$appointmentQuery);
                        while($row = mysqli_fetch_assoc($appointmentResult)) {
                            // GET COUNSELLOR DATA
                            $counsellorId= $row['counsellorId'];
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
                                <tr>
                                    <td><?php echo $staffData['firstName'] ?></td>
                                    <td><?php echo $staffData['lastName'] ?></td>
                                    <td><?php echo $row['time'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo date('M d Y',strtotime($row['createdAt'])) ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>