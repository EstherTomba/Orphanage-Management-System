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
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                    
                
                <form  name="blockRoomForm" method="POST" onsubmit="return blockRoomValidation()">
                <?php 
                    include('../error.php');
                ?>
                    <div>
                        <label for="blockId" style="float: left;">Block</label>
                        <select name="blockId" id="blockId">
                            <option value="">Select a block</option>
                            <?php
                                $blockRoomQuery= "SELECT * FROM block ORDER BY  createdAt DESC";
                                $blockRoomResult= mysqli_query($con, $blockRoomQuery);
                                while($row = mysqli_fetch_assoc($blockRoomResult)) {
                                    ?>
                                        <option value="<?php echo $row['blockId'] ?>"><?php echo  $row['blockName']?></option>
                                    <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                    <label for="roomNumber" style="float: left;">Room Number</label>
                        <input type="text" name="roomNumber" id="roomNumber">
                    </div>
                    <div>
                        <input type="submit"  name= "addBlockRoom" value="Save">
                    </div>
                </form>
                <?php include('footer.php'); ?>
            </div>
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