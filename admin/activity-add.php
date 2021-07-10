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
    <title>Add Activity || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;"> 
            <a href="activity.php"> Activity /</a>Add
            <?php 
                include("profileLogout.php")
            ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form name="activityAddForm" method="POST" onsubmit="return activityAddValidation()" enctype="multipart/form-data">
                    <?php 
                        include('../error.php');
                    ?>
                    <div>
                        <select name="activityCategoryId" id="activityCategoryId">
                            <option value="">Select Activity Category</option>
                            <?php  
                            $activityCategoryQuery = "SELECT * FROM activityCategory ORDER BY createdAt DESC";
                            $activityCategoryResult = mysqli_query($con,$activityCategoryQuery);
                            while($row = mysqli_fetch_assoc($activityCategoryResult))  {
                                ?>
                                 <option value="<?php echo $row['activityCategoryId']?>"><?php  echo $row['name']?></option>
                                <?php 

                            }

                            
                            ?>
                           
                        
                        </select>
                    </div>
                    <div>
                        <input type="text" name="name" id="name"  placeholder="Name">
                    </div>
                    
                   <div>
                      <input type="file" name="image" id="image"  value="">
                   </div>
                   <div>
                       <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                   </div>
                   <div>
                       <input type="submit" name="addActivity" value="Save">
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