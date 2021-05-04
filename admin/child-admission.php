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
    <title>Child Admission || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Child Admission
                <!-- <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="child-approval-add.php" style="color: white;">Approved</a>  
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
                        <th>Applicant Email</th>
                        <th>Applicant Phone Number</th>
                        <th>Date</th>
                    </tr>

                    <?php  
                        $admissionQuery= "SELECT * FROM childadmission ORDER BY  createdAt DESC";
                        $admissionResult = mysqli_query($con, $admissionQuery);
                        while($row = mysqli_fetch_assoc($admissionResult)) {
                            ?>
                                <tr>
                                    <td><a href="child-approval-add.php?id=<?php echo $row['childAdmissionId'] ?>"><?php echo $row['applicantFirstName'] ?></a></td>
                                    <td><?php echo $row['applicantLastName'] ?></td>
                                    <td><?php echo $row['applicantEmail'] ?></td>
                                    <td><?php echo $row['applicantPhoneNumber'] ?></td>
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