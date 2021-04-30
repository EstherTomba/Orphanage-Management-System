
<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $contactId= $_GET['id'];
    $contactQuery= "SELECT * FROM contact WHERE contactId='$contactId'";
    $contactResult= mysqli_query($con, $contactQuery);
    if($contactResult) {
        $contactData= $contactResult->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Response || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
        <div class="header" style="color: red; font-size: 20px;">
                <a href="contact.php">Contact </a>/Response
            </div>
            <div class="info">
                <?php 
                    include('../error.php');
                ?>
                <div style="background-color: #dcdcdc; padding: 10px; margin: 10px 200px 10px 0px;">
                    <div>First Name: <?php echo $contactData['firstName'] ?></div>
                    <div>Last Name: <?php echo $contactData['lastName'] ?></div>
                    <div>Email Name: <?php echo $contactData['email'] ?></div>
                    <div>Phone Number: <?php echo $contactData['phoneNumber'] ?></div>
                    <div>Subject: <?php echo $contactData['subject'] ?></div>
                    <div>Date: <?php echo date('M d Y',strtotime($contactData['createdAt'])) ?></div>
                    <p>
                        <?php echo $contactData['message'] ?>
                    </p>
                </div>

                <?php
                    $query =  "SELECT * FROM contactresponse WHERE contactId='$contactId'";
                    $result= mysqli_query($con, $query);
                    while($row = $result->fetch_assoc()) {
                        $userId = $row['staffId'];
                        $query2 =  "SELECT * FROM user WHERE userId='$userId'";
                        $result2= mysqli_query($con, $query2);
                        if(mysqli_num_rows($result2)) {
                            $userData = $result2->fetch_assoc();
                        }
                        ?>
                            <div style="background-color:blueviolet; color: white; padding: 10px; margin: 10px 0px 10px 200px;">
                                <h4>Admin: <?php echo $userData['firstName'] ?> <?php echo $userData['lastName'] ?></h4>
                                <div>Date: <?php echo date('M d Y',strtotime($userData['createdAt'])) ?></div>
                                <p>
                                    <?php echo $row['message'] ?>
                                </p>
                            </div>
                        <?php
                    }
                ?>


                <br><br><br><br><br><br><br><br><br>
                <form name="contactResponseForm" method="POST" style="position: fixed; bottom: 0px; width: 83%;" onsubmit="return contactResponseValidation()">
                    <div>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                        <input type="hidden" name="contactId" id="contactId" value="<?php echo $contactData['contactId'] ?>">
                        <input type="hidden" name="email" id="email" value="<?php echo $contactData['email'] ?>">
                    </div>
                    
                    <div>
                        <input type="submit" value="Respond" name="contactResponse">
                    </div> 
                </form>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>