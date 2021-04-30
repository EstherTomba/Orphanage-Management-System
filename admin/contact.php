
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
    <title>Contact || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Contact</div>
            <div class="info">
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
                        $contactQuery= "SELECT * FROM contact ORDER BY  createdAt DESC";
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

            </div>
        </div>
    </div>
</body>

</html>