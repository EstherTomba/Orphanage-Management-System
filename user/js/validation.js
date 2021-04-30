
// NEW APPOINTMENT
function newAppointmentValidation() {
    var counsellorName = document.forms["newAppointmentForm"]["counsellorName"].value;
    var date = document.forms["newAppointmentForm"]["date"].value;
    var time = document.forms["newAppointmentForm"]["time"].value;
    if(counsellorName == '') {
        alert("Counsellor is required");
        document.newAppointmentForm.counsellorName.focus() ;
        return false;
    }else if(date == '') {
        alert("Date is required");
        document.newAppointmentForm.date.focus() ;
        return false;
    }else if(time == '') {
        alert("Time is required");
        document.newAppointmentForm.time.focus() ;
        return false;
    }
} 

function profileValidation() {
    var fname = document.forms["profileForm"]["fname"].value;
    var lname = document.forms["profileForm"]["lname"].value;
    var uname = document.forms["profileForm"]["uname"].value;
    var email = document.forms["profileForm"]["email"].value;
    var address = document.forms["profileForm"]["address"].value;
    var pnumber = document.forms["profileForm"]["pnumber"].value;
    
    if(fname == '') {
        alert("First Name is required");
        document.profileForm.fname.focus() ;
        return false;  
    }else if(lname == '') {
        alert("Last Name is required");
        document.profileForm.lname.focus() ;
        return false;   
    }else if(lname == '') {
        alert("Last Name is required");
        document.profileForm.lname.focus() ;
        return false;  
    }else if(uname == '') {
        alert("User Name is required");
        document.profileForm.uname.focus() ;
        return false;
    }else if(email == '') {
        alert("Email is required");
        document.profileForm.email.focus() ;
        return false;
    }else if(address == '') {
        alert("Address is required");
        document.profileForm.address.focus() ;
        return false; 
    }else if(pnumber == '') {
        alert("Phone Number is required");
        document.profileForm.pnumber.focus() ;
        return false; 
    }
}
// CONTACT  ADD
function contactAdminValidation() {
    var message = document.forms["contactAdminForm"]["message"].value;

    if(message == '') {
        alert("Please type something");
        document.contactAdminForm.message.focus();
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

