<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    // GET ADMISSION DETAILS
    $childAdmissionId = $_GET['id'];
    $admissionQuery  = "SELECT * FROM childadmission WHERE childAdmissionId='$childAdmissionId'";
    $admissionResult = mysqli_query($con, $admissionQuery);
    if($admissionResult) {
        $admissionData = $admissionResult->fetch_assoc();
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Child Approval || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
        <div class="header" style="color: red; font-size: 20px;">
                <a href="child-admission.php">Child Approval </a>/Details
                <?php 
                    include("profileLogout.php")
                ?>
            </div> 
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form  name="childApprovalForm" method="POST" onsubmit="return childApprovalValidation()">
                    <?php
                        include('../error.php');
                    ?> 
                    <div>
                        <label for="applicantFirstName" style="float: left;">Applicant First Name</label>
                        <input type="text" name="applicantFirstName" value="<?php echo $admissionData['applicantFirstName'] ?>">
                    </div>
                    
                    <div>
                        <label for="applicantLastName" style="float: left;">Applicant Last Name</label>
                        <input type="text" name="applicantLastName" value="<?php echo $admissionData['applicantLastName'] ?>">
                    </div>
                    <div>
                        <label for="applicantEmail" style="float: left;">Applicant Email</label>
                        <input type="text" name="applicantEmail" value="<?php echo $admissionData['applicantEmail'] ?>">
                    </div>
                    <div>
                        <label for="applicantPhoneNumber" style="float: left;">Applicant Phone Number</label>
                        <input type="text" name="applicantPhoneNumber" value="<?php echo $admissionData['applicantPhoneNumber'] ?>">
                    </div>
                    <div>
                    <label for="applicantAddress" style="float: left;">Applicant Address</label>
                        <input type="text" name="applicantAddress" value="<?php echo $admissionData['applicantAddress'] ?>">
                    </div>
                    <div>
                    <label for="applicantID" style="float: left;">Applicant ID</label>
                        <input type="text" name="applicantID" value="<?php echo $admissionData['applicantID'] ?>">
                    </div>
                    <div>
                        <label for="oldPassword" style="float: left;">Child First Name</label>
                        <input type="text" name="childFirstName" value="<?php echo $admissionData['childFirstName'] ?>">
                    </div>
                    <div>
                    <label for="childLastName" style="float: left;">Child Last Name</label>
                        <input type="text" name="childLastName" value="<?php echo $admissionData['childLastName'] ?>">
                    </div>
                    <div>
                    <label for="childDOB" style="float: left;">Child DOB</label>
                        <input type="date" name="childDOB" value="<?php echo $admissionData['childDOB'] ?>">
                    </div>
                    <div>
                    <label for="" style="float: left;">Child Gende</label>
                        <input type="text" value="<?php echo $admissionData['childGender'] ?>">
                    </div>
                    <div>
                        <label for="" style="float: left;">Child Blood Group</label>
                        <input type="text" value="<?php echo $admissionData['childBloodGroup'] ?>">
                    </div>
                    <textarea cols="30" rows="10">
                    <label for="" style="float: left;">description</label>
                        <?php echo $admissionData['description'] ?>
                    </textarea>

                    <div>ADMIN PART</div>
                    <div>
                        <input type="hidden" name="childAdmissionId" id="childAdmissionId" value="<?php echo $admissionData['childAdmissionId'] ?>">
                    </div>

                    <div>
                        <input type="hidden" name="applicantEmail" id="applicantEmail" value="<?php echo $admissionData['applicantEmail'] ?>">
                    </div>
                    
                    <div>
                        <label for="description" style="float: left;">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>

                    <div>
                        <input type="submit" value="Approved" name="addApproval" style="width: 33.1%">
                        <input type="submit" value="Rejected" name="addRejection" style="width: 33.1%; background-color:red">
                        <input type="submit" value="Pending" name="addPending"  style="width: 33.1%; background-color:orange">
                    </div>
                </form>

                <form action="" method="POST">
                    <div>
                        <input type="hidden" name="childAdmissionId" value="<?php echo $admissionData['childAdmissionId'] ?>" value="Update">
                    </div>
                    <div>
                        <input type="submit" name="deleteChildAdmission" style="background-color:red;" value="Delete">
                    </div>
               </form>
               <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>