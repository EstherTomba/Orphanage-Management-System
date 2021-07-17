// LOGIN INPUT VALIDATION
function loginValidation() {
    var userEmail = document.forms["loginForm"]["userEmail"].value;
    var userPassword = document.forms["loginForm"]["userPassword"].value;
    if (userEmail == '') {
        alert("Email is required.");
        document.loginForm.userEmail.focus();
        return false;
    } else if (userPassword == '') {
        alert("Password is required.");
        document.loginForm.userPassword.focus();
        return false;
    }
}

// RESET PASSWORD VALIDATION
function restPasswordValidation() {
    var userEmail = document.forms["resetPasswordForm"]["userEmail"].value;
    if (userEmail == '') {
        alert("Email is required");
        document.resetPasswordForm.userEmail.focus();
        return false;
    }
}
// CONTACT VALIDATION
function contactValidation() {
    var firstName = document.forms["contactForm"]["firstName"].value;
    var lastName = document.forms["contactForm"]["lastName"].value;
    var email = document.forms["contactForm"]["email"].value;
    var phoneNumber = document.forms["contactForm"]["phoneNumber"].value;
    var subject = document.forms["contactForm"]["subject"].value;
    var message = document.forms["contactForm"]["message"].value;
    if (firstName == '') {
        alert("First Name is required");
        document.contactForm.firstName.focus();
        return false;
    } else if (lastName == '') {
        alert("Last Name is required");
        document.contactForm.lastName.focus();
        return false;
    } else if (email == '') {
        alert("Email is required");
        document.contactForm.email.focus();
        return false;
    } else if (phoneNumber == '') {
        alert("Phone Number is required");
        document.contactForm.phoneNumber.focus();
        return false;
    } else if (subject == '') {
        alert("Subject is required");
        document.contactForm.subject.focus();
        return false;
    } else if (message == '') {
        alert("Please write your message here");
        document.contactForm.message.focus();
        return false;
    }
}
// ADMISSION VALIDATION
function admissionValidation() {
    var applicantFirstName = document.forms["admissionForm"]["applicantFirstName"].value;
    var applicantLastName = document.forms["admissionForm"]["applicantLastName"].value;
    var email = document.forms["admissionForm"]["email"].value;
    var applicantPhoneNumber = document.forms["admissionForm"]["applicantPhoneNumber"].value;
    var applicantAddress = document.forms["admissionForm"]["applicantAddress"].value;
    var applicantID = document.forms["admissionForm"]["applicantID"].value;
    var childFirstName = document.forms["admissionForm"]["childFirstName"].value;
    var childLastName = document.forms["admissionForm"]["childLastName"].value;
    var gender = document.forms["admissionForm"]["gender"].value;
    var bloodGroup = document.forms["admissionForm"]["bloodGroup"].value;
    var message = document.forms["admissionForm"]["message"].value;
    var dob = Date.parse(document.forms["admissionForm"]["dob"].value);
    var today = new Date();
    if(applicantFirstName == '') {
        alert("Applicant First Name is required");
        document.admissionForm.applicantFirstName.focus();
        return false; 
    } else if(applicantLastName == '') {
        alert("Applicant Last Name is required");
        document.admissionForm.applicantLastName.focus();
        return false; 
    } else if(email == '') {
        alert("Email is required");
        document.admissionForm.email.focus();
        return false; 
    } else if(applicantPhoneNumber == '') {
        alert("Applicant Phone Number is required");
        document.admissionForm.applicantPhoneNumber.focus();
        return false; 
    } else if(applicantAddress == '') {
        alert("Applicant Address  is required");
        document.admissionForm.applicantAddress.focus();
        return false;
    } else if(applicantID == '') {
        alert("ID or Passport Number is required");
        document.admissionForm.file.focus();
        return false; 
    } else if(childFirstName == '') {
        alert("Child First Name  is required");
        document.admissionForm.childFirstName.focus();
        return false; 
    } else if(childLastName == '') {
        alert("Child Last Name  is required");
        document.admissionForm.childLastName.focus();
        return false;
    } else if(!dob) {
        alert("Date of Birth  is required");
        document.admissionForm.dob.focus();
        return false;
    } else if(dob > today) {
        alert("Date of Birth should not be greater than the current date");
        document.admissionForm.dob.focus();
        return false;
    } else if(gender == '') {
        alert("Gender  is required");
        document.admissionForm.gender.focus();
        return false; 
    } else if(bloodGroup == '') {
        alert("Blood Group  is required");
        document.admissionForm.bloodGroup.focus();
        return false; 
    }else if(message == '') {
        alert("Please write your message here");
        document.admissionForm.message.focus();
        return false; 
    }
}
// DONATION VALIDATION
function donationValidation() {
    var firstName = document.forms["donationtForm"]["firstName"].value;
    var lastName = document.forms["donationtForm"]["lastName"].value;
    var email = document.forms["donationtForm"]["email"].value;
    var phoneNumber = document.forms["donationtForm"]["phoneNumber"].value;
    var address = document.forms["donationtForm"]["address"].value;
    var donationTypeId = document.forms["donationtForm"]["donationTypeId"].value;
    var amount = document.forms["donationtForm"]["amount"].value;
    var description = document.forms["donationtForm"]["description"].value;
    if (firstName == '') {
        alert("First Name is required");
        document.donationtForm.firstName.focus();
        return false;
    } else if (lastName == '') {
        alert("Last Name is required");
        document.donationtForm.lastName.focus();
        return false;
    } else if (email == '') {
        alert("Email is required");
        document.donationtForm.email.focus();
        return false;
    } else if (phoneNumber == '') {
        alert("Phone Number is required");
        document.donationtForm.phoneNumber.focus();
        return false;
    } else if (address == '') {
        alert("Address is required");
        document.donationtForm.address.focus();
        return false;
    } else if (donationTypeId == '') {
        alert("Donation Type is required");
        document.donationtForm.donationTypeId.focus();
        return false;
    } else if (amount == '') {
        alert("Amount is required");
        document.donationtForm.amount.focus();
        return false;
    } else if (description == '') {
        alert("Description write your message here");
        document.donationtForm.description.focus();
        return false;
    }
}


function showProfileLogout() {
    var ProfileLogoutList = document.getElementById("ProfileLogoutList");
    if (ProfileLogoutList.style.display === "block") {
        ProfileLogoutList.style.display = "none";
    } else {
        ProfileLogoutList.style.display = "block";
    }
}