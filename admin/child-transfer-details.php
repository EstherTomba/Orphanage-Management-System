<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $orphanTransferId= $_GET['id'];
    $orphanQuery= "SELECT * FROM orphantransfer WHERE orphanTransferId='$orphanTransferId'";
    $orphanResult= mysqli_query($con, $orphanQuery);
    if($orphanResult) {
        $orphanData= $orphanResult->fetch_assoc();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Orphan Transfer Details || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
        <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
                <a href="child-transfer.php">Orphan Transfer </a>/Details
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
                    <label for="orphanId" style="float: left;">Orphan</label>
                        <select name="orphanId" id="orphanid">
                            <option value="">Select an Orphan</option>
                            <?php
                                $orphanQuery= "SELECT * FROM user WHERE userRole='Orphan' ORDER BY  createdAt DESC";
                                $orphanResult= mysqli_query($con, $orphanQuery);
                                while($row = mysqli_fetch_assoc($orphanResult)) {
                                    ?>
                                        <option value="<?php echo $row['userId'] ?>" <?php if ($orphanData['orphanId'] == $row['userId']) echo 'selected="selected"'; ?>><?php echo  $row['firstName']?> <?php echo  $row['lastName']?></option>
                                    <?php 
                                }
                            ?>
                        </select>
                    </div>

                    <div>
                    <label for="orphanageName" style="float: left;">Orphanage Name</label>
                        <input type="text" name="orphanageName" id="orphanageName" value="<?php echo $orphanData['orphanageName'] ?>">
                    </div>
                    <div>
                    <label for="orphanageEmail" style="float: left;">Orphanage Email</label>
                        <input type="email" name="orphanageEmail" id="orphanageEmail" value="<?php echo $orphanData['orphanageEmail'] ?>">
                    </div>
                    <div>
                    <label for="orphanagePhoneNumber1" style="float: left;">Orphanage Phone Number 1</label>
                        <input type="text" name="orphanagePhoneNumber1" id="orphanagePhoneNumber1" value="<?php echo $orphanData['orphanagePhoneNumber1'] ?>">
                    </div>
                    <div>
                    <label for="orphanagePhoneNumber2" style="float: left;">orphanagePhoneNumber 2</label>
                        <input type="text" name="orphanagePhoneNumber2" id="orphanagePhoneNumber2"value="<?php echo $orphanData['orphanagePhoneNumber2'] ?>">
                    </div>
                    <div>
                    <label for="orphanageWebsite" style="float: left;">Orphanage Website</label>
                        <input type="text" name="orphanageWebsite" id="orphanageWebsite" value="<?php echo $orphanData['orphanageWebsite'] ?>">
                    </div>
                    <div>
                    <label for="orphanageAddress" style="float: left;">Orphanage Address</label>
                        <input type="text" name="orphanageAddress" id="orphanageAddress"  value="<?php echo $orphanData['orphanageAddress'] ?>">
                    </div>
                    <div>
                        <input type="hidden" name="orphanTransferId" id="orphanTransferId" value="<?php echo $orphanData['orphanTransferId'] ?>">
                    </div>
                    
                    <div>
                        <input type="submit" name="updateTransferChild" value="Update" style="width: 49.8%;">  
                        <input type="submit" name="deleteChildTransfer" style="background-color:red; width: 49.8%;" value="Delete">
                    </div>
                </form>
                    <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>