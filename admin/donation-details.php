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
            </div>
            <div class="info">
                <form name="donationAddForm" method="POST" onsubmit="return donationAddValidation()">
                <?php 
                    include('../error.php');
                ?>
               <div>
                <input type="text" name="firstName" id="firstName" placeholder="First Name" value="<?php echo $donationData['firstName'] ?>">
               </div>
               <div>
                <input type="text" name="lastName" id="lastName"  placeholder="Last Name" value="<?php echo $donationData['lastName'] ?>" >  
               </div>
               <div>
                <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" value="<?php echo $donationData['phoneNumber'] ?>">  
               </div>
               <div>
                <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $donationData['email'] ?>">  
               </div>
               <div>
                <input type="text" name="address" id="address"  placeholder="Address" value="<?php echo $donationData['address'] ?>">  
               </div>
               <div>
                <input type="number" name="amount" id="amount" placeholder="Amount" value="<?php echo $donationData['amount'] ?>">  
               </div>

               <div>
                <input type="hidden" name="donationId" id="donationId" placeholder="donationId" value="<?php echo $donationData['donationId'] ?>">  
               </div>
              
               <div>
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
                <textarea cols="30" rows="10" name="description" id="description"  placeholder="Description">
                <?php echo $donationData['description'] ?>
                </textarea>
            </div>
               <div>
                <input type="submit" name="updateDonation" value="Update">
            </div>
           </form>
           <form action="" method="POST">
                    <div>
                        <input type="hidden" name="donationId" value="<?php echo $donationData['donationId'] ?>" value="Update">
                    </div>
                    <div>
                        <input type="submit" name="deleteDonation" style="background-color:red;" value="Delete">
                    </div>
                    </form>
            </div>
        </div>
    </div>
</body>
<script src="js/validation.js"></script>



</html>