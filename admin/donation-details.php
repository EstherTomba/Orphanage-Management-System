<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $donationId= $_GET['id'];
    $donationQuery= "SELECT * FROM donation WHERE donationId='$donationId'";
    $donationResult= mysqli_query($con, $donationQuery);
    if($donationResult) {
        $donationData= $donationResult->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Donation Details || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
                <a href="donation.php">Donation /</a> Details
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form name="donationAddForm" method="POST" onsubmit="return donationAddValidation()">
                <?php 
                    include('../error.php');
                ?>
               <div>
               <label for="firstName" style="float: left;">First Name</label>
                <input type="text" name="firstName" id="firstName" value="<?php echo $donationData['firstName'] ?>">
               </div>
               <div>
               <label for="lastName" style="float: left;">Last Name</label>
                <input type="text" name="lastName" id="lastName" value="<?php echo $donationData['lastName'] ?>" >  
               </div>
               <div>
               <label for="phoneNumber" style="float: left;">Phone Number</label>
                <input type="text" name="phoneNumber" id="phoneNumber" value="<?php echo $donationData['phoneNumber'] ?>">  
               </div>
               <div>
               <label for="email" style="float: left;">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $donationData['email'] ?>">  
               </div>
               <div>
               <label for="address" style="float: left;">Address</label>
                <input type="text" name="address" id="address" value="<?php echo $donationData['address'] ?>">  
               </div>
               <div>
               <label for="amount" style="float: left;">Amount</label>
                <input type="number" name="amount" id="amount" value="<?php echo $donationData['amount'] ?>">  
               </div>

               <div>
                <input type="hidden" name="donationId" id="donationId" value="<?php echo $donationData['donationId'] ?>">  
               </div>
              
               <div>
               <label for="donationTypeId" style="float: left;"> Donation Type</label>
                   <select name="donationTypeId" id="donationTypeId">
                       <option value="">Select Donation Type</option>
                        <?php 
                            $donationTypeQuery = "SELECT * FROM donationtype ORDER BY createdAt DESC";
                            $donationTypeResult = mysqli_query($con, $donationTypeQuery);
                            while($row = mysqli_fetch_assoc($donationTypeResult)) {
                                ?>
                                    <option value="<?php echo $row['donationTypeId'] ?>" <?php if ($donationData['donationTypeId'] == $row['donationTypeId']) echo 'selected="selected"'; ?>><?php echo $row['name'] ?></option>
                                <?php
                            }
                        ?>
                    </select>   
               </div>
               <div>
               <label for="description" style="float: left;">Description</label>
                <textarea cols="30" rows="10" name="description" id="description">
                <?php echo $donationData['description'] ?>
                </textarea>
            </div>
               <div>
                <input type="submit" name="updateDonation" value="Update">
            </div>
           </form>
           <form action="" method="POST">
                    <div>
                    <label for="workTime" style="float: left;"></label>
                        <input type="hidden" name="donationId" value="<?php echo $donationData['donationId'] ?>" value="Update">
                    </div>
                    <div>
                        <input type="submit" name="deleteDonation" style="background-color:red;" value="Delete">
                    </div>
                    </form>
                    <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>
<script src="js/validation.js"></script>



</html>