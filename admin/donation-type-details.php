<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    
    $donationTypeId= $_GET['id'];
    $donationTypeQuery= "SELECT * FROM donationtype WHERE donationTypeId='$donationTypeId'";
    $donationTypeResult= mysqli_query($con, $donationTypeQuery);
    if($donationTypeResult) {
        $donationTypeData= $donationTypeResult->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Donation Type Details || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
        <div class="header" style="color: red; font-size: 20px;">
                <a href="donation-type.php">Donation Type /</a> Details
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form name="donationTypeAddForm" method="POST" onsubmit="return donationTypeAddValidation()">
                <?php 
                    include('../error.php');
                ?>
                 <div>
                     <input type="text" name="name"  placeholder="Name" value="<?php echo $donationTypeData['name'] ?>">
                 </div>
                 <input type="hidden" name="donationTypeId" value="<?php echo $donationTypeData['donationTypeId'] ?>">
                 <div>
                     <input type="submit" name="updateDonationType" value="Update">
                 </div>
             </form>
             <form action="" method="POST">
                    <div>
                        <input type="hidden" name="donationTypeId" value="<?php echo $donationTypeData['donationTypeId'] ?>" value="Update">
                    </div>
                    <div>
                        <input type="submit" name="deleteDonnationType" style="background-color:red;" value="Delete">
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