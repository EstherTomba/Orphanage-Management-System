
<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $helpIsTrue = true;
    $searchIsTrue   = false;
    $search   = '';
    if(isset($_GET['q'])) {
        $helpIsTrue = false;
        $searchIsTrue   = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
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
                        if($helpIsTrue) {
                            $helpIsTrue = true;
                            $searchIsTrue   = false;
                            $helpQuery= "SELECT a.userId, a.userId,
                            b.firstName, b.lastName, b.userEmail, b.phoneNumber, a.createdAt
                            FROM help AS a INNER JOIN user AS b ON a.userId = b.userId GROUP BY userId ORDER BY  createdAt DESC"; 
                        } elseif($searchIsTrue) {
                            $helpQuery= "SELECT a.userId, a.userId,
                            b.firstName, b.lastName, b.userEmail, b.phoneNumber, a.createdAt
                            FROM help AS a INNER JOIN user AS b ON a.userId = b.userId 
                            WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR userEmail LIKE '%$search%' OR phoneNumber LIKE '%$search%'  GROUP BY userId ORDER BY  createdAt DESC"; 
                        }
                        $helpResult= mysqli_query($con, $helpQuery);
                        while($row = mysqli_fetch_assoc($helpResult)) {
                            ?>
                             <tr>
                                <td><a href="help-response.php?id=<?php echo $row['userId'] ?>"><?php echo $row['firstName'] ?></a></td>
                                    
                                <td><?php echo $row['lastName'] ?></td>
                                <td><?php echo $row['userEmail'] ?></td>
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