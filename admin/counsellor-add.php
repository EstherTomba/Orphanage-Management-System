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
    <title>Add Counsellor || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
            <a href="counsellor.php">Counsellors </a>/Add
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
                                $counsellorAddQuery= "SELECT * FROM user WHERE userRole='Staff' ORDER BY  createdAt DESC";
                                $counsellorAddResult= mysqli_query($con, $counsellorAddQuery);
                                while($row = mysqli_fetch_assoc($counsellorAddResult)) {
                                    ?>
                                    <option value="<?php echo $row['userId'] ?>"><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></option>
                                    <?php
                                }
                            ?>

                       </select>
                   </div>
                   
                 <div>
                 <label for="workTime" style="float: left;">Working Time</label>
                     <input type="text" name="workTime" id="workTime" placeholder="">
                 </div>
                 <div>
                 <label for="workDate" style="float: left;">Working Date</label>
                    <input type="text" name="workDate" id="workDate" placeholder="">
                 </div>
                  
                   <div>
                       <input type="submit" name="addCounsellor" value="Save">
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