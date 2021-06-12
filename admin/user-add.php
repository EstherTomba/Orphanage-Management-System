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
            </div>
            <div class="info">
                <form name="userAddForm" method="POST" onsubmit="return userAddValidation()">
                <div>
                    <?php 
                    include('../error.php');
                    include('../success.php');
                    ?>
                </div>
                    <div>
                        <input type="text" name="firstName" id="firstName" placeholder="First Name">
                    </div>
                    <div>
                        <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                    </div>
                    <div>
                        <input type="text" name="userName" id="userName" placeholder="User Name">
                    </div>
                    <div>
                        <input type="text" name="email" id="email" placeholder="Email">
                    </div>
                    <div>
                        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">
                    </div>
                    <div>
                        <input type="text" name="address" id="address" placeholder="Address">
                    </div>
                    <div>
                        <select name="gender" id="userGender">
                            <option value="">Select a Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div>
                        <input type="date" name="dob" id="dob">
                    </div>
                    <div>
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
                        <input type="text" name="bloodGroup" id="bloodGroup" placeholder="Blood Group">
                    </div>
                    <div>
                        <select name="role" id="role">
                            <option value="">Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                            <option value="Orphan">Orphan</option>
                        </select>
                    </div>
                   
                    <div>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <div>
                        <input type="password" name="conformPassword" id="conformPassword"
                            placeholder="Conform Password">
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