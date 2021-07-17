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
    <title>Add User || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
            <a href="user.php">User</a> / Add
            <?php 
                include("profileLogout.php")
            ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form name="userAddForm" method="POST" onsubmit="return userAddValidation()">
                <div>
                    <?php 
                    include('../error.php');
                    include('../success.php');
                    ?>
                </div>
                    <div>
                    <label for="firstName" style="float: left;">First Name</label>
                        <input type="text" name="firstName" id="firstName">
                    </div>
                    <div>
                    <label for="lastName" style="float: left;">"Last Name</label>
                        <input type="text" name="lastName" id="lastName">
                    </div>
                    <div>
                    <label for="userName" style="float: left;">User Name</label>
                        <input type="text" name="userName" id="userName">
                    </div>
                    <div>
                    <label for="email" style="float: left;">Email</label>
                        <input type="text" name="email" id="email">
                    </div>
                    <div>
                    <label for="phoneNumber" style="float: left;">Phone Number</label>
                        <input type="text" name="phoneNumber" id="phoneNumber">
                    </div>
                    <div>
                    <label for="address" style="float: left;">Address</label>
                        <input type="text" name="address" id="address">
                    </div>
                    <div>
                    <label for="userGender" style="float: left;">Gender</label>
                        <select name="gender" id="userGender">
                            <option value="">Select a Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div>
                    <label for="dob" style="float: left;">Date Of Birth</label>
                        <input type="date" name="dob" id="dob">
                    </div>
                    <div>
                    <label for="roomId" style="float: left;">Room</label>
                    <select name="roomId" id="roomId">
                        <option value="">Select A Room</option>
                        <?php 
                            $roomQuery  = "SELECT * FROM blockroom";
                            $roomResult = mysqli_query($con, $roomQuery);
                            while($row = mysqli_fetch_assoc($roomResult)) {
                                ?>
                                    <option value="<?php echo $row['blockRoomId']; ?>"><?php echo $row['roomNumber']; ?></option>
                                <?php
                            }
                        ?>
                    </div>
                    <div>
                    <label for="bloodGroup" style="float: left;">Blood Group</label>
                        <input type="text" name="bloodGroup" id="bloodGroup">
                    </div>
                    <div>
                    <label for="role" style="float: left;">Role</label>
                        <select name="role" id="role">
                            <option value="">Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                            <option value="Orphan">Orphan</option>
                        </select>
                    </div>
                   
                    <div>
                    <label for="password" style="float: left;">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <div>
                    <label for="conformPassword" style="float: left;">Conform Password</label>
                        <input type="password" name="conformPassword" id="conformPassword" >
                    </div>
                    <div>
                        <input type="submit" name="createNewUser" value="Save">
                    </div>
                </form>
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>