<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $blockId= $_GET['id'];
    $blockQuery= "SELECT * FROM block WHERE blockId='$blockId'";
    $blockResult= mysqli_query($con, $blockQuery);
    if($blockResult) {
        $blockData= $blockResult->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Block Details || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">
                <a href="block.php">Block </a>/Details
            </div>
            <div class="info">
                <form  name="blockAddForm" method="POST" enctype="multipart/form-data">
                    <?php 
                        include('../error.php');
                    ?>
                    <div>
                        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $blockData['blockName'] ?>">
                    </div>
                    <div>
                        <img src="../uploads/<?php echo $blockData['image'] ?>" width="100%" height="300px" alt="">
                        <input type="file" name="image" id="image" value="<?php echo $blockData['image'] ?>">
                    </div>
                    
                    <div>
                        <input type="text" name="totalRoomNumber" placeholder="Total Room Number" value="<?php echo $blockData['totalRoomNumber'] ?>"> 
                    </div>
                    <div>
                        <input type="text" name="ageBetween" id="ageBetween" placeholder="Age Between" value="<?php echo $blockData['ageBetween'] ?>"> 
                    </div>
                    <div>
                        <input type="hidden" name="blockId" id="blockId" value="<?php echo $blockData['blockId'] ?>"> 
                    </div>
                    <div>
                        <input type="submit" name="updateBlock" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>