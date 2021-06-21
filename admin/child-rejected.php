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
    <title>Child Approved || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Child Rejected
            <?php 
            include("profileLogout.php")
            ?>
            </div>
            <div class="info">
            <form action="" class="search"> 
                    <input type="text" placeholder="Search">
                    <input type="submit">
                </form>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <li onclick="showFilterByDay()"><a href="#" style="color: white;">Filter by Day</a></li>
                    <div id="filterByDayList">
                        <form action=""> 
                            <input type="date">
                            <input type="submit" value="Filter">
                        </form>
                    </div>
                </button>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <li onclick="showFilterByMonth()"><a href="#" style="color: white;">Filter by Month</a></li>
                    <div id="filterByMonthtList">
                        <form action=""> 
                            <input type="month">
                            <input type="submit" value="Filter">
                        </form>
                    </div>
                </button>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <li onclick="showFilterByYear()"><a href="#" style="color: white;">Filter by Year</a></li>
                    <div id="filterByYeartList">
                        <form action=""> 
                        <input type="number" placeholder="Enter Year" max="2021" min="2019">
                            <input type="submit" value="Filter">
                        </form>
                    </div>
                </button>
                <br><br>
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
                        <th> Child First Name</th>
                        <th> Child Last Name</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                    <?php 
                        $childApprovalQuery= "SELECT * FROM childapproval WHERE status='Rejected' ORDER BY createdAt DESC";
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
                                    <td><a href="child-rejected-details.php?id=<?php echo $row['childApprovalId'] ?>"><?php echo $admissionData['applicantFirstName'] ?></a></td>
                                    <td><?php echo $admissionData['applicantLastName'] ?></td>
                                    <td><?php echo $admissionData['applicantEmail'] ?></td>
                                    <td><?php echo $admissionData['applicantPhoneNumber'] ?></td>
                                    <td><?php echo $admissionData['childFirstName'] ?></td>
                                    <td><?php echo $admissionData['childLastName'] ?></td>
                                    <td style="background-color:red; color: white"><?php echo $row['status'] ?></td>
                                    <td><?php echo date("M d Y", strtotime($row['createdAt'])) ?></td>
                                </tr> 
                            <?php
                        }
                    ?>
                   
                </table>
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

<script src="js/header.js"></script>
</html>

