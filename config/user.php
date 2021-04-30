<?php 
    require_once('db.php');
    // HELP
    if(isset($_POST['help'])) {
        $userId = $_SESSION['userId'];
        $message   = mysqli_real_escape_string($con, $_POST['message']);
        $helpQuery = "INSERT INTO  help(userId, message) VALUES('$userId','$message')";
        $helpResult = mysqli_query($con, $helpQuery);
        if(!$helpResult) {
            array_push($errors, "Error, Could not create the account.");
        }

    }
    // NEW APPOINTMENT
    if(isset($_POST['newAppointment'])) {
        $orphanId = $_SESSION['userId'];
        $counsellorId   = mysqli_real_escape_string($con, $_POST['counsellorId']);
        $date   = mysqli_real_escape_string($con, $_POST['date']);
        $time   = mysqli_real_escape_string($con, $_POST['time']);
        
        $appointmentQuery = "INSERT INTO counsellorappointment(orphanId,counsellorId,date,time) 
        VALUES('$orphanId','$counsellorId','$date','$time')";
        $appointmentResult = mysqli_query($con, $appointmentQuery);
        if($appointmentResult) {
            $_SESSION['success'] = "Appointment created successfully";
            header('Location: orphan-appointments.php');
        } else {
            array_push($errors, "Error, Could not create the account.");
        }
    }
    // CHANGE PASSWORD
    if(isset($_POST['changePassword'])) {
        $userEmail = $_SESSION['userEmail'];
        $userId    = $_SESSION['userId'];
        $oldPassword   = mysqli_real_escape_string($con, $_POST['oldPassword']);
        $newPassword   = mysqli_real_escape_string($con, $_POST['newPassword']);

        $hashedOldPassword = crypt($oldPassword, "salt@#.com");
        $hashedNewPassword = crypt($newPassword, "salt@#.com");
        // CHECK USER EMAIL AND PASSWORD
        $checkUserQuery  = "SELECT * FROM user WHERE userEmail='$userEmail'";
        $checkUserResult = mysqli_query($con, $checkUserQuery);
        $user = mysqli_fetch_assoc($checkUserResult);
        if($hashedOldPassword == $user['userPassword']) {
            $updatePasswordQuery  = "UPDATE user SET userPassword='$hashedNewPassword' WHERE userId='$userId'";
            $updatePasswordResult = mysqli_query($con, $updatePasswordQuery);
            if($updatePasswordResult) {
                $_SESSION['success'] = "Password changed successfully";
                header('Location: ../logout.php');
            } else {
                array_push($errors, "Error, Could not create the account.");
            }
        } else {
            array_push($errors, "Password do not match");
        }
    }
    // PROFILE
    if(isset($_POST['updateProfile'])) {
        $userId    = $_SESSION['userId'];
        $firstName   = mysqli_real_escape_string($con, $_POST['fname']);
        $lastName    = mysqli_real_escape_string($con, $_POST['lname']);
        $userName    = mysqli_real_escape_string($con, $_POST['uname']);
        $userAddress = mysqli_real_escape_string($con, $_POST['address']);
        $phoneNumber = mysqli_real_escape_string($con, $_POST['pnumber']);
        $updateProfileQuery  = "UPDATE user SET firstName='$firstName',lastName='$lastName',userName='$userName',phoneNumber='$phoneNumber',userAddress='$userAddress' WHERE userId='$userId'";
        $updateProfileResult = mysqli_query($con, $updateProfileQuery);
        if($updateProfileResult) {
            $_SESSION['success'] = "Profile updated successfully";
        } else {
            array_push($errors, "Error, Could not create the account.");
        }
    }


?>