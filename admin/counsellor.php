
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
    <title>Counsellor || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Counsellor
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
                    <a href="counsellor-add.php" style="color: white;">Add Counsellor</a>  
                </button> <br><br>
                <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
                <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th> 
                        <th>Working Time</th> 
                         <th>Working Date</th>
                         <th>Date</th> 
                        
                    </tr>
                    <?php 
                        $counsellorQuery = "SELECT * FROM counsellor ORDER BY createdAt DESC";
                        $counsellorResult= mysqli_query($con, $counsellorQuery);
                        while($row= mysqli_fetch_assoc($counsellorResult)) {
                            $userId = $row['staffId'];
                            $userQuery = "SELECT * FROM user WHERE userId ='$userId'";
                            $userResult = mysqli_query($con, $userQuery);
                            if($userResult) {
                                $userData = $userResult->fetch_assoc();
                            }
                            ?>
                                <tr>
                                    <td> <a href="counsellor-details.php?id=<?php echo $row['counsellorId'] ?>"><?php echo $userData['firstName'] ?></a></td>
                                    <td> <?php echo $userData['lastName'] ?></td>
                                    <td> <?php echo $row['workingTime'] ?></td>
                                    <td> <?php echo $row['workingDate'] ?></td>
                                    <td> <?php echo date('M D Y', strtotime($row['createdAt']))  ?></td>
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