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
    
                    <input type="text" name="applicantFirstName" id="applicantName" placeholder="Applicant First Name">
                </div> 
                <div>
                    <input type="text" name="applicantLastName" id="applicantLastName" placeholder="Applicant Last Name">
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Applicant Email ">
                </div>
                <div>
                    <input type="text" name="applicantPhoneNumber" id="applicantPhoneNumber" placeholder=" Applicant Phone Number">
                </div>
                <div>
                    <input type="text" name="applicantAddress" id="applicantAddress" placeholder="Applicant Address">
                </div>
                <div>
                    <input type="text" name="applicantID" id="applicantID" placeholder="ID or Passport Number">
                </div>
                <div>
                    <input type="text" name="childFirstName" id="childFirstName" placeholder="Child First Name">
                </div>
                <div>
                    <input type="text" name="childLastName" id="childLastName" placeholder="Child Last Name">
                </div>
                <div>
                    <label for="dob" style="float: left;">Date of Birth</label>
                    <input type="date" name="dob" id="dob" placeholder="">
                </div>
                <div>
                    <select name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <input type="text" name="bloodGroup" id="bloodGroup" placeholder="Blood Group">
                </div>
                <div>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
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