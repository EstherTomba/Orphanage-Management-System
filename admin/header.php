<div class="sidebar" style="overflow: auto;">
    <h2>Admin Dashboard</h2>
    <ul>
        <li onclick="showChildList()"><a href="#">Childs</a></li>
        <div id="childList">
            <li class="left-space"><a href="child-admission.php">Child Admission</a></li>
            <li class="left-space"><a href="child-approved.php">Child Approved</a></li>
            <li class="left-space"><a href="child-rejected.php">Child Rejected</a></li>
            <li class="left-space"><a href="child-pended.php">Child Pending</a></li>
            <li class="left-space"><a href="child-transfer.php">Child Transfer</a></li>
        </div>
        <li onclick="showBlock()"><a href="#">Block</a></li>
        <div id="blockList">
            <li class="left-space"><a href="block.php">Blocks</a></li>
            <li class="left-space"><a href="block-room.php">Block Room</a></li> 
        </div>
        
        <li><a href="user.php">Users</a></li>
        
        <li><a href="medical-record.php">Medical Records</a></li>
            
        <li onclick="showCounsellorList()"><a href="#">Counsellor</a></li>
        <div id="counsellorList">
            <li class="left-space"><a href="counsellor.php">Counsellors</a></li>
            <li class="left-space"><a href="counsellor-appointment.php">Counsellor Appointment</a></li>
        </div>
        <li onclick="showDonationList()"><a href="#">Donation</a></li>
        <div id="donationList"> 
            <li class="left-space"><a href="donation-type.php">Donation Type</a></li>
            <li class="left-space"><a href="donation.php">Donation</a></li>
        </div> 
        <li onclick="showActivityList()"><a href="#">Activity</a></li>
        <div id="activityList">
            <li class="left-space"><a href="activity-category.php">Activity Categories</a></li>
            <li class="left-space"><a href="activity.php">Activities</a></li>
        </div>
        <li><a href="event.php">Events</a></li>
        <li><a href="contact.php">Contacts</a></li>
        <li><a href="help.php">Help</a></li>
        <li><a href="profile.php"></i>Profile</a></li>
        <li><a href="../logout.php" style="color: red;">Logout</a></li>
    </ul>
</div>

<script src="js/header.js"></script>