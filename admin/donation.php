<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $donationIsTrue = true;
    $searchIsTrue   = false;
    $search   = '';
    if(isset($_GET['q'])) {
        $donationIsTrue = false;
        $searchIsTrue   = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
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
                <form method="GET" class="search"> 
                    <input type="text" placeholder="Search" name="q" value="<?php echo $search ?>">
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
                        sif($donationIsTrue) {
                            $donationIsTrue = true;
                            $searchIsTrue   = false;
                            $donationQuery= "SELECT a.donationId, a.donationTypeId, a.firstName, a.lastName, a.email,
                            a.phoneNumber, b.name, a.createdAt
                            FROM donation AS a INNER JOIN donationtype AS b ON a.donationTypeId = b.donationTypeId ORDER BY createdAt DESC";
                        } elseif($searchIsTrue) {
                            $donationQuery= "SELECT a.donationId, a.donationTypeId, a.firstName, a.lastName, a.email,
                            a.phoneNumber, b.name, a.createdAt
                            FROM donation AS a INNER JOIN donationtype AS b ON a.donationTypeId = b.donationTypeId  
                            WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR email LIKE '%$search%' OR phoneNumber LIKE '%$search%' OR name LIKE '%$search%'"; 
                        }
                        $donationResult= mysqli_query($con, $donationQuery);
                        while($row= mysqli_fetch_assoc($donationResult)) {
                            ?>
                                <tr>
                                    <td><a href="donation-details.php?id=<?php echo $row['donationId'] ?>"><?php  echo $row['name']?></a></td>
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