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
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="child-approval-add.php" style="color: white;">Approval</a>  
                  </button> 
            </div>
            <div class="info">
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
                        $childApprovalQuery="SELECT childadmission.applicantFirstName, childadmission.applicantLastName, childadmission.applicantEmail,
                        childadmission.applicantPhoneNumber, childapproval.childAdmissionId, childapproval.status,childapproval.createdAt 
                        FROM childapproval INNER JOIN childadmission ON childapproval.childAdmissionId=childadmission.childAdmissionId  ORDER BY  childapproval.createdAt DESC";
                        $childApprovalResult = mysqli_query($con, $childApprovalQuery);
                        while($row = mysqli_fetch_assoc($childApprovalResult)) {
                            ?>
                                <tr>
                                    <td><a href="child-approval-add.php"><?php echo $row['applicantFirstName'] ?></a></td>
                                    <td><?php echo $row['applicantLastName'] ?></td>
                                    <td><?php echo $row['applicantEmail'] ?></td>
                                    <td><?php echo $row['applicantPhoneNumber'] ?></td>
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