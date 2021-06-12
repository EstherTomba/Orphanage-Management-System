
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
    <title>Help || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Help
                 
            </div>
            <div class="info">
                <?php 
                    include('../success.php');
                ?>
                <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th> Email</th>
                        <th>Date</th>
                    </tr>
                    <?php 
                        $helpQuery= "SELECT * FROM help GROUP BY userId ORDER BY  createdAt DESC";
                        $helpResult= mysqli_query($con, $helpQuery);
                        while($row = mysqli_fetch_assoc($helpResult)) {
                            $userId= $row['userId'];
                            $userQuery="SELECT * FROM user WHERE userId= '$userId'";
                            $userResult= mysqli_query($con,$userQuery );
                            if($userResult) {
                                $userData= $userResult->fetch_assoc();
                            }
                            ?>
                             <tr>
                                <td><a href="help-response.php?id=<?php echo $row['userId'] ?>"><?php echo $userData['firstName'] ?></a></td>
                                    
                                <td><?php echo $userData['lastName'] ?></td>
                                <td><?php echo $userData['userEmail'] ?></td>
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