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
    <title>User || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">User
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
                    <a href="user-add.php" style="color: white;">Add User</a>  
                </button><br><br>
                <?php 
                    include('../success.php');
                ?>
                <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th> 
                        <th>Email</th> 
                         <th>User Role</th>
                         <th>Date</th> 
                        
                    </tr>
                    <?php
                        if($transferIsTrue) {
                            $transferIsTrue = true;
                            $searchIsTrue   = false;
                            $userQuery= "SELECT * FROM user ORDER BY  createdAt DESC";
                        } elseif($searchIsTrue) {
                            $userQuery= "SELECT * FROM user WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR userName LIKE '%$search%' OR userEmail LIKE '%$search%' OR phoneNumber LIKE '%$search%' OR userRole LIKE '%$search%' ORDER BY  createdAt DESC"; 
                        }  
                        $userResult = mysqli_query($con, $userQuery);
                        while($row = mysqli_fetch_assoc($userResult)) {
                            ?>
                            <tr>
                                    <td><a href="user-details.php?id=<?php echo $row['userId'] ?>"><?php echo $row['firstName'] ?></a></td>
                                    <td><?php echo $row['lastName'] ?></td>
                                    <td><?php echo $row['userEmail'] ?></td>
                                    <td><?php echo $row['userRole'] ?></td>
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