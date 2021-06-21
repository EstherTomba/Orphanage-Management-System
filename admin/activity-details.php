<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    // GET ACTIVITY DETAILS
    $activityId= $_GET['id'];
    $activityQuery= "SELECT * FROM activity WHERE activityId='$activityId'";
    $activityResult= mysqli_query($con, $activityQuery);
    if($activityResult) {
        $activityData= $activityResult->fetch_assoc();
    }
    // GET ACTIVITY CATEGORY DETAILS
    $activityCategoryId = $activityData['activityCategoryId'];
    $activityCategoryQuery= "SELECT * FROM activitycategory WHERE activityCategoryId='$activityCategoryId'";
    $activityCategoryResult= mysqli_query($con, $activityCategoryQuery);
    if($activityCategoryResult) {
        $activityCategoryData= $activityCategoryResult->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Activity Details || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
                <a href="activity.php">Activity /</a>Details
            
            </div>
            
            <div class="info">
                <div>
                    <img src="../uploads/<?php echo $activityCategoryData['image'] ?>" width="100%" height="400px" alt="">
                </div>
                <div style="font-size: 15px; background-color: green; color:white; margin-top: 10px;">Activity Date: <?php echo date('M d Y H:i',strtotime($activityData['activityDate'])) ?></div>
                <div style="font-size: 13px;">Date: <?php echo date('M d Y',strtotime($activityData['createdAt'])) ?></div>
                <form name="donationAddForm" method="POST" enctype="multipart/form-data">
                    <?php 
                        include('../error.php');
                    ?>
                    <div>
                    <input type="text" name="name" id="name" value="<?php echo $activityData['name'] ?>">
                    </div>
                    <div>
                        <select name="activityCategoryId" id="activityCategoryId">
                            <option value="">Select Activity Category</option>
                            <?php 
                                $activitycategoryQuery = "SELECT * FROM activitycategory ORDER BY createdAt DESC";
                                $activitycategoryResult = mysqli_query($con, $activitycategoryQuery);
                                while($row = mysqli_fetch_assoc($activitycategoryResult)) {
                                    ?>
                                        <option value="<?php echo $row['activityCategoryId'] ?>" <?php if ($activityData['activityCategoryId'] == $row['activityCategoryId']) echo 'selected="selected"'; ?>><?php echo $row['name'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>   
                    </div>
                        
                    <div>
                        <a href="../uploads/<?php echo $activityData['file'] ?>">
                            <div style="background-color:#dcdcdc; padding: 15px; color:#4b4276; text-align: center; font-size: 22px;">Open File</div>
                        </a>
                        <input type="file" name="image" id="image">
                    </div>
                    <div>
                        <textarea name="description" id="description" cols="30" rows="10">
                            <?php echo $activityData['description'] ?>
                        </textarea>
                    </div>
                    <div>
                        <input type="hidden" name="activityId" value="<?php echo $activityData['activityId'] ?>">
                    </div>

                    <div>
                        <input type="submit" name="updateActivity" value="Update" style="width: 49.8%;">
                        <input type="submit" name="deleteActivity" style="background-color:red; width: 49.8%;" value="Delete">
                    </div>
                </form><br>

                <div style="font-size: 20px">COMMENTS</div>
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
                <?php include('footer.php'); ?>
            </div>
          
        </div>
    </div>
</body>


</html>