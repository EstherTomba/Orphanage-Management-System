
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
    <title>Help || Coms</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Help
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="overflow: auto;">
                <?php 
                    include('../error.php');
                ?>

                <?php
                    $userId = $_SESSION['userId'];
                    $contactQuery = "SELECT * FROM help WHERE userId='$userId'";
                    $contactResult = mysqli_query($con, $contactQuery);
                    while($row = mysqli_fetch_assoc($contactResult)) {
                        // GET ORPHAN OR STAFF DETAILS
                        $getOrphanOrStaffQuery = "SELECT * FROM user WHERE userId='$userId'";
                        $getOrphanOrStaffResult = mysqli_query($con, $getOrphanOrStaffQuery);
                        if($getOrphanOrStaffResult){
                            $OrphanOrStaffData = $getOrphanOrStaffResult->fetch_assoc();
                        }
                        // GET ADMIN DETAILS
                        $getAdminId = $row['adminId'];
                        $getAdminQuery = "SELECT * FROM user WHERE userId='$getAdminId'";
                        $getAdminResult = mysqli_query($con, $getAdminQuery);
                        if($getAdminResult){
                            $adminData = $getAdminResult->fetch_assoc();
                        }
                        if(!$row['adminId']){
                            ?>
                                <div style="background-color:blueviolet; color: white; padding: 10px; margin: 10px 0px 10px 200px;">
                                    <h4>User: <?php echo $OrphanOrStaffData['firstName'] ?> <?php echo $OrphanOrStaffData['lastName'] ?></h4>
                                    <p>
                                        <?php echo $row['message'] ?>
                                    </p>
                                </div>
                            <?php                         
                        }
                        if($row['adminId'] && $row['userId']) {
                            ?>
                                <div style="background-color: #adddad; padding: 10px; margin: 10px 200px 10px 0px;">
                                    <h4>Admin: <?php echo $adminData['firstName'] ?> <?php echo $adminData['lastName'] ?></h4>
                                    <p>
                                    <?php echo $row['message'] ?>
                                    </p>
                                </div>
                            <?php
                        }
                    }
                ?>
            
                

                <br><br><br><br><br><br><br><br><br>
                <form name="contactAdminForm" method="POST" style="position: fixed; bottom: 0px; width: 83%;" onsubmit="return contactAdminValidation()">
                    <div>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    
                     <div>
                         <input type="submit" name="help" value="Response">
                     </div> 
                 </form>
            </div>
        </div>
    </div>
</body>
<script src="js/header.js"></script>
<script src="js/validation.js"></script>
</html>