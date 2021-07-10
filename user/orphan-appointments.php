<?php 
    require_once('../config/db.php'); 
    $appointIsTrue = true;
    $searchIsTrue   = false;
    $search   = '';
    if(isset($_GET['q'])) {
        $appointIsTrue = false;
        $searchIsTrue   = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
    }
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
                <?php 
                    include("profileLogout.php")
                ?>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="orphan-new-appointment.php" style="color: white;">New Appointment</a>  
                  </button> 
            </div>
            <div class="info">
                <form method="GET" class="search"> 
                    <input type="text" placeholder="Search" name="q" value="">
                    <input type="submit">
                </form><br><br>
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
                        if($appointIsTrue) {
                            $appointIsTrue = true;
                            $searchIsTrue   = false;
                            $appointmentQuery = "SELECT * FROM counsellorappointment WHERE orphanId='$orphanId' ORDER BY createdAt DESC";
                        } elseif($searchIsTrue) {
                            $appointmentQuery = "SELECT * FROM counsellorappointment WHERE orphanId='$orphanId' ORDER BY createdAt DESC";
                        }
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