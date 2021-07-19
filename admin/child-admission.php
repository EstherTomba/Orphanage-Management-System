<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $currentYear  = date("Y");
    $currentMonth = date("m");
    $currentDay   = date("d");
    $theYear  = date("Y");
    $theMonth = date("m");
    $theDay   = date("d");
    $search   = '';
    $yearIsTrue   = true;
    $monthIsTrue  = false;
    $dayIsTrue    = false;
    $searchIsTrue = false;
    if(isset($_POST['filterByYear'])) {
        $yearIsTrue   = true;
        $monthIsTrue  = false;
        $dayIsTrue    = false;
        $searchIsTrue = false;
        $yearInput = mysqli_real_escape_string($con, $_POST['yearInput']);
        $theYear = $yearInput;
    }
    if(isset($_POST['filterByMonth'])) {
        $yearIsTrue = false;
        $monthIsTrue = true;
        $dayIsTrue = false;
        $searchIsTrue = false;
        $monthInput = mysqli_real_escape_string($con, $_POST['monthInput']);
        if(date("Y", strtotime($monthInput)) > $currentYear) {
            array_push($errors, "Year should not be greater than the current year");
        } elseif(date("m", strtotime($monthInput)) > $currentMonth) {
            array_push($errors, "Month should not be greater than the current Month");
        }
        $theYear  = date("Y", strtotime($monthInput));
        $theMonth = date("m", strtotime($monthInput));
    }
    if(isset($_POST['filterByDay'])) {
        $yearIsTrue = false;
        $monthIsTrue = false;
        $dayIsTrue = true;
        $searchIsTrue = false;
        $dayInput = mysqli_real_escape_string($con, $_POST['dayInput']);
        if(date("Y", strtotime($dayInput)) > $currentYear) {
            array_push($errors, "Year should not be greater than the current year");
        } elseif(date("m", strtotime($dayInput)) > $currentMonth) {
            array_push($errors, "Month should not be greater than the current Month");
        } elseif(date("d", strtotime($dayInput)) > $currentDay) {
            array_push($errors, "Day should not be greater than the current Day");
        }
        $theYear = date("Y", strtotime($dayInput));
        $theMonth = date("m", strtotime($dayInput));
        $theDay = date("d", strtotime($dayInput));
    }

    if(isset($_GET['q'])) {
        $yearIsTrue = false;
        $monthIsTrue = false;
        $dayIsTrue = false;
        $searchIsTrue = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
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
            <div class="header" style="color: red; font-size: 20px;">
            Child Admission
            <?php 
                include("profileLogout.php")
            ?>
            </div>
            <div class="info">
                <form method="GET" class="search"> 
                    <input type="text" placeholder="Search" name="q" value="<?php echo $search ?>">
                    <input type="submit">
                </form>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <li onclick="showFilterByDay()"><a href="#" style="color: white;">Filter by Day</a></li>
                    <div id="filterByDayList">
                        <form method="POST"> 
                            <input type="date" name="dayInput">
                            <input type="submit" value="Filter" name="filterByDay">
                        </form>
                    </div>
                </button>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <li onclick="showFilterByMonth()"><a href="#" style="color: white;">Filter by Month</a></li>
                    <div id="filterByMonthtList">
                        <form method="POST"> 
                            <input type="month" name="monthInput">
                            <input type="submit" value="Filter" name="filterByMonth">
                        </form>
                    </div>
                </button>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <li onclick="showFilterByYear()"><a href="#" style="color: white;">Filter by Year</a></li>
                    <div id="filterByYeartList">
                        <form method="POST"> 
                        <input type="number" placeholder="Enter Year" max="2021" min="2019" name="yearInput">
                            <input type="submit" value="Filter" name="filterByYear">
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
                        <th>Applicant Email</th>
                        <th>Applicant Phone Number</th>
                        <th>Child First Name</th>
                        <th>Child Last Name</th>
                        <th>Date Submitted</th>
                    </tr>

                    <?php  
                    
                        if($yearIsTrue) {
                            $admissionQuery= "SELECT * FROM childadmission WHERE YEAR(createdAt) = '$theYear' ORDER BY  createdAt DESC";
                        } elseif($monthIsTrue) {
                            $admissionQuery= "SELECT * FROM childadmission WHERE YEAR(createdAt) = '$theYear' AND MONTH(createdAt) = '$theMonth' ORDER BY  createdAt DESC";
                        } elseif($dayIsTrue) {
                            $admissionQuery= "SELECT * FROM childadmission WHERE YEAR(createdAt) = '$theYear' AND MONTH(createdAt) = '$theMonth' AND DAY(createdAt) = '$theDay' ORDER BY  createdAt DESC"; 
                        } elseif($searchIsTrue) {
                            $admissionQuery= "SELECT * FROM childadmission WHERE applicantFirstName LIKE '%$search%' OR applicantLastName LIKE '%$search%' OR applicantEmail LIKE '%$search%' OR applicantID LIKE '%$search%' OR applicantPhoneNumber LIKE '%$search%' OR childFirstName LIKE '%$search%' OR childLastName LIKE '%$search%' ORDER BY  createdAt DESC"; 
                        }
                        $admissionResult = mysqli_query($con, $admissionQuery);
                        while($row = mysqli_fetch_assoc($admissionResult)) {
                            ?>
                                <tr>
                                    <td><a href="child-approval-add.php?id=<?php echo $row['childAdmissionId'] ?>"><?php echo $row['applicantFirstName'] ?></a></td>
                                    <td><?php echo $row['applicantLastName'] ?></td>
                                    <td><?php echo $row['applicantEmail'] ?></td>
                                    <td><?php echo $row['applicantPhoneNumber'] ?></td>
                                    <td><?php echo $row['childFirstName'] ?></td>
                                    <td><?php echo $row['childLastName'] ?></td>
                                    <td><?php echo date('M d Y',strtotime($row['createdAt'])) ?></td>
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