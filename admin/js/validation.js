// CHILD APPROVAL VALIDATION
function childApprovalValidation() {
    var description = document.forms["childApprovalForm"]["description"].value;
    if (description == '') {
        alert("Description is required");
        document.childApprovalForm.description.focus();
        return false;
    }
}

// CHILD TRANSFER VALIDATION
function childTransferValidation() {
    var orphanId = document.forms["childTransferForm"]["orphanId"].value;
    var orphanageName = document.forms["childTransferForm"]["orphanageName"].value;
    var orphanageEmail = document.forms["childTransferForm"]["orphanageEmail"].value;
    var orphanagePhoneNumber1 = document.forms["childTransferForm"]["orphanagePhoneNumber1"].value;
    var orphanagePhoneNumber2 = document.forms["childTransferForm"]["orphanagePhoneNumber2"].value;
    var orphanageWebsite = document.forms["childTransferForm"]["orphanageWebsite"].value;
    var orphanageAddress = document.forms["childTransferForm"]["orphanageAddress"].value;
    if (orphanId == '') {
        alert("Orphan is required");
        document.childTransferForm.orphanId.focus();
        return false;
    } else if (orphanId == '') {
        alert("Orphan is required");
        document.childTransferForm.orphanId.focus();
        return false;
    } else if (orphanageName == '') {
        alert("Orphanage Name is required");
        document.childTransferForm.orphanageName.focus();
        return false;
    } else if (orphanageEmail == '') {
        alert("Orphanage Email is required");
        document.childTransferForm.orphanageEmail.focus();
        return false;
    } else if (orphanagePhoneNumber1 == '') {
        alert(" Orphanage  First Phone Number  is required");
        document.childTransferForm.orphanagePhoneNumber1.focus();
        return false;
    } else if (orphanagePhoneNumber2 == '') {
        alert("Orphanage Second Phone Number is required");
        document.childTransferForm.orphanagePhoneNumber2.focus();
        return false;
    } else if (orphanageWebsite == '') {
        alert("Orphanage Website");
        document.childTransferForm.orphanageWebsite.focus();
        return false;
    } else if (orphanageAddress == '') {
        alert("Orphanage Address is required");
        document.childTransferForm.orphanageAddress.focus();
        return false;
    }
}
// BLOCK VALIDATION
function blockAddValidation() {
    var name = document.forms["blockAddForm"]["name"].value;
    var image = document.forms["blockAddForm"]["image"].value;
    var totalRoomNumber = document.forms["blockAddForm"]["totalRoomNumber"].value;
    var ageBetween = document.forms["blockAddForm"]["ageBetween"].value;
    if (name == '') {
        alert("Name is required");
        document.blockAddForm.name.focus();
        return false;
    } else if (image == '') {
        alert(" Image is required");
        document.blockAddForm.image.focus();
        return false;
    } else if (totalRoomNumber == '') {
        alert("Total Room Number is required");
        document.blockAddForm.totalRoomNumber.focus();
        return false;
    } else if (ageBetween == '') {
        alert("Age Between is required");
        document.blockAddForm.ageBetween.focus();
        return false;
    }

}
// BLOCK ROOM NUMBER
function blockRoomValidation() {
    var blockId = document.forms["blockRoomForm"]["blockId"].value;
    var roomNumber = document.forms["blockRoomForm"]["roomNumber"].value;
    if (blockId == '') {
        alert("Block  is required");
        document.blockRoomForm.blockId.focus();
        return false;
    } else if (roomNumber == '') {
        alert("Room Number is required");
        document.blockRoomForm.roomNumber.focus();
        return false;
    }

}
// USER ADD VALIDATION
function userAddValidation() {
    var firstName = document.forms["userAddForm"]["firstName"].value;
    var lastName  = document.forms["userAddForm"]["lastName"].value;
    var gender    = document.forms["userAddForm"]["gender"].value;
    var dob       =  Date.parse(document.forms["userAddForm"]["dob"].value);
    var role      = document.forms["userAddForm"]["role"].value;
    var password  = document.forms["userAddForm"]["password"].value;
    var conformPassword = document.forms["userAddForm"]["conformPassword"].value;
    var today = new Date();

    if (firstName == '') {
        alert("First Name is required");
        document.userAddForm.firstName.focus();
        return false;
    } else if (lastName == '') {
        alert("Last Name is required");
        document.userAddForm.lastName.focus();
        return false;
    } else if (gender == '') {
        alert("Gender is required");
        document.userAddForm.gender.focus();
        return false;
    } else if(!dob) {
        alert("Date of Birth  is required");
        document.admissionForm.dob.focus();
        return false;
    } else if(dob > today) {
        alert("Date of Birth should not be greater than the current date");
        document.admissionForm.dob.focus();
        return false;
    }  else if (role == '') {
        alert("Role is required");
        document.userAddForm.role.focus();
        return false; 
    } else if (password == '') {
        alert("Enter the Password");
        document.userAddForm.password.focus();
        return false;
    } else if (password.length < 6) {
        alert("Password should not be less than 6 characters");
        document.userAddForm.password.focus();
        return false;
    } else if (conformPassword == '') {
        alert("Conform the Password");
        document.userAddForm.conformPassword.focus();
        return false;
    } else if (password != conformPassword) {
        alert("Passwords do not match");
        document.userAddForm.conformPassword.focus();
        return false;
    }
}
// MEDICAL RECORD ADD
function medicalRecordAddValidation() {
    var userId = document.forms["medicalRecordAddForm"]["userId"].value;
    var medicalCondition = document.forms["medicalRecordAddForm"]["medicalCondition"].value;
    var description = document.forms["medicalRecordAddForm"]["description"].value;

    if (userId == '') {
        alert("User is required");
        document.medicalRecordAddForm.userId.focus();
        return false;
    } else if (medicalCondition == '') {
        alert("Medical Condition is required");
        document.medicalRecordAddForm.medicalCondition.focus();
        return false;
    } else if (description == '') {
        alert("Description is required");
        document.medicalRecordAddForm.description.focus();
        return false;
    }
}

// CONSEILOR RECORD ADD
function counsellorAddValidation() {
    var staffId = document.forms["counsellorAddForm"]["staffId"].value;
    var workTime = document.forms["counsellorAddForm"]["workTime"].value;
    var workDate = document.forms["counsellorAddForm"]["workDate"].value;

    if (staffId == '') {
        alert("Staff is required");
        document.counsellorAddForm.staffId.focus();
        return false;
    } else if (workTime == '') {
        alert("Work time is required");
        document.counsellorAddForm.workTime.focus();
        return false;
    } else if (workDate == '') {
        alert("Work date is required");
        document.counsellorAddForm.workDate.focus();
        return false;
    }
}

// CONSEILOR AAPOINTMENT ADD
function counsellorAddAppointmentValidation() {
    var orphanId = document.forms["counsellorAddAppointmentForm"]["orphanId"].value;
    var counsellorId = document.forms["counsellorAddAppointmentForm"]["counsellorId"].value;
    var date = document.forms["counsellorAddAppointmentForm"]["date"].value;
    var time = document.forms["counsellorAddAppointmentForm"]["time"].value;

    if (orphanId == '') {
        alert("Orphan is required");
        document.counsellorAddAppointmentForm.orphanId.focus();
        return false;
    } else if (counsellorId == '') {
        alert("Counsellor  is required");
        document.counsellorAddAppointmentForm.counsellorId.focus();
        return false;
    } else if (date == '') {
        alert("Date is required");
        document.counsellorAddAppointmentForm.date.focus();
        return false;
    } else if (time == '') {
        alert("Time is required");
        document.counsellorAddAppointmentForm.time.focus();
        return false;
    }
}


// DONATION TYPE ADD
function donationTypeAddValidation() {
    var name = document.forms["donationTypeAddForm"]["name"].value;

    if (name == '') {
        alert("Name is required");
        document.donationTypeAddForm.name.focus();
        return false;
    }
}
// DONATION ADD VALIDATION
function donationAddValidation() {
    var firstName = document.forms["donationAddForm"]["firstName"].value;
    var lastName = document.forms["donationAddForm"]["lastName"].value;
    var phoneNumber = document.forms["donationAddForm"]["phoneNumber"].value;
    var email = document.forms["donationAddForm"]["email"].value;
    var address = document.forms["donationAddForm"]["address"].value;
    var donationTypeId = document.forms["donationAddForm"]["donationTypeId"].value;
    if (firstName == '') {
        alert("First Name is required ");
        document.donationAddForm.firstName.focus();
        return false;
    } else if (lastName == '') {
        alert("Last  Name is required ");
        document.donationAddForm.lastName.focus();
        return false;
    } else if (phoneNumber == '') {
        alert("Phone Number is required ");
        document.donationAddForm.phoneNumber.focus();
        return false;
    } else if (email == '') {
        alert("Email is required ");
        document.donationAddForm.email.focus();
        return false;
    } else if (address == '') {
        alert("Address is required ");
        document.donationAddForm.address.focus();
        return false;
    } else if (donationTypeId == '') {
        alert("Donation Type  is required ");
        document.donationAddForm.donationTypeId.focus();
        return false;
    }
}


// ACTIVITY TYPE ADD
function activityCategoryAddValidation() {
    var name = document.forms["activityCategoryAddForm"]["name"].value;
    var image = document.forms["activityCategoryAddForm"]["image"].value;

    if (name == '') {
        alert("Name is required");
        document.activityCategoryAddForm.name.focus();
        return false;
    }else if(image == '') {
        alert("Image is required");
        document.activityCategoryAddForm.image.focus();
        return false; 
    }
}

// ACTIVITY  ADD
function activityAddValidation() {
    var name = document.forms["activityAddForm"]["name"].value;
    var activityCategoryId = document.forms["activityAddForm"]["activityCategoryId"].value;
    var description = document.forms["activityAddForm"]["description"].value;

    if(activityCategoryId == '') {
        alert("Activity Category  is required");
        document.activityAddForm.activityCategoryId.focus();
        return false; 
    } else if (name == '') {
        alert("Name is required");
        document.activityAddForm.name.focus();
        return false;
    } else if(description == '') {
        alert("Description is required");
        document.activityAddForm.description.focus();
        return false; 
    }
}


// EVENT  ADD
function eventAddValidation() {
    var name = document.forms["eventAddForm"]["name"].value;
    var address = document.forms["eventAddForm"]["address"].value;
    var date = document.forms["eventAddForm"]["date"].value;
    var time = document.forms["eventAddForm"]["time"].value;
    var description = document.forms["eventAddForm"]["description"].value;

    if(name == '') {
        alert("Name  is required");
        document.eventAddForm.name.focus();
        return false; 
    } else if (address == '') {
        alert("Address is required");
        document.eventAddForm.address.focus();
        return false;
    }else if(date == ''){
        alert("Date is required");
        document.eventAddForm.date.focus();
        return false; 
    } else if(time == ''){
        alert("Time is required");
        document.eventAddForm.time.focus();
        return false; 
    } else if(description == '') {
        alert("Description is required");
        document.eventAddForm.description.focus();
        return false; 
    }

}


// CONTACT  ADD
function contactResponseValidation() {
    var message = document.forms["contactResponseForm"]["message"].value;

    if(message == '') {
        alert("Please type something");
        document.contactResponseForm.message.focus();
        return false; 
    } 

}


// HELP  ADD
function helpResponseValidation() {
    var message = document.forms["helpResponseForm"]["message"].value;

    if(message == '') {
        alert("Please type something");
        document.contactResponseForm.message.focus();
        return false; 
    } 

}



// HELP  ADD
function profileValidation() {
    var firstName = document.forms["profileForm"]["firstName"].value;
    var lastName = document.forms["profileForm"]["lastName"].value;
    var address = document.forms["profileForm"]["address"].value;
    var email = document.forms["profileForm"]["email"].value;
    var phoneNumber = document.forms["profileForm"]["phoneNumber"].value;
    var dob = Date.parse(document.forms["profileForm"]["dob"].value);
    var gender = document.forms["profileForm"]["gender"].value;
    var roomId = document.forms["profileForm"]["roomId"].value;
    var isAdmin = document.forms["profileForm"]["isAdmin"].value;
    var today = new Date();

    if(firstName == '') {
        alert("First Name is required");
        document.profileForm.firstName.focus();
        return false; 
    } else if(lastName == '') {
        alert("Last Name is required");
        document.profileForm.lastName.focus();
        return false; 
    } else if(address == '') {
        alert("Address is required");
        document.profileForm.address.focus();
        return false; 
    } else if(email == '') {
        alert("Email is required");
        document.profileForm.email.focus();
        return false; 
    } else if(phoneNumber == '') {
        alert("Phone Number is required");
        document.profileForm.phoneNumber.focus();
        return false; 
    } else if(!dob) {
        alert("Date of Birth  is required");
        document.admissionForm.dob.focus();
        return false;
    } else if(dob > today) {
        alert("Date of Birth should not be greater than the current date");
        document.admissionForm.dob.focus();
        return false;
    }  else if(gender == '') {
        alert("Gender is required");
        document.profileForm.gender.focus();
        return false; 
    }  else if(roomId == '') {
        alert("Room Number is required");
        document.profileForm.roomId.focus();
        return false; 
    }  else if(isAdmin == '') {
        alert("Is Admin is required");
        document.profileForm.isAdmin.focus();
        return false; 
    } 

}

// CHANGE PASSWORD
function changePasswordValidation() {
    var oldPassword = document.forms["changePasswordForm"]["oldPassword"].value;
    var newPassword = document.forms["changePasswordForm"]["newPassword"].value;
    var confirmNewPassword = document.forms["changePasswordForm"]["confirmNewPassword"].value;
    if(oldPassword == '') {
        alert("Please enter Old Password");
        document.changePasswordForm.oldPassword.focus();
        return false;
    }else if(newPassword == '') {
        alert("Please enter New  Password");
        document.changePasswordForm.newPassword.focus();
        return false; 
    } else if(newPassword.length < 6 ) {
        alert("Password should be greater than 6 charaters");
        document.changePasswordForm.newPassword.focus();
        return false; 
    }else if(confirmNewPassword == '') {
        alert("Please enter Confirm  Password");
        document.changePasswordForm.confirmNewPassword.focus();
        return false;  
    }else if (newPassword != confirmNewPassword) {
        alert("Password do not match");
        document.changePasswordForm.confirmNewPassword.focus();
        return false;
    }

}

