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
    <title>Block Room</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Block Room
                <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="block-room-add.php" style="color: white;">Add Room</a>  
                  </button> 
            </div>
            <div class="info">
                <?php 
                    include('../error.php');
                    include('../success.php');
                ?>
                <table>
                    <tr>
                        <th>Block Name</th>
                        <th>Room Number</th>
                        <th>Date</th>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM blockroom ORDER BY createdAt DESC";
                        $roomResult = mysqli_query($con, $query);
                        while($row = mysqli_fetch_assoc($roomResult)) {
                            $blockId = $row['blockId'];
                            $blockQuery = "SELECT * FROM block WHERE blockId ='$blockId'";
                            $blockResult = mysqli_query($con, $blockQuery);
                            if($blockResult) {
                                $blockData = $blockResult->fetch_assoc();
                            }
                            ?>
                                <tr>
                                    <td><a href="block-room-details.php?id=<?php echo $row['blockRoomId']; ?>"><?php echo $blockData['blockName']; ?></a></td>
                                    <td><?php echo $row['roomNumber']; ?></td>
                                    <td><?php echo date('M d Y',strtotime($row['createdAt'])) ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>

            </div>
        </div>
    </div>
</body>


</html>