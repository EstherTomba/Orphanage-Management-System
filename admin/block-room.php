<?php 
    require_once('../config/db.php'); 
    require_once('../config/admin.php');    
    if (!isset($_SESSION['isAdmin'])) {
        header('location: ../login.php');
    }
    $blockIsTrue = true;
    $searchIsTrue   = false;
    $search   = '';
    if(isset($_GET['q'])) {
        $blockIsTrue = false;
        $searchIsTrue   = true;
        $search = mysqli_real_escape_string($con, $_GET['q']);
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
            <?php 
            include("profileLogout.php")
            ?>
               
            </div>
            <div class="info">
                <div>
                    <form method="GET" class="search"> 
                        <input type="text" placeholder="Search" name="q" value="<?php echo $search ?>">
                        <input type="submit">
                    </form>
                    <button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
                        <a href="block-room-add.php" style="color: white;">Add Room</a>  
                    </button> 
                </div><br><br>
               
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
                        if($blockIsTrue) {
                            $blockIsTrue = true;
                            $searchIsTrue   = false;
                            $query= "SELECT a.blockRoomId, a.blockId, a.roomNumber,
                            b.blockName, b.ageBetween, a.createdAt
                            FROM blockroom AS a INNER JOIN block AS b ON a.blockId  = b.blockId ORDER BY createdAt DESC";
                        } elseif($searchIsTrue) {
                            $query= "SELECT a.blockRoomId, a.blockId, a.roomNumber,
                            b.blockName, b.ageBetween, a.createdAt
                            FROM blockroom AS a INNER JOIN block AS b ON a.blockId  = b.blockId 
                            WHERE blockName LIKE '%$search%' OR ageBetween LIKE '%$search%' GROUP BY b.blockName"; 
                        }
                        $roomResult = mysqli_query($con, $query);
                        while($row = mysqli_fetch_assoc($roomResult)) {
                            ?>
                                <tr>
                                    <td><a href="block-room-details.php?id=<?php echo $row['blockRoomId']; ?>"><?php echo $row['blockName']; ?></a></td>
                                    <td><?php echo $row['roomNumber']; ?></td>
                                    <td><?php echo date('M d Y',strtotime($row['createdAt'])) ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
                
                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</body>


</html>