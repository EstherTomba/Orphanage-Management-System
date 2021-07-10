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
    <title>Add Donation || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
                <a href="donation.php">Donation /</a> Add
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
                <input type="text" name="firstName" id="firstName" placeholder="First Name">
               </div>
               <div>
                <input type="text" name="lastName" id="lastName"  placeholder="Last Name">  
               </div>
               <div>
                <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">  
               </div>
               <div>
                <input type="text" name="email" id="email" placeholder="Email">  
               </div>
               <div>
                <input type="text" name="address" id="address"  placeholder="Address">  
               </div>
               <div>
                <input type="number" name="amount" id="amount" placeholder="Amount">  
               </div>
               <div>
                <input type="hidden" name="acc_ref" id="acc_ref" value="Test Account">  
               </div>
               <div>
                <input type="hidden" name="transaction_description" id="transaction_description" value="Payment Test">  
               </div>
              
               <div>
                   <select name="donationTypeId" id="donationTypeId">
                       <option value="">Select Donation Type</option>
                        <?php 
                            $donationTypeQuery = "SELECT * FROM donationtype ORDER BY createdAt DESC";
                            $donationTypeResult = mysqli_query($con, $donationTypeQuery);
                            while($row = mysqli_fetch_assoc($donationTypeResult)) {
                                ?>
                                    <option value="<?php echo $row['donationTypeId'] ?>"><?php echo $row['name'] ?></option>
                                <?php
                            }
                        ?>
                    </select>   
               </div>
               <div>
                <textarea name="" id="" cols="30" rows="10" name="description" id="description" placeholder="Description"></textarea>
            </div>
               <div>
                <input type="submit" name="addDonation" value="Save">
            </div>
           </form>
           <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>
<script src="js/validation.js"></script>



</html>