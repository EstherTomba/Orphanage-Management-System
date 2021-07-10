<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $activityCategoryId= $_GET['id'];
    $activityQuery= "SELECT * FROM activitycategory WHERE activityCategoryId='$activityCategoryId'";
    $activityResult= mysqli_query($con, $activityQuery);
    if($activityResult) {
        $activityData= $activityResult->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Add Activity - Category || Coms  </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
                <a href="activity-category.php">Activity Category /</a>Details
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form name="activityCategoryAddForm" method="POST" enctype="multipart/form-data">
                <?php 
                    include('../error.php');
                    ?>
                    <div>
                        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $activityData['name'] ?>">
                    </div>
                    
                   <div>
                        <img src="../uploads/<?php echo $activityData['image'] ?>" width="100%" height="300px" alt="">
                        <input type="file" name="image" id="image">
                   </div>
                   <div>
                        <input type="hidden" name="activityCategoryId" id="activityCategoryId" value="<?php echo $activityData['activityCategoryId'] ?>">
                    </div>
                   <div>
                       <input type="submit" name="updateActivityCategory" value="Update">
                   </div>
                </form>

                <form action="" method="POST">
                    <div>
                        <input type="hidden" name="activityCategoryId" value="<?php echo $activityData['activityCategoryId'] ?>" value="Update">
                    </div>
                    <div>
                        <input type="submit" name="deleteActivityCategory" style="background-color:red;" value="Delete">
                    </div>
                </form>
            </div>
            <?php include('footer.php'); ?>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>


<style>
    .footer {
        position: fixed;
        bottom: 0px;
        padding: 15px;
        margin-bottom: 0px;
    }
</style>

</html>