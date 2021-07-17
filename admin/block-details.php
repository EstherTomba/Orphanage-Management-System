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
                <?php 
                    include("profileLogout.php")
                ?>
            </div>
            <div class="info" style="width: 60%; margin-left:20%; margin-right:20%;">
                <form  name="blockAddForm" method="POST" enctype="multipart/form-data">
                    <?php 
                        include('../error.php');
                    ?>
                    <div>
                    <label for="name" style="float: left;">Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $blockData['blockName'] ?>">
                    </div>
                    <div>
                        <img src="../uploads/<?php echo $blockData['image'] ?>" width="100%" height="300px" alt="">
                        <input type="file" name="image" id="image">
                    </div>
                    
                    <div>
                    <label for="totalRoomNumber" style="float: left;">Total Room Number</label>
                        <input type="text" name="totalRoomNumber" value="<?php echo $blockData['totalRoomNumber'] ?>"> 
                    </div>
                    <div>
                    <label for="ageBetween" style="float: left;">Age Betwee</label>
                        <input type="text" name="ageBetween" id="ageBetween" value="<?php echo $blockData['ageBetween'] ?>"> 
                    </div>
                    <div>
                        <input type="hidden" name="blockId" id="blockId" value="<?php echo $blockData['blockId'] ?>"> 
                    </div>
                    <div>
                        <input type="submit" name="updateBlock" value="Update">
                    </div>
                </form>

                <form action="" method="POST">
                    <div>
                        <input type="hidden" name="blockId" value="<?php echo $blockData['blockId'] ?>" value="Update">
                    </div>
                    <div>
                        <input type="submit" name="deleteBlock" style="background-color:red;" value="Delete">
                    </div>
               </form>
            </div>
         <?php include('footer.php'); ?>

        </div>
    </div>
</body>

<script src="js/validation.js"></script>




</html>