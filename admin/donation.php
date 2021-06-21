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
    <title>Donation || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Donation
            <?php 
            include("profileLogout.php")
            ?> 
            </div>
            <div class="info">
                <form action="" class="search"> 
                    <input type="text" placeholder="Search">
                    <input type="submit">
                </form>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="donation-add.php" style="color: white;">Add Donation </a>  
                </button> <br><br>
            <?php
                include('../error.php');
                include('../success.php');
             ?>     
           
                <table>
                    <tr>
                        <th>Donation Type</th> 
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date</th> 
                        
                    </tr>
                    <?php 
                        $donationQuery="SELECT * FROM donation ORDER BY createdAt DESC";
                        $donationResult= mysqli_query($con, $donationQuery);
                        while($row= mysqli_fetch_assoc($donationResult)) {
                            $donationTypeId = $row['donationTypeId'];
                            $donationTypeQuery = "SELECT * FROM donationtype WHERE donationTypeId ='$donationTypeId'";
                            $donationTypeResult = mysqli_query($con, $donationTypeQuery);
                            if($donationTypeResult) {
                                $donationTypeData = $donationTypeResult->fetch_assoc();
                            }
                            ?>
                                <tr>
                                    <td><a href="donation-details.php?id=<?php echo $row['donationId'] ?>"><?php  echo $donationTypeData['name']?></a></td>
                                    <td><?php  echo $row['firstName']?></td>
                                    <td><?php  echo $row['lastName']?></td>
                                    <td><?php  echo $row['email']?></td>
                                    <td><?php  echo $row['phoneNumber']?></td>
                                    <td><?php echo date('M D Y', strtotime($row['createdAt'])) ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>
</html>