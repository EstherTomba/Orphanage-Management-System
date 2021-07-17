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
                    <label for="firstName" style="float: left; margin-top: 20px;">First Name</label>
                    <input type="text" name="firstName" id="firstName">
                </div>
                <div>
                    <label for="lastName" style="float: left;">Last Name</label>
                    <input type="text" name="lastName" id="lastName">
                </div>
                <div>
                    <label for="email" style="float: left;">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="phoneNumber" style="float: left;">Phone Number</label>
                    <input type="text" name="phoneNumber" id="phoneNumber">
                </div>
                <div>
                    <label for="subject" style="float: left;">Subject</label>
                    <input type="text" name="subject" id="subject">
                </div>
                <div>
                    <label for="message" style="float: left;">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
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