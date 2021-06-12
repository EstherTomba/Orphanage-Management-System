
<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $medicalRecordId= $_GET['id'];
    $medicalQuery= "SELECT * FROM medicalrecord WHERE medicalRecordId='$medicalRecordId'";
    $medicalResult= mysqli_query($con, $medicalQuery);
    if($medicalResult) {
        $medicalData= $medicalResult->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Medical Record Details</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
                <a href="medical-record.php">Medical Record /</a>Details
            </div>
            <div class="info">
                <form  name="medicalRecordAddForm" method="POST" onsubmit="return medicalRecordAddValidation()">
                <?php 
                    include('../error.php');
                    ?>
                    <div>
                       <select name="userId" id="userId">
                           <option value="">Select User</option>
                            <?php 
                                $userQuery = "SELECT * FROM user";
                                $userResult = mysqli_query($con,$userQuery);
                                while($user = mysqli_fetch_assoc($userResult)) {
                                    ?>
                                        <option value="<?php echo $user['userId'] ?>" <?php if ($medicalData['userId'] == $user['userId']) echo 'selected="selected"'; ?>><?php echo $user['firstName'] ?> <?php echo $user['lastName'] ?></option>
                                    <?php
                                }
                           ?>
                       </select>
                   </div>
                   
                  <div>
                    <textarea name="medicalCondition" id="medicalCondition" cols="30" rows="10" placeholder="Medical Condition">
                        <?php  echo $medicalData['medicalCondition']?>
                    </textarea>
                  </div>
                  <div>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description">
                        <?php  echo $medicalData['description']?>
                    </textarea>
                    <input type="hidden" name="medicalRecordId" id="medicalRecordId" value="<?php echo $medicalData['medicalRecordId']?>">
                  </div>
     
                   <div>
                       <input type="submit" name="medicalRecord" value="Update">
                   </div>
               </form>
               <form action="" method="POST">
                    <div>
                        <input type="hidden" name="medicalRecordId" value="<?php echo $medicalData['medicalRecordId'] ?>" value="Update">
                    </div>
                    <div>
                        <input type="submit" name="deleteMedicalRecord" style="background-color:red;" value="Delete">
                    </div>
                    </form>
                    <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>