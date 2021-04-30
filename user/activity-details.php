
<?php 
    require_once('../config/db.php'); 
    // require_once('../config/user.php');    
    // if (!isset($_SESSION['isStaff'])) {
    //     header('location: ../login.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Activity Details || Coms</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
            <a href="activity.php">Activity /</a>Details
            </div>
            <div class="info">
            <?php
                // GET ACTIVITY DATA
                $activityId = $_GET['id'];
                $activityQuery = "SELECT * FROM activity WHERE activityId='$activityId'";
                $activityResult = mysqli_query($con, $activityQuery);
                if($activityResult) {
                    $activityData = $activityResult->fetch_assoc();
                }

                // GET ACTIVITY CATEGORY DATA
                $activityCategoryId = $activityData['activityCategoryId'];
                $activityCategoryQuery = "SELECT * FROM activitycategory WHERE activityCategoryId='$activityCategoryId'";
                $activityCategoryResult = mysqli_query($con, $activityCategoryQuery);
                if($activityCategoryResult) {
                    $activityCategoryData = $activityCategoryResult->fetch_assoc();
                }
            ?>
                <div>
                    <div>
                        <img src="../uploads/<?php echo $activityCategoryData['image'] ?>" width="100%" height="400px" alt="">
                    </div>
                    <div>
                        <h1><?php echo $activityData['name'] ?></h1>
                        <div style="font-size: 13px;">Date: <?php echo date('M D Y', strtotime($activityData['createdAt']))  ?></div>
                        <div>Category: Football</div>
                        <a href="../uploads/<?php echo $activityData['file'] ?>">
                            <div style="background-color:#dcdcdc; padding: 15px; color:#4b4276; text-align: center; font-size: 22px;">
                                Open File 
                            </div>
                        </a>
                        <p>
                            <?php echo $activityData['description'] ?>
                        </p>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>