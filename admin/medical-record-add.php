
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
    <title>Add Medical Record</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
        <div class="header" style="color: red; font-size: 20px;">
                <a href="medical-record.php">Medical Record /</a>Add
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form  name="medicalRecordAddForm" method="POST" onsubmit="return medicalRecordAddValidation()">
                <?php 
                    include('../error.php');
                    ?>
                   <div>
                   <label for="userId" style="float: left;">User</label>
                       <select name="userId" id="userId">
                           <option value="">Select User</option>
                           <?php 
                                $userQuery = "SELECT * FROM user";
                                $userResult = mysqli_query($con,$userQuery);
                                while($user = mysqli_fetch_assoc($userResult)) {
                                    ?>
                                        <option value="<?php echo $user['userId'] ?>"><?php echo $user['firstName'] ?> <?php echo $user['lastName'] ?></option>
                                    <?php
                                }
                           ?>
                       </select>
                   </div>
                   
                  <div>
                  <label for="medicalCondition" style="float: left;">Medical Condition</label>
                    <textarea name="medicalCondition" id="medicalCondition" cols="30" rows="10"></textarea>
                  </div>
                  <div>
                  <label for="description" style="float: left;">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                  </div>
     
                   <div>
                       <input type="submit" value="Save" name="addMedicalRecord">
                   </div>
               </form>
               <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>