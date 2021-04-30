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
    <title>Activity Category</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Activity Category
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="activity-category-add.php" style="color: white;">Add Activity Category </a>  
                  </button> 
            </div>
            
            <div class="info">
            <?php 
                    include('../error.php');
                    include('../success.php');
                    ?>
                <table>
                    <tr>
                        <th>Name</th>
                         <th>Date</th>
                          
                        
                    </tr>
                        <?php 
                          $activitycategoryQuery= "SELECT * FROM activitycategory ORDER BY createdAt DESC";
                          $activitycategoryResult= mysqli_query($con, $activitycategoryQuery);
                           while($row= mysqli_fetch_assoc($activitycategoryResult)) {
                               ?>
                                    <tr>
                                        <td><a href="activity-category-details.php?id=<?php echo $row['activityCategoryId'] ?>"><?php echo $row['name'] ?></a></td>
                                        <td> <?php echo date('M D Y', strtotime($row['createdAt']))  ?></td>
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