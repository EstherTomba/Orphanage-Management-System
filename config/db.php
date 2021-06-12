<?php
    session_start();
    $errors = array();

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "coms";
    include('mpesa-functions.php');
    // Create connection
    $con = mysqli_connect($host, $user, $password,$dbname);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //USER LOGIN
    if(isset($_POST['userLogin'])){
        $userEmail     = mysqli_real_escape_string($con, $_POST['userEmail']);
        $userPassword  = mysqli_real_escape_string($con, $_POST['userPassword']);
        $hashedPassword = crypt($userPassword, "salt@#.com");

        $query  = "SELECT * FROM user WHERE userEmail='$userEmail' AND userPassword='$hashedPassword' LIMIT 1";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) == 1){
            $userData = mysqli_fetch_assoc($result);
            if($userData['userRole']    == 'Admin'){
                $_SESSION['isAdmin']   = $userData['userRole'];
                $_SESSION['userId']    = $userData['userId'];
                $_SESSION['userEmail'] = $userData['userEmail'];
                header('Location: admin/index.php');
            } else if($userData['userRole']    == 'Staff') {
                $_SESSION['isStaff']   = $userData['userRole'];
                $_SESSION['userId']     = $userData['userId'];
                $_SESSION['userEmail']  = $userData['userEmail'];
                header('Location: user/index.php');
            }  else if($userData['userRole']    == 'Orphan') {
                $_SESSION['isOrphan']   = $userData['Orphan'];
                $_SESSION['userId']     = $userData['userId'];
                $_SESSION['userEmail']  = $userData['userEmail'];
                header('Location: user/index.php');
            } else {
                array_push($errors,"Wrong email/password combination.");
            }
        } else {
            array_push($errors,"Wrong email/password combination.");
        }
    }
    // CONTACT
    if(isset($_POST['contact'])) {
        $firstName= mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName= mysqli_real_escape_string($con, $_POST['lastName']);
        $email= mysqli_real_escape_string($con, $_POST['email']);
        $phoneNumber= mysqli_real_escape_string($con, $_POST['phoneNumber']);
        $subject= mysqli_real_escape_string($con, $_POST['subject']);
        $message= mysqli_real_escape_string($con, $_POST['message']);
        $contactQuery = "INSERT INTO contact (firstName,lastName,email,phoneNumber,subject,message) VALUES
            ('$firstName', '$lastName','$email','$phoneNumber','$subject','$message')";
            $contactResult= mysqli_query($con, $contactQuery);
            if($contactResult) {
                // SEND EMAIL
                // $to = $email;
                // $sub = 'Contact Coms';
                // $msg = $message;
                // $sendEmail = mail($to, $sub, $msg);
                // if($sendEmail) {
                $_SESSION['success']= "Message has been sent successfully, we will get back to you soon as possible.";
                // } else {
                //     array_push($errors, "Error, Could not send email.");
                // }
            } else {
                array_push($erreors,"We could not send your message");
            }
    }


    // DONATION
    if(isset($_POST['addDonation'])) {
        $firstName= mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName= mysqli_real_escape_string($con, $_POST['lastName']);
        $email= mysqli_real_escape_string($con, $_POST['email']);
        $phoneNumber= mysqli_real_escape_string($con, $_POST['phoneNumber']);
        $address= mysqli_real_escape_string($con, $_POST['address']);
        $donationTypeId= mysqli_real_escape_string($con, $_POST['donationTypeId']);
        $amount= mysqli_real_escape_string($con, $_POST['amount']);
        $description= mysqli_real_escape_string($con, $_POST['description']);
        $acc_ref= mysqli_real_escape_string($con, $_POST['acc_ref']);
        $transaction_description= mysqli_real_escape_string($con, $_POST['transaction_description']);

        $mpesa = new Mpesa();
        $mpesa_payment = $mpesa->_STKPush(1,$phoneNumber,$acc_ref,$transaction_description);
        // sleep(10);
        $donationQuery = "INSERT INTO donation (firstName,lastName,phoneNumber,email,address,donationTypeId,amount,description) VALUES
        ('$firstName', '$lastName','$phoneNumber','$email','$address','$donationTypeId',NULLIF('$amount',''), NULLIF('$description',''))";
        $donationResult= mysqli_query($con, $donationQuery);
        if($donationResult) {
            $_SESSION['success']= "Your transaction has been done successfully. \nThank you for your help.";
        }else {
            array_push($errors,"We could not send your message");
        }
    }

    // ADMISSION
    if(isset($_POST['admission'])) {
        $applicantFirstName= mysqli_real_escape_string($con, $_POST['applicantFirstName']);
        $applicantLastName= mysqli_real_escape_string($con, $_POST['applicantLastName']);
        $applicantEmail= mysqli_real_escape_string($con, $_POST['email']);
        $applicantPhoneNumber= mysqli_real_escape_string($con, $_POST['applicantPhoneNumber']);
        $applicantAddress= mysqli_real_escape_string($con, $_POST['applicantAddress']); 
        $applicantID= mysqli_real_escape_string($con, $_POST['applicantID']); 
        $childFirstName= mysqli_real_escape_string($con, $_POST['childFirstName']); 
        $childLastName= mysqli_real_escape_string($con, $_POST['childLastName']); 
        $childDOB= mysqli_real_escape_string($con, $_POST['dob']); 
        $childGender= mysqli_real_escape_string($con, $_POST['gender']); 
        $childBloodGroup= mysqli_real_escape_string($con, $_POST['bloodGroup']); 
        $description= mysqli_real_escape_string($con, $_POST['message']); 
        $admissionQuery= "INSERT INTO  childadmission(applicantFirstName,applicantLastName, applicantEmail,applicantPhoneNumber,
            applicantAddress, applicantID, childFirstName, childLastName,childDOB, childGender, childBloodGroup, description) 
            VALUES('$applicantFirstName','$applicantLastName','$applicantEmail','$applicantPhoneNumber',
            '$applicantAddress','$applicantID','$childFirstName','$childLastName','$childDOB','$childGender','$childBloodGroup','$description')";
        $admissionResult= mysqli_query($con, $admissionQuery);
        if($admissionResult) {
            $_SESSION['success']= "Your request has been sent successfully, we will get  back to you as soon as possible.";
        }else {
            array_push($errors,"Sorry, your request  has not been sent. Please try again.");
        }
    } 
    


      



?>