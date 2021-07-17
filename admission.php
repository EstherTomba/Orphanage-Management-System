<?php 
    require_once('config/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission || Coms</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="box-area">
    <?php include('header.php'); ?>
        <div class="banner">
            <h2>Admission </h2>
        </div>
        <div class="content-area">
            <div class="wrapper">
               
               <?php include("error.php") ?>
               <?php include("success.php") ?>
    
                <h2></h2>
                <form  name="admissionForm" method="POST" onsubmit="return admissionValidation()">
                <div>
                    <label for="applicantFirstName" style="float: left;">Applicant First Name</label>
                    <input type="text" name="applicantFirstName" id="applicantName">
                </div> 
                <div>
                    <label for="applicantLastName" style="float: left;">Applicant Last Name</label>
                    <input type="text" name="applicantLastName" id="applicantLastName">
                </div>
                <div>
                    <label for="email" style="float: left;">Applicant Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div>
                    <label for="applicantPhoneNumber" style="float: left;">Applicant Phone Number</label>
                    <input type="text" name="applicantPhoneNumber" id="applicantPhoneNumber">
                </div>
                <div>
                    <label for="applicantAddress" style="float: left;">Applicant Address</label>
                    <input type="text" name="applicantAddress" id="applicantAddress">
                </div>
                <div>
                    <label for="applicantID" style="float: left;">ID or Passport Number</label>
                    <input type="text" name="applicantID" id="applicantID">
                </div>
                <div>
                    <label for="childFirstName" style="float: left;">Child First Name</label>
                    <input type="text" name="childFirstName" id="childFirstName">
                </div>
                <div>
                    <label for="childLastName" style="float: left;">Child Last Name</label>
                    <input type="text" name="childLastName" id="childLastName">
                </div>
                <div>
                    <label for="dob" style="float: left;">Date of Birth</label>
                    <input type="date" name="dob" id="dob">
                </div>
                <div>
                    <label for="childLastName" style="float: left;">Gender</label>
                    <select name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <label for="bloodGroup" style="float: left;">Blood Group</label>
                    <input type="text" name="bloodGroup" id="bloodGroup">
                </div>
                <div>
                    <label for="message" style="float: left;">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10"Blood Group"></textarea>
                </div>

                <div>
                    <input type="submit" name="admission" value="Send">
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