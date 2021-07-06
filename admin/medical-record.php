
<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $medicalIsTrue = true;
    $searchIsTrue   = false;
    $search   = '';
    if(isset($_GET['q'])) {
        $medicalIsTrue = false;
        $searchIsTrue   = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
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
                    <a href="medical-record-add.php" style="color: white;">Add Medical Record</a>  
                </button> <br><br>
           
            <?php 
                    include('../success.php');
                ?>
                <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date</th> 
                        
                    </tr>


                    <?php 
                        if($medicalIsTrue) {
                            $medicalIsTrue = true;
                            $searchIsTrue   = false;
                            $medicalQuery= "SELECT a.userId, a.medicalRecordId,
                            b.firstName, b.lastName, b.userEmail, b.phoneNumber, b.gender, a.createdAt
                            FROM medicalrecord AS a INNER JOIN user AS b ON a.userId = b.userId  ORDER BY createdAt DESC";
                        } elseif($searchIsTrue) {
                            $medicalQuery= "SELECT a.userId, a.medicalRecordId,
                            b.firstName, b.lastName, b.userEmail, b.phoneNumber, b.gender, a.createdAt
                            FROM medicalrecord AS a INNER JOIN user AS b ON a.userId = b.userId 
                            WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR userEmail LIKE '%$search%' OR phoneNumber LIKE '%$search%' OR gender LIKE '%$search%'"; 
                        }
                        $medicalResult= mysqli_query($con, $medicalQuery);
                        while($row= mysqli_fetch_assoc($medicalResult)){
                            ?>
                                <tr>
                                    <td><a href="medical-record-details.php?id=<?php  echo $row['medicalRecordId']?>"><?php echo $row['firstName'] ?> </a></td>
                                    <td><?php  echo $row['lastName']?></td>
                                    <td><?php  echo $row['userEmail']?></td>
                                    <td><?php  echo $row['phoneNumber']?></td>
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