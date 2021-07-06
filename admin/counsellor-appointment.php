
<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $appointmentIsTrue = true;
    $searchIsTrue   = false;
    $search   = '';
    if(isset($_GET['q'])) {
        $appointmentIsTrue = false;
        $searchIsTrue   = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
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
            <?php 
            include("profileLogout.php")
            ?>
            </div>
            <div class="info">
                <form method="GET" class="search"> 
                    <input type="text" placeholder="Search" name="q" value="<?php echo $search ?>">
                    <input type="submit">
                </form>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="counsellor-appointment-add.php" style="color: white;">Add Appointment</a>  
                </button> <br><br>
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
                         if($appointmentIsTrue) {
                            $appointmentIsTrue = true;
                            $searchIsTrue   = false;
                            $appointmentQuery= "SELECT * FROM counsellorappointment ORDER BY createdAt Desc";
                        } elseif($searchIsTrue) {
                            $appointmentQuery= "SELECT * FROM counsellorappointment ORDER BY createdAt Desc";
                        }
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
                                    <td><a href="counsellor-appointment-details.php?id=<?php  echo $row['counsellorAppointmentId']?>"><?php  echo $staffData['firstName']?> <?php  echo $staffData['lastName']?></a></td>
                                    <td> <?php echo $orphanData['firstName'];?> <?php  echo $orphanData['lastName']?></td>
                                    <td><?php  echo $row['time']?></td>
                                    <td><?php  echo $row['date']?></td> 
                                    <td> <?php echo date('M D Y', strtotime($row['createdAt']))  ?></td>
                                 </tr>
                            <?php
                        }
                    
                    ?>  
                </table>
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>
</html>