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
    <title>Child Approval || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Child Approvals
                <!-- <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="child-approval-add.php" style="color: white;">Approval</a>  
                  </button>  -->
            </div>
            <div class="info">
                <?php
                    include('../error.php');
                    include('../success.php');
                ?> 
                <table>
                    <tr>
                        <th>Applicant First Name</th>
                        <th>Applicant Last Name</th>
                        <th>Applicant Last Email</th>
                        <th>Applicant Phone Number</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                    <?php 
                        $childApprovalQuery= "SELECT * FROM childapproval ORDER BY createdAt DESC";
                        $childApprovalResult = mysqli_query($con, $childApprovalQuery);
                        while($row = mysqli_fetch_assoc($childApprovalResult)) {
                            $childAdmissionId = $row['childAdmissionId'];
                            $admissionQuery= "SELECT * FROM childadmission WHERE childAdmissionId='$childAdmissionId'";
                            $admissionResult = mysqli_query($con, $admissionQuery);
                            if($admissionResult) {
                                $admissionData = $admissionResult->fetch_assoc();
                            }
                            ?>
                                <tr>
                                    <td><a href="child-approval-details.php?id=<?php echo $row['childApprovalId'] ?>"><?php echo $admissionData['applicantFirstName'] ?></a></td>
                                    <td><?php echo $admissionData['applicantLastName'] ?></td>
                                    <td><?php echo $admissionData['applicantEmail'] ?></td>
                                    <td><?php echo $admissionData['applicantPhoneNumber'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><?php echo date("M d Y", strtotime($row['createdAt'])) ?></td>
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