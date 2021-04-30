<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $blockRoomId= $_GET['id'];
    $roomQuery= "SELECT * FROM blockroom WHERE blockRoomId='$blockRoomId'";
    $roomResult= mysqli_query($con, $roomQuery);
    if($roomResult) {
        $roomData= $roomResult->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Room || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
            <a href="block-room.php">Block Room </a>/Add
            </div>
            <div class="info">
                    
                
                <form  name="blockRoomForm" method="POST" onsubmit="return blockRoomValidation()">
                <?php 
                    include('../error.php');
                ?>
                    <div>
                        <select name="blockId" id="blockId">
                            <option value="">Select a block</option>
                            <?php
                                $blockRoomQuery= "SELECT * FROM block ORDER BY  createdAt DESC";
                                $blockRoomResult= mysqli_query($con, $blockRoomQuery);
                                while($row = mysqli_fetch_assoc($blockRoomResult)) {
                                    ?>
                                    <option value="<?php echo $row['blockId'] ?>" <?php if ($roomData['blockId'] == $row['blockId']) echo 'selected="selected"'; ?>><?php echo $row['blockName'] ?></option>
                                    <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <input type="text" name="roomNumber" id="roomNumber" value="<?php echo $roomData['roomNumber'] ?>"  placeholder="Room Number">
                    </div>
                    <div>
                        <input type="hidden" name="blockRoomId" id="blockRoomId" value="<?php echo $roomData['blockRoomId'] ?>"  placeholder="Room Number">
                    </div>
                    <div>
                        <input type="submit"  name= "updateRoom" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>  