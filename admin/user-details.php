
<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $userId= $_GET['id'];
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
                <?php 
                    include('../error.php');
                ?>
                 <div>
                 <label for="firstName" style="float: left;">First Name</label>
                     <input type="text" name="firstName" id="firstName" value= "<?php echo $userData['firstName']?>">
                 </div>
                 <div>
                 <label for="lastName" style="float: left;">Last Name</label>
                    <input type="text" name="lastName" id="lastName" value="<?php echo $userData['lastName']?>">
                </div>
                <div>
                <label for="userName" style="float: left;">UserName</label>
                    <input type="text" name="userName" id="userName" value="<?php echo $userData['userName']?>">
                </div>
                 <div>
                 <label for="address" style="float: left;">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $userData['userAddress']?>">
                </div>
                <div>
                <label for="email" style="float: left;">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $userData['userEmail']?>">
                </div>
                <div>
                <label for="phoneNumber" style="float: left;">Phone Number</label>
                    <input type="text" name="phoneNumber" id="phoneNumber" value="<?php echo $userData['phoneNumber']?>">
                </div>
                <div>
                <label for="dob" style="float: left;">Date Of Birth</label>
                    <input name="dob" id="dob" type="text" value="<?php echo $userData['dob']?>">
                </div>
                <div>
                <label for="gender" style="float: left;">Gender</label>
                    <select name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Male" <?php if ($userData['gender'] == 'Male') echo 'selected="selected"'; ?>>Male</option>
                        <option value="Female" <?php if ($userData['gender'] == 'Female') echo 'selected="selected"'; ?>>Female</option>
                    </select>
                </div>
                <div>
                <label for="roomId" style="float: left;">Block Room</label>
                    <select name="roomId" id="roomId">
                        <option value="">Select Block Room</option>
                        <?php
                            $blockRoomQuery = "SELECT * FROM blockroom ORDER BY createdAt DESC";
                            $blockRoomResult = mysqli_query($con, $blockRoomQuery);
                            while($room = mysqli_fetch_assoc($blockRoomResult)) {
                                $blockId = $room['blockId'];
                                $blockQuery = "SELECT * FROM block WHERE blockId='$blockId'";
                                $blockResult = mysqli_query($con, $blockQuery);
                                if($blockResult) {
                                    $blockData = $blockResult->fetch_assoc();
                                }
                                ?>
                                    <option value="<?php echo $room['blockRoomId'] ?>" <?php if ($userData['blockRoomId'] == $room['blockRoomId']) echo 'selected="selected"'; ?>>Block: <?php echo $blockData['blockName'] ?>, Room: <?php echo $room['roomNumber'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                <label for="userRole" style="float: left;">User Role</label>
                    <select name="userRole" id="userRole">
                        <option value="">Select User Role</option>
                        <option value="Admin" <?php if ($userData['userRole'] == 'Admin') echo 'selected="selected"'; ?>>Admin</option>
                        <option value="Staff" <?php if ($userData['userRole'] == 'Staff') echo 'selected="selected"'; ?>>Staff </option>
                        <option value="Orphan" <?php if ($userData['userRole'] == 'Orphan') echo 'selected="selected"'; ?>>Orphan</option>
                    </select>
                </div>
                <div>
                <label for="bloodGroup" style="float: left;">blood Group</label>
                    <input name="bloodGroup" id="bloodGroup" type="text" value="<?php echo $userData['bloodGroup']?>">
                </div>
                <div>
                    <input name="userId" id="userId" type="hidden" value="<?php echo $userData['userId']?>">
                </div>
                 <div>
                     <input type="submit" name="updateProfile" value="Update"  style="width: 49.6%;">
                     <input type="submit" name="deleteUser" style="background-color:red; width: 49.6%;" value="Delete">
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