<?php 
    require_once('config/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation || Coms</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="box-area">
    <?php include('header.php'); ?>
        <div class="banner">
            <h2>Donation</h2>
        </div>
        <div class="content-area">
            <div class="wrapper">
               
                <form  name="donationtForm" method="POST" onsubmit="return donationValidation()">
                <?php 
                    include('success.php');
                    include('error.php');
                ?>
                <div>
                    <input type="text" name="firstName" id="firstName"  placeholder="First Name">
                </div>
                <div>
                    <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email ">
                </div>
                <div>
                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">
                </div>
                <div>
                    <input type="text" name="address" id="address" placeholder="Address">
                </div>
                <div>
                    <select id="donationTypeId" name="donationTypeId">
                        <option>Select Donation Type</option>
                        <?php
                            $donationTypeQuery="SELECT * FROM donationtype LIMIT 1";
                            $donationTypeResult = mysqli_query($con,$donationTypeQuery);
                            while($row = mysqli_fetch_assoc($donationTypeResult)) {
                                ?>
                                    <option value="<?php echo $row['donationTypeId'] ?>"><?php echo $row['name'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <input type="number" name="amount" id="amount" placeholder="Amount">
                </div>
                <div>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                </div>
                <div style="width: 100%;">
                    <input type="hidden" value="Coms" name="acc_ref"  id="acc_ref" >
                </div>

                <div style="width: 100%;">
                    <input type="hidden" value="Payment Test" name="transaction_description"  id="transaction_description" >
                </div>
                <div>
                    <input type="submit" name="addDonation" value="Donate">
                </div>
                </form>
                <div class="space"></div>
            </div>
            <?php include('footer.php') ?>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>
</html>