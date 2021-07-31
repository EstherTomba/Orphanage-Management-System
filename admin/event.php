
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
    <title>Event || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Event
            <?php 
            include("profileLogout.php")
            ?>
            </div>
            <div class="info">
                <form method="GET" class="search"> 
                    <input type="text" placeholder="Search" name="q" value="<?php echo $search ?>">
                    <input type="submit">
                </form>
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px; margin-left: 25px;" >
                    <a href="event-add.php" style="color: white;">Add Event</a>  
                </button>
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
                </button><br><br><br><br><br>
                <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
                <?php 
                    if($yearIsTrue) {
                        $eventQuery= "SELECT * FROM event WHERE YEAR(createdAt) = '$theYear' ORDER BY  createdAt DESC";
                    } elseif($monthIsTrue) {
                        $eventQuery= "SELECT * FROM event WHERE YEAR(createdAt) = '$theYear' AND MONTH(createdAt) = '$theMonth' ORDER BY  createdAt DESC";
                    } elseif($dayIsTrue) {
                        $eventQuery= "SELECT * FROM event WHERE YEAR(createdAt) = '$theYear' AND MONTH(createdAt) = '$theMonth' AND DAY(createdAt) = '$theDay' ORDER BY  createdAt DESC"; 
                    } elseif($searchIsTrue) {
                        $eventQuery= "SELECT * FROM event WHERE name LIKE '%$search%' OR date LIKE '%$search%' OR time LIKE '%$search%' ORDER BY  createdAt DESC"; 
                    }
                    $eventResult= mysqli_query($con, $eventQuery);
                    while($row = mysqli_fetch_assoc($eventResult)) {
                    ?>
                            <div style="width:100%; height: 200px; background-color: white;">
                                <div style="width:400px; height:200px;">
                                    <a href="event-details.php?id=<?php echo $row['eventId'] ?>">
                                        <img src="../uploads/<?php echo $row['image'] ?>" width="100%" height="200px" alt="">
                                    </a>
                                </div>
                                <div style="position: absolute;margin-top:-190px;margin-left:410px; margin-right: 25px">
                                    <a href="event-details.php?id=<?php echo $row['eventId'] ?>">
                                        <h1 style="color:#4b4276;"><?php echo $row['name']?></h1>
                                    </a> 
                                    <div>Event Date: 
                                        <span style="font-size: 15px; background-color: green; color:white; margin-top: 10px; padding:2px;">
                                            <?php echo date('M d Y H:i',strtotime($row['eventDate'])) ?>
                                        </span>
                                    </div>
                                    <div style="font-size: 12px;">Published: <?php echo date('M d Y',strtotime($row['createdAt'])) ?></div> 
                                    <div>Address: <?php echo $row['address']?></div> 
                                    <p style="margin-top: 20px;">
                                    <?php echo substr($row['description'], 0, 250) ?>
                                </div>
                            </div>
                            <hr style="margin-bottom: 10px;">
                        <?php
                    }
                ?>

               
              
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

</html>