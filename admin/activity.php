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
    <title>Activities || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Activity
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="activity-add.php" style="color: white;">Add Activities</a>  
                  </button> 
            </div>
            <div class="info">
                <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
                
            <?php 
              $activityQuery= "SELECT * FROM activity ORDER BY  createdAt DESC";
              $acitivityResult= mysqli_query($con, $activityQuery);
              while($row = mysqli_fetch_assoc($acitivityResult)) {
                  $activityCategoryId = $row['activityCategoryId'];
                  $activityCategoryQuery= "SELECT * FROM activitycategory WHERE activityCategoryId ='$activityCategoryId'";
                  $activityCategoryResult= mysqli_query($con, $activityCategoryQuery);
                  if($activityCategoryQuery) {
                      $activityCategoryData= $activityCategoryResult->fetch_assoc();
                  }
                  ?>
                    <div style="width:100%; height: 200px; background-color: white;">
                        <div style="width:400px; height:200px;">
                            <a href="activity-details.php?id=<?php echo $row['activityId'] ?>">
                                <img src="../uploads/<?php echo $activityCategoryData['image'] ?>" width="100%" height="200px" alt="">
                            </a>
                        </div>
                        <div style="position: absolute;margin-top:-190px;margin-left:410px; margin-right: 20px;">
                            <a href="activity-details.php?id=<?php echo $row['activityId'] ?>">
                                <h1 style="color:#4b4276;"><?php echo $row['name'] ?></h1>
                            </a> 
                            <div style="font-size: 12px;"><?php echo date('M d Y',strtotime($row['createdAt'])) ?></div> 
                            <div>Category: <?php  echo $activityCategoryData['name']?></div> 
                            <p style="margin-top: 20px;">
                                <?php echo substr($row['description'], 0, 300) ?>
                            </p>    
                        </div>
                    </div>
                    <hr style="margin-bottom: 10px;">
                  <?php
              }
            
            ?>





               


            </div>
            <?php include('footer.php'); ?>
        </div>
    </div>
</body>


</html>