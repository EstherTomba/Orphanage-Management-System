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
            </div>
            <div class="info">

                <form name="counsellorAddForm" method="POST" onsubmit="return counsellorAddValidation()">
                <?php 
                    include('../error.php');
                ?>
                   <div>
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
                     <input type="text" name="workTime" id="workTime" placeholder="Working Time">
                 </div>
                 <div>
                    <input type="text" name="workDate" id="workDate" placeholder="Working Date">
                 </div>
                  
                   <div>
                       <input type="submit" name="addCounsellor" value="Save">
                   </div>
               </form>

            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>