
<?php 
    require_once('../config/db.php'); 
    require_once('../config/user.php');    
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
                    include('../error.php');
                    include('../success.php');
                ?>
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
                </div><br>
                
                <?php
                    // GET ACTIVITY COMMENTS DATA
                    $activityCommentQuery = "SELECT * FROM activitycomment WHERE activityId='$activityId'";
                    $activityCommentResult = mysqli_query($con, $activityCommentQuery);
                    while ($comments = mysqli_fetch_assoc($activityCommentResult)) {
                        // GET USER DETAILS
                        $getUserId = $comments['userId'];
                        $getUserQuery = "SELECT * FROM user WHERE userId='$getUserId'";
                        $getUserResult = mysqli_query($con, $getUserQuery);
                        if($getUserResult){
                            $userData = $getUserResult->fetch_assoc();
                        }
                        ?>
                            <div style="border: 1px solid #4b4276; padding:10px; border-radius: 15px; background-color: white; margin-bottom: 10px">
                                <div style="font-size: 20px; color: #4b4276"> <?php echo $userData['firstName']; ?> <?php echo $userData['lastName']; ?></div>
                                <div>
                                    <?php echo $comments['description']; ?>
                                </div>
                            </div>
                        <?php
                    }
                ?>
                
                <br><br>
                <form name="contactAdminForm" method="POST" onsubmit="return contactAdminValidation()">
                    <div>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    <div>
                        <input type="hidden" id="activityId" name="activityId" value="<?php echo $activityId ?>">
                    </div>
                    
                     <div>
                         <input type="submit" name="addActivityComment" value="Comment">
                     </div> 
                 </form>
            </div>
        </div>
    </div>
</body>
<script src="js/validation.js"></script>
</html>