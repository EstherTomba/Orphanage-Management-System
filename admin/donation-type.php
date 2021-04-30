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
    <title>Donation Type || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Donation Type
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="donation-type-add.php" style="color: white;">Add Donation Type</a>  
                  </button> 
            </div>
            <div class="info">
            <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
                <table>
                    <tr>
                        <th>Name</th> 
                         <th>Date</th>     
                    </tr>
                    <?php 
                        $donationTypeQuery = "SELECT * FROM donationtype ORDER BY createdAt DESC";
                        $donationTypeResult = mysqli_query($con, $donationTypeQuery);
                        while($row = mysqli_fetch_assoc($donationTypeResult)) {
                            ?>
                                <tr>
                                    <td><a href="donation-type-details.php?id=<?php  echo $row['donationTypeId'];?>"><?php  echo $row['name'];?></a></td>
                                    <td><?php echo date('M D Y', strtotime($row['createdAt'])) ?></td>
                                </tr>
                            <?php 
                        }
                    ?>       
                </table>

            </div>
        </div>
    </div>
</body>

</html>