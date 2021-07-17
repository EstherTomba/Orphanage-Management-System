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
    <title>Orphan Transfer || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
        <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
                <a href="child-transfer.php">Orphan Transfer </a>/Add
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
             
                <form  name="childTransferForm" method="POST" onsubmit="return childTransferValidation()">
                    <?php 
                        include('../error.php');
                    ?>
                    <div>
                    <label for="applicantEmail" style="float: left;">Orphan</label>
                        <select name="orphanId" id="orphanid">
                            <option value="">Select an Orphan</option>
                            <?php
                                $orphanQuery= "SELECT * FROM user WHERE userRole='Orphan' ORDER BY  createdAt DESC";
                                $orphanResult= mysqli_query($con, $orphanQuery);
                                while($row = mysqli_fetch_assoc($orphanResult)) {
                                    ?>
                                        <option value="<?php echo $row['userId'] ?>"><?php echo  $row['firstName']?> <?php echo  $row['lastName']?></option>
                                    <?php 
                                }
                            ?>

                        </select>
                    </div>

                    <div>
                    <label for="orphanageName" style="float: left;">Orphanage Name</label>
                        <input type="text" name="orphanageName" id="orphanageName">
                    </div>
                    <div>
                    <label for="email" style="float: left;">Orphanage Email</label>
                        <input type="email" name="orphanageEmail" id="orphanageEmail">
                    </div>
                    <div>
                    <label for="orphanagePhoneNumber1" style="float: left;">Orphanage Phone Number 1</label>
                        <input type="text" name="orphanagePhoneNumber1" id="orphanagePhoneNumber1">
                    </div>
                    <div>
                    <label for="orphanagePhoneNumber2" style="float: left;">Orphanage Phone Number 2</label>
                        <input type="text" name="orphanagePhoneNumber2" id="orphanagePhoneNumber2">
                    </div>
                    <div>
                    <label for="orphanageWebsite" style="float: left;">Orphanage Website</label>
                        <input type="text" name="orphanageWebsite" id="orphanageWebsite">
                    </div>
                    <div>
                    <label for="orphanageAddress" style="float: left;">Orphanage Address</label>
                        <input type="text" name="orphanageAddress" id="orphanageAddress">
                    </div>
                    
                    <div>
                        <input type="submit" name="transferChild" value="Save">  
                    </div>
                </form>
               
            </div>
            <?php include('footer.php'); ?>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>