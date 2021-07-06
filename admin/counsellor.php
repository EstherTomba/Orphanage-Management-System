
<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $counsellorIsTrue = true;
    $searchIsTrue   = false;
    $search   = '';
    if(isset($_GET['q'])) {
        $counsellorIsTrue = false;
        $searchIsTrue   = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
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
                <form method="GET" class="search"> 
                    <input type="text" placeholder="Search" name="q" value="<?php echo $search ?>">
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
                        if($counsellorIsTrue) {
                            $counsellorIsTrue = true;
                            $searchIsTrue   = false;
                            $counsellorQuery= "SELECT a.counsellorId, a.staffId, a.workingTime, a.workingDate,
                            b.firstName, b.lastName, b.userEmail, b.phoneNumber, b.gender, a.createdAt
                            FROM counsellor AS a INNER JOIN user AS b ON a.staffId  = b.userId ORDER BY createdAt DESC";
                        } elseif($searchIsTrue) {
                            $counsellorQuery= "SELECT a.counsellorId, a.staffId, a.workingTime, a.workingDate,
                            b.firstName, b.lastName, b.userEmail, b.phoneNumber, b.gender, a.createdAt
                            FROM counsellor AS a INNER JOIN user AS b ON a.staffId  = b.userId  
                            WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR userEmail LIKE '%$search%' OR phoneNumber LIKE '%$search%' OR gender LIKE '%$search%'"; 
                        }
                        $counsellorResult= mysqli_query($con, $counsellorQuery);
                        while($row= mysqli_fetch_assoc($counsellorResult)) {
                            ?>
                                <tr>
                                    <td> <a href="counsellor-details.php?id=<?php echo $row['counsellorId'] ?>"><?php echo $row['firstName'] ?></a></td>
                                    <td> <?php echo $row['lastName'] ?></td>
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