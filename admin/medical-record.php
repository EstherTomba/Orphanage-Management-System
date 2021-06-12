
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
    <title>Medical Records</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Medical Record 
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="medical-record-add.php" style="color: white;">Add Medical Record</a>  
                  </button> 
            </div>
            <div class="info">
            <?php 
                    include('../success.php');
                ?>
                <table>
                    <tr>
                        <th>User First Name</th>
                        <th> User Last Name</th>
                         <th>Date</th> 
                        
                    </tr>


                    <?php 
                        $medicalQuery= "SELECT user.firstName, user.lastName, medicalrecord.medicalRecordId
                        ,medicalrecord.createdAt 
                        FROM medicalrecord INNER JOIN user ON medicalrecord.userId=user.userId  ORDER BY  medicalrecord.createdAt DESC";
                        $medicalResult= mysqli_query($con, $medicalQuery);
                        while($row= mysqli_fetch_assoc($medicalResult)){
                            ?>
                                <tr>
                                    <td><a href="medical-record-details.php?id=<?php  echo $row['medicalRecordId']?>"><?php echo $row['firstName'] ?> </a></td>
                                    <td><?php  echo $row['lastName']?></td>
                                    <td><?php  echo date(' M D Y', strtotime($row['createdAt'])) ?></td> 
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