<?php 
    require_once('../config/db.php'); 
?>

<div class="sidebar">
    <h2>User Dashboard</h2>
    <ul>
        <li><a href="activity.php">Activities</a></li>
        <li><a href="event.php">Events</a></li>
        <?php
            if (isset($_SESSION['isStaff'])) {
                ?>
                    <li><a href="counsellor-appointments.php">My Appointments</a></li>
                <?php
            } else {
                ?>
                    <li><a href="orphan-appointments.php">Counsellor Appointments</a></li>
                <?php
            }
        ?>
        <li><a href="help.php">Help</a></li>
    </ul>
</div>

