<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }

    $counsellorId= $_GET['id'];
    $counsellorQuery= "SELECT * FROM counsellor WHERE counsellorId='$counsellorId'";
    $counsellorResult= mysqli_query($con, $counsellorQuery);
    if($counsellorResult) {
        $counsellorData= $counsellorResult->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Counsellor || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
            <a href="counsellor.php">Counsellors </a>/Details
            <?php 
                include("profileLogout.php")
            ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">

                <form name="counsellorAddForm" method="POST" onsubmit="return counsellorAddValidation()">
                <?php 
                    include('../error.php');
                ?>
                   <div>
                   <label for="staffId" style="float: left;">Staff</label>
                       <select name="staffId" id="staffId">
                           <option value="">Select Staff</option>
                            <?php 
                                $userQuery = "SELECT * FROM user WHERE userRole='Staff'";
                                $userResult = mysqli_query($con,$userQuery);
                                while($user = mysqli_fetch_assoc($userResult)) {
                                    ?>
                                        <option value="<?php echo $user['userId'] ?>" <?php if ($counsellorData['staffId'] == $user['userId']) echo 'selected="selected"'; ?>><?php echo $user['firstName'] ?> <?php echo $user['lastName'] ?></option>
                                    <?php
                                }
                            ?>
                       </select>
                   </div>
                   
                 <div>
                 <label for="workTime" style="float: left;">Working Time</label>
                     <input type="text" name="workTime" id="workTime" value="<?php echo $counsellorData['workingTime'] ?>">
                 </div>
                 <div>
                 <label for="workDate" style="float: left;">Working Date</label>
                    <input type="text" name="workDate" id="workDate" value="<?php echo $counsellorData['workingDate'] ?>">
                 </div>

                 <div>
                    <input type="hidden" name="counsellorId" id="counsellorId" value="<?php echo $counsellorData['counsellorId'] ?>">
                 </div>
                  
                   <div>
                       <input type="submit" name="updateCounsellor" value="Update">
                   </div>
               </form>
               <form action="" method="POST">
                    <div>
                        <input type="hidden" name="counsellorId" value="<?php echo $counsellorData['counsellorId'] ?>" value="Update">
                    </div>
                    <div>
                        <input type="submit" name="deleteCounsellor" style="background-color:red;" value="Delete">
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