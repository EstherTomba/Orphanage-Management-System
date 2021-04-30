<?php 
    require_once('config/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact || Coms</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="box-area">
    <?php include('header.php'); ?>
        <div class="banner">
            <h2>contact</h2>
        </div>
        <div class="content-area">
            <div class="wrapper">
               
                <form  name="contactForm" method="POST" onsubmit="return contactValidation()">
                <?php 
                include('success.php');
                include('error.php');
                ?>
                <div>
                    <input type="text" name="firstName" id="firstName"  placeholder="First Name">
                </div>
                <div>
                    <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email ">
                </div>
                <div>
                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">
                </div>
                <div>
                    <input type="text" name="subject" id="subject" placeholder="Subject">
                </div>
                <div>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                </div>
                <div>
                    <input type="submit" name="contact" value="Send">
                </div>
                </form>
                <div class="space"></div>
            </div>
            <?php include('footer.php') ?>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>
</html>