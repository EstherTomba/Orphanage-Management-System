
<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $logIsTrue = true;
    $searchIsTrue   = false;
    $search   = '';
    if(isset($_GET['q'])) {
        $logIsTrue = false;
        $searchIsTrue   = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Log
            <?php 
            include("profileLogout.php")
            ?>
               
            </div>
            <div class="info">
                <form method="GET" class="search"> 
                    <input type="text" placeholder="Search" name="q" value="<?php echo $search ?>">
                    <input type="submit">
                </form><br><br>
                <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
                <table>
                    <tr>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th> 
                        <th>User Type</th> 
                         <th>Action</th>
                         <th>Date</th> 
                         <th>Time</th> 
                        
                    </tr>
                    <?php 
                        if($logIsTrue) {
                            $logIsTrue = true;
                            $searchIsTrue   = false;
                            $logQuery= "SELECT a.logId, a.action, a.email, a.createdAt,
                            b.userEmail, b.firstName, b.lastName, b.userEmail, b.userRole 
                            FROM log AS a INNER JOIN user AS b ON a.userId  = b.userId ORDER BY createdAt DESC";
                        } elseif($searchIsTrue) {
                            $logQuery= "SELECT a.logId, a.action, a.email, a.createdAt,
                            b.userEmail, b.firstName, b.lastName, b.userEmail, b.userRole 
                            FROM log AS a INNER JOIN user AS b ON a.userId  = b.userId  
                            WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR userEmail LIKE '%$search%'  OR userRole LIKE '%$search%'"; 
                        }
                        $counsellorResult= mysqli_query($con, $logQuery);
                        while($row= mysqli_fetch_assoc($counsellorResult)) {
                            ?>
                                <tr>
                                    <td> <?php echo $row['userEmail'] ?></td>
                                    <td> <?php echo $row['firstName'] ?></td>
                                    <td> <?php echo $row['lastName'] ?></td>
                                    <td> <?php echo $row['userRole'] ?></td>
                                    <td> <?php echo $row['action'] ?></td>
                                    <td> <?php echo date('M D Y', strtotime($row['createdAt']))  ?></td>
                                    <td> <?php echo date('H:i:s', strtotime($row['createdAt']))  ?></td>
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