// LOGIN INPUT VALIDATION
function loginValidation() {
    var userEmail = document.forms["loginForm"]["userEmail"].value;
    var userPassword = document.forms["loginForm"]["userPassword"].value;
    if(userEmail == '') {
        alert( "Email is required." );
        document.loginForm.userEmail.focus() ;
        return false;
    } else if(userPassword =='') {
        alert("Password is required.");
        document.loginForm.userPassword.focus() ;
        return false;
    }
}

// RESET PASSWORD VALIDATION
function restPasswordValidation() {
    var userEmail= document.forms["resetPasswordForm"]["userEmail"].value;
    if(userEmail=='')
    {
        alert("Email is required");
        document.resetPasswordForm.userEmail.focus();
        return false;
    }
}

function contactValidation() {
    alert("hello");
}