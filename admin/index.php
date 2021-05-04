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
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
       <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Welcome to the Orphanage Center</div>
            <div class="info">
                <!-- FIRST ROW -->
                <div>
                    <div class="column" style="background-color: #4b4276; color:white;text-align: center;font-size:20px;">
                        <?php
                            $userQuery = "SELECT COUNT(*) AS total FROM user";
                            $userResult = mysqli_query($con, $userQuery);
                            $userData = mysqli_fetch_assoc($userResult);
                        ?>
                        <div>All Users</div>
                        <div><?php echo $userData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: orange; color:white;text-align: center;font-size:20px;">
                        <?php
                            $adminQuery = "SELECT COUNT(*) AS total FROM user WHERE userRole='Admin'";
                            $adminResult = mysqli_query($con, $adminQuery);
                            $adminData = mysqli_fetch_assoc($adminResult);
                        ?>
                        <div>Admins</div>
                        <div><?php echo $adminData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: green; color:white;text-align: center;font-size:20px;">
                        <?php  
                        $staffQuery = "SELECT COUNT(*)  AS total FROM user WHERE userRole='Staff'";
                        $staffResult = mysqli_query($con,$staffQuery);
                        $staffData = mysqli_fetch_assoc($staffResult);
                         ?>

                        <div>Staffs</div>
                        <div><?php echo $staffData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: #4b4276; color:white;text-align: center;font-size:20px;">
                      <?php 
                       $orphanQuery = "SELECT COUNT(*)  AS total FROM user WHERE userRole='Orphan'";
                       $orphanResult = mysqli_query($con,$orphanQuery);
                       $orphanData = mysqli_fetch_assoc($orphanResult);
                      
                      ?>
                        <div>Orphans</div>
                        <div><?php echo $orphanData['total']; ?></div>
                    </div>
                </div>

                <!-- SECOND ROW -->
                <div>
                    <div class="column" style="background-color: orange; color:white;text-align: center;font-size:20px;">
                       <?php 
                         $admissionQuery = "SELECT COUNT(*)  AS total FROM childadmission";
                         $admissionResult = mysqli_query($con,$admissionQuery);
                        $admissionData = mysqli_fetch_assoc($admissionResult);
                       
                       ?>
                        <div>Child Admissions</div>
                        <div><?php echo $admissionData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: green; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $transferQuery = "SELECT COUNT(*)  AS total FROM orphantransfer";
                         $transferResult = mysqli_query($con,$transferQuery);
                        $transferData = mysqli_fetch_assoc($transferResult);
                       
                       ?>
                        <div>Child Transfers</div>
                        <div><?php echo $transferData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: #4b4276; color:white;text-align: center;font-size:20px;">
                        <?php 
                         $approvalQuery = "SELECT COUNT(*)  AS total FROM childapproval";
                         $approvalResult = mysqli_query($con,$approvalQuery);
                        $approvalData = mysqli_fetch_assoc($approvalResult);
                       
                       ?>
                        <div>All Child Approvals</div>
                        <div><?php echo $approvalData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: orange; color:white;text-align: center;font-size:20px;">
                        <?php 
                         $approvalQuery = "SELECT COUNT(*)  AS total FROM childapproval WHERE status='Approved'";
                         $approvalResult = mysqli_query($con,$approvalQuery);
                        $approvalData = mysqli_fetch_assoc($approvalResult);
                       
                       ?>
                        <div>Child Approved</div>
                        <div><?php echo $approvalData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: green; color:white;text-align: center;font-size:20px;">
                        <?php 
                         $approvalQuery = "SELECT COUNT(*)  AS total FROM childapproval WHERE status='Rejected'";
                         $approvalResult = mysqli_query($con,$approvalQuery);
                        $approvalData = mysqli_fetch_assoc($approvalResult);
                       
                       ?>
                        <div>Child Rejected</div>
                        <div><?php echo $approvalData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: #4b4276; color:white;text-align: center;font-size:20px;">
                        <?php 
                         $approvalQuery = "SELECT COUNT(*)  AS total FROM childapproval WHERE status='Pending'";
                         $approvalResult = mysqli_query($con,$approvalQuery);
                        $approvalData = mysqli_fetch_assoc($approvalResult);
                       
                       ?>
                        <div>Child Pending</div>
                        <div><?php echo $approvalData['total']; ?></div>
                    </div>
                </div>

                <!-- THIRD ROW -->
                <div>
                    <div class="column" style="background-color: orange; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $blockQuery = "SELECT COUNT(*)  AS total FROM block";
                         $blockResult = mysqli_query($con,$blockQuery);
                         $blockData = mysqli_fetch_assoc($blockResult);

                       ?>
                        <div>Blocks</div>
                         <div><?php echo $blockData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: green; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $roomQuery = "SELECT COUNT(*)  AS total FROM blockroom";
                         $roomResult = mysqli_query($con,$roomQuery);
                         $roomData = mysqli_fetch_assoc($roomResult);

                       ?>
                        <div>Rooms</div>
                        <div><?php echo $roomData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: #4b4276; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $recordQuery = "SELECT COUNT(*)  AS total FROM medicalrecord";
                         $recordResult = mysqli_query($con,$recordQuery);
                         $recordData = mysqli_fetch_assoc($recordResult);

                       ?>
                        <div>Medical Records</div>
                        <div><?php echo $recordData['total']; ?></div>
                    </div>
                </div>

                <!-- THIRD ROW -->
                <div>
                    <div class="column" style="background-color: orange; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $counsellorQuery = "SELECT COUNT(*)  AS total FROM counsellor";
                         $counsellorResult = mysqli_query($con,$counsellorQuery);
                         $counsellorData = mysqli_fetch_assoc($counsellorResult);

                       ?>
                        <div>Counsellors</div>
                        <div><?php echo $counsellorData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: green; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $appointmentQuery = "SELECT COUNT(*)  AS total FROM counsellorappointment";
                         $appointmentResult = mysqli_query($con,$appointmentQuery);
                         $appointmentData = mysqli_fetch_assoc($appointmentResult);

                       ?>
                        <div>Counsellor Appointments</div>
                        <div><?php echo $appointmentData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: #4b4276; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $typeQuery = "SELECT COUNT(*)  AS total FROM donationtype";
                         $typeResult = mysqli_query($con,$typeQuery);
                         $typeData = mysqli_fetch_assoc($typeResult);

                       ?>
                        <div>Donation Types</div>
                        <div><?php echo $typeData['total']; ?></div>
                    </div>
                </div>

                <!-- THIRD ROW -->
                <div>
                    <div class="column" style="background-color: orange; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $donationQuery = "SELECT COUNT(*)  AS total FROM donation";
                         $donationResult = mysqli_query($con,$donationQuery);
                         $donationData = mysqli_fetch_assoc($donationResult);

                       ?>
                        <div>Donations</div>
                        <div><?php echo $donationData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: green; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $donationQuery = "SELECT COUNT(*)  AS total FROM donation";
                         $donationResult = mysqli_query($con,$donationQuery);
                         $donationData = mysqli_fetch_assoc($donationResult);

                       ?>
                        <div>Activity Categories</div>
                        <div><?php echo $donationData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: #4b4276; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $categoryQuery = "SELECT COUNT(*)  AS total FROM activitycategory";
                         $categoryResult = mysqli_query($con,$categoryQuery);
                         $categoryData = mysqli_fetch_assoc($categoryResult);

                       ?>
                        <div>Activities</div>
                        <div><?php echo $categoryData['total']; ?></div>
                    </div>
                </div>

                <!-- THIRD ROW -->
                <div>
                    <div class="column" style="background-color: orange; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $eventQuery = "SELECT COUNT(*)  AS total FROM event";
                         $eventResult = mysqli_query($con,$eventQuery);
                         $eventData = mysqli_fetch_assoc($eventResult);

                       ?>
                        <div>Events</div>
                        <div><?php echo $eventData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: green; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $contactQuery = "SELECT COUNT(*)  AS total FROM contact GROUP BY email";
                         $contactResult = mysqli_query($con,$contactQuery);
                         $contactData = mysqli_fetch_assoc($contactResult);

                       ?>
                        <div>Contacts</div>
                        <div><?php echo $contactData['total']; ?></div>
                    </div>
                    <div class="column" style="background-color: #4b4276; color:white;text-align: center;font-size:20px;">
                    <?php 
                         $helpQuery = "SELECT COUNT(*)  AS total FROM help GROUP BY userId";
                         $helpResult = mysqli_query($con,$helpQuery);
                         $helpData = mysqli_fetch_assoc($helpResult);

                       ?>
                        <div>Helps</div>
                        <div><?php echo $helpData['total']; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    .column {
        float: left;
        width: 32.8%;
        margin: 0.2%;
        padding: 15px;
    }
</style>
</html>