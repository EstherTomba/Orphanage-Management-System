<button style="background-color:green; padding: 10px;float: right;margin-top: -10px;" >
    <li onclick="showProfileLogout()"><a href="#" style="color: white;"><?php  echo $_SESSION['firstName']?> <?php  echo $_SESSION['lastName']?></a></li>
    <div id="ProfileLogoutList">
        <li style="margin-top:10px"><a href="profile.php" style="color:white">Profile</a></li>
        <li style="margin-top:10px"><a href="../logout.php" style="color: red">Logout</a></li>
    </div>
</button>

<style>
    #ProfileLogoutList {
        display: none;
    }
</style>

<script src="js/header.js"></script>