<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    // GET CHILD APPROVAL DETAILS
    $childApprovalId= $_GET['id'];
    $approvalQuery= "SELECT * FROM childapproval WHERE childApprovalId='$childApprovalId'";
    $approvalResult= mysqli_query($con, $approvalQuery);
    if($approvalResult) {
        $approvalData= $approvalResult->fetch_assoc();
    }
    // GET ADMISSION DETAILS
    $childAdmissionId = $approvalData['childAdmissionId'];
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
                <a href="child-approval.php">Child Approval </a>/Details
            </div>
            <div class="info">
                <form  name="childApprovalForm" method="POST" onsubmit="return childApprovalValidation()">
                    <?php
                        include('../error.php');
                    ?> 
                    <div>
                        <input type="text" name="applicantFirstName" value="<?php echo $admissionData['applicantFirstName'] ?>" placeholder="Applicant First Name">
                    </div>
                    
                    <div>
                        <input type="text" name="applicantLastName" value="<?php echo $admissionData['applicantLastName'] ?>" placeholder="Applicant Last Name">
                    </div>
                    <div>
                        <input type="text" name="applicantEmail" value="<?php echo $admissionData['applicantEmail'] ?>" placeholder="Applicant Email">
                    </div>
                    <div>
                        <input type="text" name="applicantPhoneNumber" value="<?php echo $admissionData['applicantPhoneNumber'] ?>" placeholder="Applicant Phone Number">
                    </div>
                    <div>
                        <input type="text" name="applicantAddress" value="<?php echo $admissionData['applicantAddress'] ?>" placeholder="Applicant Address">
                    </div>
                    <div>
                        <input type="text" name="applicantID" value="<?php echo $admissionData['applicantID'] ?>" placeholder="Applicant ID">
                    </div>
                    <div>
                        <input type="text" name="childFirstName" value="<?php echo $admissionData['childFirstName'] ?>" placeholder="Child First Name">
                    </div>
                    <div>
                        <input type="text" name="childLastName" value="<?php echo $admissionData['childLastName'] ?>" placeholder="Child Last Name">
                    </div>
                    <div>
                        <input type="date" name="childDOB" value="<?php echo $admissionData['childDOB'] ?>" placeholder="Child DOB">
                    </div>
                    <div>
                        <input type="text" name="childGender" value="<?php echo $admissionData['childGender'] ?>" placeholder="Child Gender">
                    </div>
                    <div>
                        <input type="text" name="childBloodGroup" value="<?php echo $admissionData['childBloodGroup'] ?>" placeholder="Child Blood Group">
                    </div>
                    <textarea cols="30" rows="10">
                        <?php echo $admissionData['description'] ?>
                    </textarea>

                    <div>
                        <select name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="Approved" <?php if ($approvalData['status'] == 'Approved') echo 'selected="selected"'; ?>>Approved</option>
                            <option value="Rejected" <?php if ($approvalData['status'] == 'Rejected') echo 'selected="selected"'; ?>>Rejected </option>
                            <option value="Pending" <?php if ($approvalData['status'] == 'Pending') echo 'selected="selected"'; ?>>Pending</option>
                          </select>
                    </div>

                    <div>ADMIN PART</div>
                    <div>
                        <input type="hidden" name="childAdmissionId" id="childAdmissionId" value="<?php echo $admissionData['childAdmissionId'] ?>">
                    </div>

                    <div>
                        <input type="hidden" name="applicantEmail" id="applicantEmail" value="<?php echo $admissionData['applicantEmail'] ?>">
                    </div>
                    <div>
                        <input type="hidden" name="childApprovalId" id="childApprovalId" value="<?php echo $approvalData['childApprovalId'] ?>">
                    </div>
                    
                    <div>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Description">
                            <?php echo $approvalData['description'] ?>
                        </textarea>
                    </div>

                    <div>
                        <input type="submit" value="Update" name="updateApproval">
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>