
<?php 
    require_once('../config/db.php');
    require_once('../config/user.php'); 
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
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Profile
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form name="profileForm" method="POST" onsubmit="return profileValidation()">
                    <?php 
                        include('../error.php');
                        include('../success.php');
                    ?>
                   <div>
                    <input type="text" id="fname" name="fname" value="<?php echo $userData['firstName'] ?>" placeholder="First Name">
                   </div>
                   <div>
                    <input type="text" id="lname" name="lname" value="<?php echo $userData['lastName'] ?>" placeholder="Last  Name">
                   </div>
                   <div>
                    <input type="text" id="uname" name="uname" value="<?php echo $userData['userName'] ?>" placeholder="User  Name">
                   </div>
                   <div>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $userData['userEmail'] ?>" placeholder="Email" disabled>
                   </div>
                   <div>
                    <input type="text" id="address" name="address" value="<?php echo $userData['userAddress'] ?>" placeholder="Address">
                   </div>
                   <div>
                    <input type="text" id="pnumber" name="pnumber" value="<?php echo $userData['phoneNumber'] ?>" placeholder="Phone Number">
                   </div>
                   <div>
                    <label for="gender">Gender </label>
                    <input type="text" id="gender" name="gender" value="<?php echo $userData['gender'] ?>" placeholder="Gender" disabled>
                   </div>
                   <div>
                    <label for="dob">Date of Birth</label>
                    <input type="text" id="dob" name="dob" value="<?php echo $userData['dob'] ?>" placeholder="Date of Birth" disabled>
                   </div>
                   <?php
                        $blockRoomId = $userData['blockRoomId'];
                        if($blockRoomId) {
                            $blockRoomQuery = "SELECT * FROM blockroom WHERE blockRoomId='$blockRoomId'";
                            $blockRoomResult = mysqli_query($con,$blockRoomQuery);
                            while($room = mysqli_fetch_assoc($blockRoomResult)) {
                                $blockId = $room['blockId'];
                                $blockQuery = "SELECT * FROM block WHERE blockId='$blockId'";
                                $blockResult = mysqli_query($con,$blockQuery);
                                if($blockResult) {
                                    $blockData = $blockResult->fetch_assoc();
                                }
                                ?>
                                    <div>
                                        <label for="blockName">Block Name</label>
                                        <input type="text" id="blockName" name="blockName" value="<?php echo $blockData['blockName'] ?>" placeholder="Block  Name" disabled>
                                    </div>
                                    
                                    <div>
                                        <label for="roomNumber">Room Number</label>
                                        <input type="text" id="roomNumber" name="roomNumber" value="<?php echo $room['roomNumber'] ?>" placeholder="Room Number"disabled>
                                    </div>
                                <?php
                            }
                        }
                   ?>


                   <div>
                       <label for="bloodGroup">Blood Group</label>
                    <input type="text" id="bloodGroup" name="bloodGroup" value="<?php echo $userData['bloodGroup'] ?>" placeholder="Blood Group" disabled>
                   </div>
                   <div>
                    <input type="submit" name="updateProfile" value="Update Profile">
                   </div>
                   <button style="background-color:red; padding: 10px;float: right;margin-top: 10px; margin-bottom: 25px;">
                    <a href="change-password.php" style="color: white;">Change Password</a>  
                  </button>
               
                </form>
                          
            </div>
        </div>
    </div>
</body>
<script src="js/header.js"></script>
<script src="js/validation.js"></script>

</html>