
<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $userId= $_SESSION['userId'];
    $userQuery= "SELECT * FROM user WHERE userId='$userId'";
    $userResult= mysqli_query($con, $userQuery);
    if($userResult) {
        $userData= $userResult->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px; background-color: darkblue;">Profile
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
             <form name="profileForm" method="POST" onsubmit="return profileValidation()">
                <!-- <img src="../images/images.jpg" style="width:100px; height: 100px; border-radius: 50px; margin-left: 45%;" alt=""> -->
                <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
                 <div>
                     <input type="text" name="firstName" id="firstName" placeholder=" First Name" value= "<?php echo $userData['firstName']?>">
                 </div>
                 <div>
                    <input type="text" name="lastName" id="lastName" placeholder="Last Name" value="<?php echo $userData['lastName']?>">
                </div>
                <div>
                    <input type="text" name="userName" id="userName" placeholder="UserName" value="<?php echo $userData['userName']?>">
                </div>
                 <div>
                    <input type="text" name="address" id="address" placeholder="Addres" value="<?php echo $userData['userAddress']?>">
                </div>
                <div>
                    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $userData['userEmail']?>">
                </div>
                <div>
                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" value="<?php echo $userData['phoneNumber']?>">
                </div>
                <div>
                    <input name="dob" id="dob" type="text" placeholder="01/02/1990" value="<?php echo $userData['dob']?>">
                </div>
                <div>
                    <select name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Male" <?php if ($userData['gender'] == 'Male') echo 'selected="selected"'; ?>>Male</option>
                        <option value="Female" <?php if ($userData['gender'] == 'Female') echo 'selected="selected"'; ?>>Female </option>
                    </select>
                </div>
                <div>
                    <input name="bloodGroup" id="bloodGroup" type="text" placeholder="bloodGroup" value="<?php echo $userData['bloodGroup']?>">
                </div>
                
                <div>
                    <select name="roomId" id="roomId">
                        <option value="">Select Block Room</option>
                        <?php 
                        $blocRoomQuery = "SELECT *FROM blockroom ORDER BY createdAt DESC";
                        $blocRoomResult = mysqli_query($con, $blocRoomQuery);
                        while($row =  mysqli_fetch_assoc($blocRoomResult)) {
                            $blockId = $row['blockId'];
                            $blockQuery = "SELECT *FROM block WHERE blockId='$blockId'";
                            $blockResult = mysqli_query($con, $blockQuery);
                            if($blockResult) {
                                $blockData = $blockResult->fetch_assoc();
                            }
                            ?>
                             <option value="<?php echo $row['blockRoomId'] ?>" <?php if ($userData['blockRoomId'] == $row['blockRoomId']) echo 'selected="selected"'; ?>><?php  echo $blockData['blockName']?>: <?php echo $row['roomNumber'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <select name="isAdmin" id="isAdmin">
                        <option value="">Select User Role</option>
                        <option value="Admin" <?php if ($userData['userRole'] == 'Admin') echo 'selected="selected"'; ?>>Admin</option>
                        <option value="Staff" <?php if ($userData['userRole'] == 'Staff') echo 'selected="selected"'; ?>>Staff </option>
                        <option value="Orphan" <?php if ($userData['userRole'] == 'Orphan') echo 'selected="selected"'; ?>>Orphan</option>
                    </select>
                </div>
                 <div>
                     <input type="submit" name="updateAdminProfile" value="Update Profile">
                 </div>
                 <button style="background-color:red; padding: 10px;float: right;margin-top: 10px;" >
                    <a href="change-password.php" style="color: white;">Change Password</a>  
                  </button> 
             </form>
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>