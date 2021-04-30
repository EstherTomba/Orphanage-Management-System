
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
    <title>Counsellor Appointment</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Counsellor Appointment
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="counsellor-appointment-add.php" style="color: white;">Add Appointment</a>  
                  </button> 
            </div>
            <div class="info">
                <?php
                    include('../error.php');
                    include('../success.php');
                ?> 
                <table>
                    <tr>
                        <th>Counsellor Name</th>
                        <th>Orphan Name</th> 
                        <th>Time</th> 
                         <th>Date</th>
                         <th>Created At</th> 
                        
                    </tr>
                    <?php 
                        $appointmentQuery= "SELECT * FROM counsellorappointment ORDER BY createdAt Desc";
                        $appointmentResult= mysqli_query($con, $appointmentQuery);
                         while($row= mysqli_fetch_assoc($appointmentResult)) {
                            // GET ORPHAN DATA
                            $orphanId = $row['orphanId'];
                            $orphanQuery= "SELECT * FROM user WHERE userId='$orphanId'";
                            $orphanResult= mysqli_query($con, $orphanQuery);
                            if($orphanResult) {
                                $orphanData= $orphanResult->fetch_assoc();
                            }
                            // GET COUNSELLOR DATA
                            $counsellorId= $row['counsellorId'];
                            $counsellorQuery= "SELECT * FROM user WHERE userId='$counsellorId'";
                            $counsellorResult= mysqli_query($con, $counsellorQuery);
                            if($counsellorResult) {
                                $counsellorData= $counsellorResult->fetch_assoc();
                            }
                            ?>
                                <tr>
                                    <td><a href="counsellor-appointment-details.php?id=<?php  echo $row['counsellorAppointmentId']?>"><?php  echo $counsellorData['firstName']?> <?php  echo $counsellorData['lastName']?></a></td>
                                    <td> <?php echo $orphanData['firstName'];?> <?php  echo $counsellorData['lastName']?></td>
                                    <td><?php  echo $row['time']?></td>
                                    <td><?php  echo $row['date']?></td> 
                                    <td> <?php echo date('M D Y', strtotime($row['createdAt']))  ?></td>
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