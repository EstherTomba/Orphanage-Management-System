<?php
     require_once('db.php');
    //CREATE A NEW USER
    if(isset($_POST['createNewUser'])){
        $firstName   = mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName    = mysqli_real_escape_string($con, $_POST['lastName']);
        $userName    = mysqli_real_escape_string($con, $_POST['userName']);
        $userEmail   = mysqli_real_escape_string($con, $_POST['email']);
        $phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
        $userAddress = mysqli_real_escape_string($con, $_POST['address']);
        $gender      = mysqli_real_escape_string($con, $_POST['gender']);
        $dob         = mysqli_real_escape_string($con, $_POST['dob']);
        $blockRoomId = mysqli_real_escape_string($con, $_POST['roomId']);
        $bloodGroup  = mysqli_real_escape_string($con, $_POST['bloodGroup']);
        $userRole    = mysqli_real_escape_string($con, $_POST['role']);
        $userPassword = mysqli_real_escape_string($con, $_POST['password']);
        $conformPassword = mysqli_real_escape_string($con, $_POST['conformPassword']);

        // CHECK IF THERE IS ALREADY A USER WITH THAT EMAIL
        if($userEmail !=  '') {
            $checkUserQuery  = "SELECT * FROM user WHERE userEmail='$userEmail' LIMIT 1";
            $checkUserResult = mysqli_query($con, $checkUserQuery);
            $user = mysqli_fetch_assoc($checkUserResult);
            if($user) {
                if($user['userEmail'] == $userEmail ){
                    array_push($errors, "Email already exists.");
                }
            }
        }
        
        // CHECK IF THERE IS NO ERROR, CREATE THE USER
        if(count($errors) == 0 ){
            $hashedPassword = crypt($userPassword, "salt@#.com");
            $creatUserQuery = "INSERT INTO user (firstName,lastName,userName,userEmail,phoneNumber,userAddress,userPassword,gender,dob,blockRoomId,bloodGroup,userRole) VALUES
            ('$firstName', '$lastName',NULLIF('$userName',''), NULLIF('$userEmail',''), NULLIF('$phoneNumber',''), NULLIF('$userAddress',''), '$hashedPassword', '$gender', '$dob', NULLIF('$blockRoomId',''), NULLIF('$bloodGroup',''), '$userRole')";
            $creatUserResult = mysqli_query($con, $creatUserQuery);
            if($creatUserResult) {
                $_SESSION['success'] = "Account created successfully";
                header('Location: user.php');
            } else {
                array_push($errors, "Error, Could not create the account.");
            }

        }
    }

    //CREATE A NEW USER
    if(isset($_POST['blockAdd'])){
        $image = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];   
        $name    = mysqli_real_escape_string($con, $_POST['name']);  
        $totalRoomNumber    = mysqli_real_escape_string($con, $_POST['totalRoomNumber']);
        $ageBetween    = mysqli_real_escape_string($con, $_POST['ageBetween']); 
        $checkNameQuery  = "SELECT * FROM block WHERE blockName='$name' LIMIT 1";
        $checkNameResult = mysqli_query($con, $checkNameQuery);
        $block = mysqli_fetch_assoc($checkNameResult);
        if($block) {
            if($block['blockName'] == $name ){
                array_push($errors, "Name already exists.");
            }
        }
        
        if(count($errors) == 0 ){
            move_uploaded_file($tempname, "../uploads/".$image);
            $creatBlockQuery = "INSERT INTO block (blockName,image,totalRoomNumber,ageBetween) VALUES
            ('$name', '$image', '$totalRoomNumber','$ageBetween')";
            $creatBlockResult = mysqli_query($con, $creatBlockQuery);
            if($creatBlockResult) {
                $_SESSION['success'] = "Block created successfully";
                header('Location: block.php');
            } else {
                array_push($errors, "Error, Could not create the account. $creatBlockQuery");
            }

        }
    }
   // ADD BLOCK ROOM
    if(isset($_POST['addBlockRoom'])) {
        $blockId= mysqli_real_escape_string($con, $_POST['blockId']);
        $roomNumber= mysqli_real_escape_string($con, $_POST['roomNumber']);
        $creatRoomQuery = "INSERT INTO blockroom (blockId,roomNumber) VALUES ('$blockId', '$roomNumber')";
        $creatRoomResult = mysqli_query($con, $creatRoomQuery);
        if($creatRoomResult) {
            $_SESSION['success'] = "Room created successfully";
            header('Location: block-room.php');
        } else {
            array_push($errors, "Error, Could not create the account.");
        }
        
    }

    
    if(isset($_POST['addCounsellor'])){
        $staffId= mysqli_real_escape_string($con, $_POST['staffId']);
        $workTime= mysqli_real_escape_string($con, $_POST['workTime']);
        $workDate= mysqli_real_escape_string($con, $_POST['workDate']);
        $checkCounsellorQuery  = "SELECT * FROM counsellor WHERE staffId='$staffId' LIMIT 1";
        $checkCounsellorResult = mysqli_query($con, $checkCounsellorQuery);
        $user = mysqli_fetch_assoc($checkCounsellorResult);
        if($user) {
            if($user['staffId'] == $staffId ){
                array_push($errors, "Staff already exists.");
            }
        }
        if(count($errors) == 0 ) {
            $createCounsellorQuery = "INSERT INTO counsellor (staffId,workingTime,workingDate) 
            VALUES ('$staffId', '$workTime', '$workDate')";
            $createCounsellorResult = mysqli_query($con, $createCounsellorQuery);
            if($createCounsellorResult) {
                $_SESSION['success'] = "Counsellor created successfully";
                header('Location: counsellor.php');
            } else {
                array_push($errors, "Error, Could not create the account.");
            }
        }
    }

    // ADD COUNSELLOR APPOINTMENT
    if(isset($_POST['addCounsellorAppointment'])) {
        $orphanId= mysqli_real_escape_string($con, $_POST['orphanId']);
        $counsellorId= mysqli_real_escape_string($con, $_POST['counsellorId']);
        $date = mysqli_real_escape_string($con, $_POST['date']);
        $time = mysqli_real_escape_string($con, $_POST['time']);
        $insertAppointmentQuery = "INSERT INTO counsellorappointment (orphanId,counsellorId,date,time ) VALUES('$orphanId','$counsellorId','$date','$time')";
        $insertAppointmentResult = mysqli_query($con, $insertAppointmentQuery); 
        if($insertAppointmentResult) {
            $_SESSION['success'] = "Appointment is created successfully";  
            header('Location: counsellor-appointment.php');
        }else {
            array_push($errors, "Error, Could not create the donation Type.");
        }
    }

    // DONATION TYPE
    if(isset($_POST['donationtype'])) {
        $name= mysqli_real_escape_string($con, $_POST['name']);
        // CHECK IF NAME ALREADY EXISTED
        $addDonationTypeQuery = "SELECT * FROM donationtype WHERE name='$name'";
        $addDonationTypeResult = mysqli_query($con, $addDonationTypeQuery); 
        $donationType = mysqli_fetch_assoc($addDonationTypeResult);
        if($donationType) {
            if($donationType['name'] == $name ){
                array_push($errors, "Name already exists.");
            }
        }
        if(count($errors) == 0 ) {
            $insertDonationTypeQuery = "INSERT INTO donationtype (name) VALUES('$name')";
            $insertDonationTypeResult = mysqli_query($con, $insertDonationTypeQuery); 
            if($insertDonationTypeResult) {
                $_SESSION['success'] = "Donation Type is created successfully";  
                header('Location: donation-type.php');
            }else {
                array_push($errors, "Error, Could not create the donation Type.");
            }
        }
    }

    // DONATION
    if(isset($_POST['donation'])) {
        $donationTypeId= mysqli_real_escape_string($con, $_POST['donationTypeId']);
        $firstName= mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName= mysqli_real_escape_string($con, $_POST['lastName']);
        $email= mysqli_real_escape_string($con, $_POST['email']);
        $phoneNumber= mysqli_real_escape_string($con, $_POST['phoneNumber']);
        $address= mysqli_real_escape_string($con, $_POST['address']);
        $amount= mysqli_real_escape_string($con, $_POST['amount']);
        $description= mysqli_real_escape_string($con, $_POST['description']);
        $addDonationQuery = "INSERT INTO donation (firstName,lastName,phoneNumber,email,address,donationTypeId,amount,description)
         VALUES('$firstName','$lastName','$phoneNumber','$email','$address','$donationTypeId','$amount','$description')";
        $addDonationResult = mysqli_query($con, $addDonationQuery);
        if($addDonationResult) {
            $_SESSION['success'] = "Donation  is created successfully";
            header('Location: donation.php');
        }else  {
            array_push($errors, "Error, Could not create the donation.");
        }
    }
    // ADD ACTIVITY CATEGORY
    if(isset($_POST['addActivityCategory'])) {
        $name= mysqli_real_escape_string($con, $_POST['name']);
        $image = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"]; 
        // CHECK IF THE NAME ALREADY EXISTS
        $checkNameQuery  = "SELECT * FROM activitycategory WHERE name='$name' LIMIT 1";
        $checkNameResult = mysqli_query($con, $checkNameQuery);
        $block = mysqli_fetch_assoc($checkNameResult);
        if($block) {
            if($block['name'] == $name ){
                array_push($errors, "Name already exists.");
            }
        }
        
        if(count($errors) == 0 ){
            move_uploaded_file($tempname, "../uploads/".$image);
            $creatCategoryQuery = "INSERT INTO activitycategory (name,image) VALUES
            ('$name', '$image')";
            $creatCategoryResult = mysqli_query($con, $creatCategoryQuery);
            if($creatCategoryResult) {
                $_SESSION['success'] = "Activity Category created successfully";
                header('Location: activity-category.php');
            } else {
                array_push($errors, "Error, Could not create the account.");
            }
        }

    }
    // ADD ACTIVITY
    if(isset($_POST['addActivity'])) {
        $activityCategoryId= mysqli_real_escape_string($con, $_POST['activityCategoryId']);
        $name= mysqli_real_escape_string($con, $_POST['name']);
        $file = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"]; 
        $description= mysqli_real_escape_string($con, $_POST['description']);
         // CHECK IF THE NAME ALREADY EXISTS
         $checkNameQuery  = "SELECT * FROM activity WHERE name='$name' LIMIT 1";
         $checkNameResult = mysqli_query($con, $checkNameQuery);
         $block = mysqli_fetch_assoc($checkNameResult);
         if($block) {
             if($block['name'] == $name ){
                 array_push($errors, "Name already exists.");
             }
         }
         if(count($errors) == 0 ){
            move_uploaded_file($tempname, "../uploads/".$file);
            $creatActivityQuery = "INSERT INTO activity (activityCategoryId,name,file,description) VALUES
            ('$activityCategoryId','$name','$file', '$description')";
            $creatActivityResult = mysqli_query($con, $creatActivityQuery);
            if($creatActivityResult) {
                $_SESSION['success'] = "Activity created successfully";
                header('Location: activity.php');
            } else {
                array_push($errors, "Error, Could not create the account.");
            }
        }
    }

    // ADD ACTIVITY CATEGORY
    if(isset($_POST['addActivityCategory'])) {
        $name= mysqli_real_escape_string($con, $_POST['name']);
        $image = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"]; 
        // CHECK IF THE NAME ALREADY EXISTS
        $checkNameQuery  = "SELECT * FROM activitycategory WHERE name='$name' LIMIT 1";
        $checkNameResult = mysqli_query($con, $checkNameQuery);
        $block = mysqli_fetch_assoc($checkNameResult);
        if($block) {
            if($block['name'] == $name ){
                array_push($errors, "Name already exists.");
            }
        }
        
        if(count($errors) == 0 ){
            move_uploaded_file($tempname, "../uploads/".$image);
            $creatCategoryQuery = "INSERT INTO activitycategory (name,image) VALUES
            ('$name', '$image')";
            $creatCategoryResult = mysqli_query($con, $creatCategoryQuery);
            if($creatCategoryResult) {
                $_SESSION['success'] = "Activity Category created successfully";
                header('Location: activity-category.php');
            } else {
                array_push($errors, "Error, Could not create the account.");
            }
        }

    }
    // ADD EVENT
    if(isset($_POST['addEvent'])) {
        $name= mysqli_real_escape_string($con, $_POST['name']);
        $image = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"]; 
        $address= mysqli_real_escape_string($con, $_POST['address']);
        $date= mysqli_real_escape_string($con, $_POST['date']);
        $time= mysqli_real_escape_string($con, $_POST['time']);
        $description= mysqli_real_escape_string($con, $_POST['description']);
         // CHECK IF THE NAME ALREADY EXISTS
         $checkNameQuery  = "SELECT * FROM event WHERE name='$name' LIMIT 1";
         $checkNameResult = mysqli_query($con, $checkNameQuery);
         $event = mysqli_fetch_assoc($checkNameResult);
         if($event) {
            if($event['name'] == $name ){
                array_push($errors, "Name already exists.");
            }
         }
         if(count($errors) == 0 ){
             move_uploaded_file($tempname, "../uploads/".$image);
             $creatEventQuery = "INSERT INTO event (name,image,description,address,date,time) VALUES
             ('$name','$image', '$description','$address','$date','$time')";
             $creatEventResult = mysqli_query($con, $creatEventQuery);
             if($creatEventResult) {
                 $_SESSION['success'] = "Event created successfully";
                 header('Location: event.php');
             } else {
                 array_push($errors, "Error, Could not create the account.");
             }
         }
    }

    // HELP RESPONSE
    if(isset($_POST['helpResponse'])) {
        $message= mysqli_real_escape_string($con, $_POST['message']);
        $userId= mysqli_real_escape_string($con, $_POST['userId']);
        $adminId= mysqli_real_escape_string($con, $_POST['adminId']);
        $creatHelpResponseQuery = "INSERT INTO help (userId,adminId,message) VALUES
        ('$userId','$adminId','$message')";
        $creatHelpResponseResult = mysqli_query($con, $creatHelpResponseQuery);
        if($creatHelpResponseResult) {
            $_SESSION['success'] = "Message sent successfully to the user";
            header('Location: help.php');
        } else {
            array_push($errors, "Error, Could not create the account.");
        }

    }




    // ===============================================================================================
                                        // UPDATE
    // ===============================================================================================
    // HELP RESPONSE
    if(isset($_POST['updateProfile'])) {
        $userId = mysqli_real_escape_string($con, $_POST['userId']);
        $firstName= mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName= mysqli_real_escape_string($con, $_POST['lastName']);
        $userName= mysqli_real_escape_string($con, $_POST['userName']);
        $userAddress= mysqli_real_escape_string($con, $_POST['address']);
        $userEmail= mysqli_real_escape_string($con, $_POST['email']);
        $phoneNumber= mysqli_real_escape_string($con, $_POST['phoneNumber']);
        $dob= mysqli_real_escape_string($con, $_POST['dob']);
        $gender= mysqli_real_escape_string($con, $_POST['gender']);
        $blockRoomId= mysqli_real_escape_string($con, $_POST['roomId']);
        $userRole= mysqli_real_escape_string($con, $_POST['userRole']);
        $bloodGroup= mysqli_real_escape_string($con, $_POST['bloodGroup']);

        $updateProfileQuery = "UPDATE user SET firstName='$firstName',lastName='$lastName',userName=NULLIF('$userName',''),userEmail=NULLIF('$userEmail','')
        ,phoneNumber=NULLIF('$phoneNumber',''),userAddress=NULLIF('$userAddress',''),gender='$gender',dob='$dob',blockRoomId=NULLIF('$blockRoomId',''),
        bloodGroup=NULLIF('$bloodGroup',''),userRole='$userRole' WHERE userId='$userId'";
        $updateProfileResult = mysqli_query($con, $updateProfileQuery);
        if($updateProfileResult) {
            $_SESSION['success'] = "Profile updated successfully";
            header('Location: user.php');
        } else {
            array_push($errors, "Error, Could not create the account.");
        }
    }


    // UPDATE MEDICAL RECORD
    if(isset($_POST['medicalRecord'])) {
        $userId = mysqli_real_escape_string($con, $_POST['userId']);
        $medicalCondition = mysqli_real_escape_string($con, $_POST['medicalCondition']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $medicalRecordId =  mysqli_real_escape_string($con, $_POST['medicalRecordId']);
        $updateMedicalRecordQuery = "UPDATE medicalrecord SET userId='$userId',medicalCondition='$medicalCondition',description='$description' WHERE medicalRecordId='$medicalRecordId'";
        $updateMedicalRecordResult = mysqli_query($con, $updateMedicalRecordQuery);
        if($updateMedicalRecordResult) {
            $_SESSION['success'] = "Medical record updated successfully";
            header('Location: medical-record.php');
        } else {
            array_push($errors, "Error, Could not create the account.");
        }
    }


    // UPDATE COUNSELLOR
    if(isset($_POST['updateCounsellor'])) {
        $staffId = mysqli_real_escape_string($con, $_POST['staffId']);
        $workingTime = mysqli_real_escape_string($con, $_POST['workTime']);
        $workingDate = mysqli_real_escape_string($con, $_POST['workDate']);
        $counsellorId =  mysqli_real_escape_string($con, $_POST['counsellorId']);
        // CHECK IF USER ALREADY EXISTS
        $checkUserQuery  = "SELECT * FROM counsellor WHERE staffId='$staffId' LIMIT 1";
        $checkUserResult = mysqli_query($con, $checkUserQuery);
        $user = mysqli_fetch_assoc($checkUserResult);
        if($user) {
            if($user['staffId'] == $staffId ){
                array_push($errors, "User already exists.");
            }
        }
        if(count($errors) == 0 ){
            $updateCounsellorQuery = "UPDATE counsellor SET staffId='$staffId',workingTime='$workingTime',workingDate='$workingDate' WHERE counsellorId='$counsellorId'";
            $updateCounsellorResult = mysqli_query($con, $updateCounsellorQuery);
            if($updateCounsellorResult) {
                $_SESSION['success'] = "Counsellor updated successfully";
                header('Location: counsellor.php');
            } else {
                array_push($errors, "Error, Could not update the account.");
            }
        }
    }


    // UPDATE COUNSELLOR APPOINTMENT
    if(isset($_POST['aupdateCounsellorAppointment'])) {
        $orphanId = mysqli_real_escape_string($con, $_POST['orphanId']);
        $counsellorId = mysqli_real_escape_string($con, $_POST['counsellorId']);
        $date = mysqli_real_escape_string($con, $_POST['date']);
        $time = mysqli_real_escape_string($con, $_POST['time']);
        $counsellorAppointmentId =  mysqli_real_escape_string($con, $_POST['counsellorAppointmentId']);

        $updateCounsellorAppointQuery = "UPDATE counsellorappointment SET orphanId='$orphanId',counsellorId='$counsellorId',date='$date',time='$time' WHERE counsellorAppointmentId='$counsellorAppointmentId'";
        $updateCounsellorAppointResult = mysqli_query($con, $updateCounsellorAppointQuery);
        if($updateCounsellorAppointResult) {
            $_SESSION['success'] = "Counsellor Appointment updated successfully";
            header('Location: counsellor-appointment.php');
        } else {
            array_push($errors, "Error, Could not update the account.");
        }
    }
    // UPDATE DONATION TYPE DETAILS
    if(isset($_POST['updateDonationType'])) {
        $donationTypeId = mysqli_real_escape_string($con, $_POST['donationTypeId']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        
        // CHECK IF USER ALREADY EXISTS
        $checkNameQuery  = "SELECT * FROM donationtype WHERE name='$name' LIMIT 1";
        $checkNameResult = mysqli_query($con, $checkNameQuery);
        $typeName = mysqli_fetch_assoc($checkNameResult);
        if($typeName) {
            if($typeName['name'] == $name ){
                array_push($errors, "Name already exists.");
            }
        }
        if(count($errors) == 0 ){
            $updateTypeQuery = "UPDATE donationtype SET name='$name' WHERE donationTypeId='$donationTypeId'";
            $updateTypeResult = mysqli_query($con, $updateTypeQuery);
            if($updateTypeResult) {
                $_SESSION['success'] = " Donation Type Updated successfully";
                header('Location: donation-type.php');
            } else {
                array_push($errors, "Error, Could not update the account.");
            }
        }
    }  
    
    // UPDATE DONATION
    if(isset($_POST['updateDonation'])) {
        $donationId = mysqli_real_escape_string($con, $_POST['donationId']);
        $donationTypeId = mysqli_real_escape_string($con, $_POST['donationTypeId']);
        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
        $phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $address =  mysqli_real_escape_string($con, $_POST['address']);
        $amount =  mysqli_real_escape_string($con, $_POST['amount']);
        $description =  mysqli_real_escape_string($con, $_POST['description']);

        $updateDonationQuery = "UPDATE donation SET firstName='$firstName',lastName='$lastName',phoneNumber='$phoneNumber',email='$email',address='$address',donationTypeId='$donationTypeId',amount='$amount',description='$description' WHERE donationId='$donationId'";
        $updateDonationResult = mysqli_query($con, $updateDonationQuery);
        if($updateDonationResult) {
            $_SESSION['success'] = "Donation updated successfully";
            header('Location: donation.php');
        } else {
            array_push($errors, "Error, Could not update the account.");
        }
    }


    // UPDATE DONATION
    if(isset($_POST['updateRoom'])) {
        $blockRoomId = mysqli_real_escape_string($con, $_POST['blockRoomId']);
        $blockId = mysqli_real_escape_string($con, $_POST['blockId']);
        $roomNumber = mysqli_real_escape_string($con, $_POST['roomNumber']);

        $roomQuery = "UPDATE blockroom SET blockId='$blockId',roomNumber='$roomNumber' WHERE blockRoomId='$blockRoomId'";
        $roomResult = mysqli_query($con, $roomQuery);
        if($roomResult) {
            $_SESSION['success'] = "Block room updated successfully";
            header('Location: block-room.php');
        } else {
            array_push($errors, "Error, Could not update the account.");
        }
    }



    // UPDATE BLOCK
    if(isset($_POST['updateBlock'])) {
        $image = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];  
        $blockName = mysqli_real_escape_string($con, $_POST['name']);
        $blockId   = mysqli_real_escape_string($con, $_POST['blockId']);
        $totalRoomNumber = mysqli_real_escape_string($con, $_POST['totalRoomNumber']);
        $ageBetween = mysqli_real_escape_string($con, $_POST['ageBetween']);
        move_uploaded_file($tempname, "../uploads/".$image);
        $blockQuery = "UPDATE block SET blockName='$blockName',image='$image',totalRoomNumber='$totalRoomNumber', ageBetween='$ageBetween' WHERE blockId='$blockId'";
        $blockResult = mysqli_query($con, $blockQuery);
        if($blockResult) {
            $_SESSION['success'] = "Block updated successfully";
            header('Location: block.php');
        } else {
            array_push($errors, "Error, Could not update.");
        }
    }

    // UPDATE ACTIVITY CATEGORY
    if(isset($_POST['updateActivityCategory'])) {
        $image = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];  
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $activityCategoryId   = mysqli_real_escape_string($con, $_POST['activityCategoryId']);
        move_uploaded_file($tempname, "../uploads/".$image);
        $activityQuery = "UPDATE activitycategory SET name='$name',image='$image' WHERE activityCategoryId='$activityCategoryId'";
        $activityResult = mysqli_query($con, $activityQuery);
        if($activityResult) {
            $_SESSION['success'] = "Activity Category updated successfully";
            header('Location: activity-category.php');
        } else {
            array_push($errors, "Error, Could not update.");
        }
    }


    // UPDATE ACTIVITY
    if(isset($_POST['updateActivity'])) {
        $file = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"]; 
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $activityCategoryId   = mysqli_real_escape_string($con, $_POST['activityCategoryId']);
        $description   = mysqli_real_escape_string($con, $_POST['description']);
        $activityId   = mysqli_real_escape_string($con, $_POST['activityId']);
        move_uploaded_file($tempname, "../uploads/".$file);
        $activityQuery = "UPDATE activity SET activityCategoryId='$activityCategoryId', name='$name',file='$file',description='$description' WHERE activityId='$activityId'";
        $activityResult = mysqli_query($con, $activityQuery);
        if($activityResult) {
            $_SESSION['success'] = "Activity updated successfully";
            header('Location: activity.php');
        } else {
            array_push($errors, "Error, Could not update.");
        }
    }

    // UPDATE EVENT
    if(isset($_POST['updateEvent'])) {
        $image = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"]; 
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $address   = mysqli_real_escape_string($con, $_POST['address']);
        $description   = mysqli_real_escape_string($con, $_POST['description']);
        $eventId   = mysqli_real_escape_string($con, $_POST['eventId']);
        move_uploaded_file($tempname, "../uploads/".$image);
        $eventQuery = "UPDATE event SET name='$name', image='$image',description='$description',address='$address' WHERE eventId='$eventId'";
        $eventResult = mysqli_query($con, $eventQuery);
        if($eventResult) {
            $_SESSION['success'] = "Event updated successfully";
            header('Location: event.php');
        } else {
            array_push($errors, "Error, Could not update.");
        }
    }

    // UPDATE EVENT
    if(isset($_POST['contactResponse'])) {
        $userId = $_SESSION['userId']; 
        $message = mysqli_real_escape_string($con, $_POST['message']);
        $contactId   = mysqli_real_escape_string($con, $_POST['contactId']);
        $email   = mysqli_real_escape_string($con, $_POST['email']);
        $contactResponseQuery = "INSERT INTO contactresponse (contactId,staffId,message) 
        VALUES ('$contactId','$userId', '$message')";
        $contactResponseResult = mysqli_query($con, $contactResponseQuery);
        if($contactResponseResult) {
            // SEND EMAIL
            // $to = $email;
            // $sub = 'Contact Coms';
            // $msg = $message;
            // $sendEmail = mail($to, $sub, $msg);
            // if($sendEmail) {
                $_SESSION['success'] = "Email has been sent successfully";
                header('Location: contact.php');
            // } else {
            //     array_push($errors, "Error, Could not send email.");
            // }
        } else {
            array_push($errors, "Error, Could not respond.");
        }
    }

    // UPDATE ADMIN PROFILE
    if(isset($_POST['updateAdminProfile'])) {
        $userId = $_SESSION['userId'];
        $firstName= mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName= mysqli_real_escape_string($con, $_POST['lastName']);
        $userName= mysqli_real_escape_string($con, $_POST['userName']);
        $userAddress= mysqli_real_escape_string($con, $_POST['address']);
        $userEmail= mysqli_real_escape_string($con, $_POST['email']);
        $phoneNumber= mysqli_real_escape_string($con, $_POST['phoneNumber']);
        $dob= mysqli_real_escape_string($con, $_POST['dob']);
        $gender= mysqli_real_escape_string($con, $_POST['gender']);
        $blockRoomId= mysqli_real_escape_string($con, $_POST['roomId']);
        $userRole= mysqli_real_escape_string($con, $_POST['isAdmin']);
        $bloodGroup= mysqli_real_escape_string($con, $_POST['bloodGroup']);

        $updateProfileQuery = "UPDATE user SET firstName='$firstName',lastName='$lastName',userName=NULLIF('$userName',''),userEmail='$userEmail'
        ,phoneNumber=NULLIF('$phoneNumber',''),userAddress=NULLIF('$userAddress',''),gender='$gender',dob='$dob',blockRoomId=NULLIF('$blockRoomId',''),
        bloodGroup=NULLIF('$bloodGroup',''),userRole='$userRole' WHERE userId='$userId'";
        $updateProfileResult = mysqli_query($con, $updateProfileQuery);
        if($updateProfileResult) {
            $_SESSION['success'] = "Profile updated successfully";
            header('Location: profile.php');
        } else {
            array_push($errors, "Error, Could not update profile.");
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
                array_push($errors, "Error, Could not change password.");
            }
        } else {
            array_push($errors, "Password do not match");
        }
    }
?>  



