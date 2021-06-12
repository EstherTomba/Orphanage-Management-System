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
            </div>
            <div class="info">
             
                <form  name="childTransferForm" method="POST" onsubmit="return childTransferValidation()">
                    <?php 
                        include('../error.php');
                    ?>
                    <div>
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
                        <input type="text" name="orphanageName" id="orphanageName" placeholder="Orphanage Name" value="<?php echo $orphanData['orphanageName'] ?>">
                    </div>
                    <div>
                        <input type="email" name="orphanageEmail" id="orphanageEmail" placeholder="Orphanage Email" value="<?php echo $orphanData['orphanageEmail'] ?>">
                    </div>
                    <div>
                        <input type="text" name="orphanagePhoneNumber1" id="orphanagePhoneNumber1" placeholder="Orphanage Phone Number 1" value="<?php echo $orphanData['orphanagePhoneNumber1'] ?>">
                    </div>
                    <div>
                        <input type="text" name="orphanagePhoneNumber2" id="orphanagePhoneNumber2"   placeholder="Orphanage Phone Number 2" value="<?php echo $orphanData['orphanagePhoneNumber2'] ?>">
                    </div>
                    <div>
                        <input type="text" name="orphanageWebsite" id="orphanageWebsite"  placeholder="Orphanage Website" value="<?php echo $orphanData['orphanageWebsite'] ?>">
                    </div>
                    <div>
                        <input type="text" name="orphanageAddress" id="orphanageAddress"  placeholder="Orphanage Address" value="<?php echo $orphanData['orphanageAddress'] ?>">
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