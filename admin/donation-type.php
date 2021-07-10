<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $transferIsTrue = true;
    $searchIsTrue   = false;
    $search   = '';
    if(isset($_GET['q'])) {
        $transferIsTrue = false;
        $searchIsTrue   = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
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
                    <a href="donation-type-add.php" style="color: white;">Add Donation Type</a>  
                    <?php 
                        include("profileLogout.php")
                    ?>
                </button> <br><br>
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
                        if($transferIsTrue) {
                            $transferIsTrue = true;
                            $searchIsTrue   = false;
                            $donationTypeQuery = "SELECT * FROM donationtype ORDER BY createdAt DESC";
                        } elseif($searchIsTrue) {
                            $donationTypeQuery= "SELECT * FROM donationtype WHERE name LIKE '%$search%' ORDER BY createdAt DESC"; 
                        }
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
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

</html>