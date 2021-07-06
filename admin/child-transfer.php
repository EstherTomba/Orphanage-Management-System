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
    <title>Child Transfer || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Child Transfer
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
                    <a href="child-transfer-add.php" style="color: white;">Transfer Orphan</a>  
                </button> <br><br>
                <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
                <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Orphanage Name</th>
                        <th>Orphanage Email</th>
                        <th>Orphanage Phone Number</th>
                        <th>Date</th>
                    </tr>


                    <?php  
                        if($transferIsTrue) {
                            $transferIsTrue = true;
                            $searchIsTrue   = false;
                            $childTransferQuery= "SELECT a.orphanId, a.orphanTransferId, a.orphanageName, a.orphanageEmail, a.orphanageWebsite,
                            a.orphanagePhoneNumber1, b.firstName, b.lastName, b.userEmail, b.phoneNumber, b.gender, a.createdAt
                            FROM orphantransfer AS a INNER JOIN user AS b ON a.orphanId = b.userId";
                        } elseif($searchIsTrue) {
                            $childTransferQuery= "SELECT a.orphanId, a.orphanTransferId, a.orphanageName, a.orphanageEmail, a.orphanageWebsite,
                            a.orphanagePhoneNumber1, b.firstName, b.lastName, b.userEmail, b.phoneNumber, b.gender, a.createdAt
                            FROM orphantransfer AS a INNER JOIN user AS b ON a.orphanId = b.userId 
                            WHERE orphanageName LIKE '%$search%' OR orphanageEmail LIKE '%$search%' OR orphanageWebsite LIKE '%$search%' OR firstName LIKE '%$search%' OR userEmail LIKE '%$search%' OR phoneNumber LIKE '%$search%'"; 
                        }
                        $childTransferResult = mysqli_query($con, $childTransferQuery);
                        while($row = mysqli_fetch_assoc($childTransferResult)) {
                            ?>
                                <tr>
                                    <td><a href="child-transfer-details.php?id=<?php echo $row['orphanTransferId'] ?>"><?php echo $row['firstName'] ?></a></td>
                                    <td><a href="child-transfer-details.php?id=<?php echo $row['orphanTransferId'] ?>"><?php echo $row['lastName'] ?></a></td>
                                    <td><?php echo $row['orphanageName'] ?></td>
                                    <td><?php echo $row['orphanageEmail'] ?></td>
                                    <td><?php echo $row['orphanagePhoneNumber1'] ?></td>
                                    <td><?php echo date('M d Y',strtotime($row['createdAt'])) ?></td>
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