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
    <title>Counsellor Appointment || Coms</title>
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
            </div>
            <div class="info">
                <form method="GET" class="search"> 
                    <input type="text" placeholder="Search" name="q" value="">
                    <input type="submit">
                </form><br><br>
                <table>
                    <tr>
                        <th>Orphan First Name</th> 
                        <th>Orphan Last Name</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Created At</th>
                        
                    </tr>
                    <?php
                        $userId = $_SESSION['userId'];
                        if($appointIsTrue) {
                            $appointIsTrue = true;
                            $searchIsTrue   = false;
                            $counsellorQuery= "SELECT * FROM counsellor WHERE staffId ='$userId'";
                        } elseif($searchIsTrue) {
                            $counsellorQuery= "SELECT * FROM counsellor WHERE staffId ='$userId'";
                        }
                        $counsellorResult= mysqli_query($con, $counsellorQuery);
                        if(mysqli_num_rows($counsellorResult) > 0) {
                            $counsellorData= $counsellorResult->fetch_assoc();
                        
                            $counsellorId = $counsellorData['counsellorId'];
                            $appointmentQuery = "SELECT * FROM counsellorappointment WHERE counsellorId='$counsellorId' ORDER BY createdAt DESC";
                            $appointmentResult = mysqli_query($con,$appointmentQuery);
                            while($row = mysqli_fetch_assoc($appointmentResult)) {
                                $orphanId = $row['orphanId'];
                                $orphanQuery= "SELECT * FROM user WHERE userId ='$orphanId'";
                                $orphanResult= mysqli_query($con, $orphanQuery);
                                if($orphanResult) {
                                    $orphanData= $orphanResult->fetch_assoc();
                                }
                                ?>
                                    <tr>
                                    <td><?php echo $orphanData['firstName'] ?></td>
                                        <td><?php echo $orphanData['lastName'] ?></td>
                                        <td><?php echo $row['time'] ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                        <td><?php echo date('M d Y',strtotime($row['createdAt'])) ?></td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <h3>You are not been added as a counsellor</h3>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>