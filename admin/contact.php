
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
    <title>Contact || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Contact
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
                        <th>First Name</th>
                        <th>Last Name</th>
                         <th>Email</th>
                         <th>Phone Number</th>
                         <th>Date</th>
                    </tr>
                    <?php 
                        if($transferIsTrue) {
                            $transferIsTrue = true;
                            $searchIsTrue   = false;
                            $contactQuery= "SELECT * FROM contact ORDER BY  createdAt DESC";
                        } elseif($searchIsTrue) {
                            $contactQuery= "SELECT * FROM contact WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR email LIKE '%$search%' OR phoneNumber LIKE '%$search%' ORDER BY  createdAt DESC"; 
                        }
                        $contactResult= mysqli_query($con, $contactQuery);
                        while($row = mysqli_fetch_assoc($contactResult)) {
                            ?>
                                <tr>
                                    <td><a href="contact-response.php?id=<?php echo $row['contactId']?>"><?php echo $row['firstName']?></a></td> 
                                    <td><?php echo $row['lastName']?></td> 
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['phoneNumber']?></td>
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