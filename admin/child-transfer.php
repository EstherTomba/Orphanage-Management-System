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
    <title>Child Transfer || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Child Transfer
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="child-transfer-add.php" style="color: white;">Transfer</a>  
                  </button> 
            </div>
            <div class="info">
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
                        $childTransferQuery="SELECT user.firstName, user.lastName, orphantransfer.orphanageName,
                        orphantransfer.orphanageEmail, orphantransfer.orphanagePhoneNumber1,orphantransfer.createdAt 
                        FROM orphantransfer INNER JOIN user ON orphantransfer.orphanId=user.userId  ORDER BY  orphantransfer.createdAt DESC";
                        $childTransferResult = mysqli_query($con, $childTransferQuery);
                        while($row = mysqli_fetch_assoc($childTransferResult)) {
                            ?>
                                <tr>
                                    <td><a href="child-approval.php"><?php echo $row['firstName'] ?></a></td>
                                    <td><?php echo $row['lastName'] ?></td>
                                    <td><?php echo $row['orphanageName'] ?></td>
                                    <td><?php echo $row['orphanageEmail'] ?></td>
                                    <td><?php echo $row['orphanagePhoneNumber1'] ?></td>
                                    <td><?php echo date('M d Y',strtotime($row['createdAt'])) ?></td>
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