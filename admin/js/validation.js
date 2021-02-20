// CHILD APPROVAL VALIDATION
function childApprovalValidation() {
    var approvalId= document.forms["childApprovalForm"]["approvalId"].value;
    var status = document.forms["childApprovalForm"]["status"].value;
    var description = document.forms["childApprovalForm"]["description"].value;
    if (approvalId == '') {
        alert("Approval is required");
        document.childApprovalForm.approvalId.focus() ;
        return false;
    } else if(status== '') {
        alert("Status is required");
        document.childApprovalForm.status.focus() ;
        return false;
    } else if(description== '') {
        alert("Description is required");
        document.childApprovalForm.description.focus() ;
        return false;
    }
}

// CHILD TRANSFER VALIDATION
function childTransferValidation() {
    var  orphanId= document.forms["childTransferForm"]["orphanId"].value;
    var  orphanageName= document.forms["childTransferForm"]["orphanageName"].value;
    var  orphanageEmail= document.forms["childTransferForm"]["orphanageEmail"].value;
    var  orphanagePhoneNumber1= document.forms["childTransferForm"]["orphanagePhoneNumber1"].value;
    var  orphanagePhoneNumber2= document.forms["childTransferForm"]["orphanagePhoneNumber2"].value;
    var  orphanageWebsite= document.forms["childTransferForm"]["orphanageWebsite"].value;
    var  orphanageAddress= document.forms["childTransferForm"]["orphanageAddress"].value;
    if(orphanId == '') {
        alert("Orphan is required");
        document.childTransferForm.orphanId.focus();
        return false;
    } else if(orphanId == '') {
        alert("Orphan is required");
        document.childTransferForm.orphanId.focus();
        return false;
    } else if(orphanageName == '') {
        alert("Orphanage Name is required");
        document.childTransferForm.orphanageName.focus();
        return false;
    } else if (orphanageEmail == '') {
        alert("Orphanage Email is required");
        document.childTransferForm.orphanageEmail.focus();
        return false;
    } else if(orphanagePhoneNumber1 == '') {
        alert(" Orphanage  First Phone Number  is required");
        document.childTransferForm.orphanagePhoneNumber1.focus();
        return false;
    } else if(orphanagePhoneNumber2 == '') {
        alert("Orphanage Second Phone Number is required");
        document.childTransferForm.orphanagePhoneNumber2.focus();
        return false;
    } else if(orphanageWebsite == '') {
        alert("Orphanage Website");
        document.childTransferForm.orphanageWebsite.focus();
        return false;
    } else if(orphanageAddress == ''){
        alert("Orphanage Address is required");
        document.childTransferForm.orphanageAddress.focus();
        return false;
    }
}
// BLOCK VALIDATION
function blockAddValidation() {
   var  blockName= document.forms["blockAddForm"]["blockName"].value; 
   var  file= document.forms["blockAddForm"]["file"].value; 
   var  totalRoomNumber= document.forms["blockAddForm"]["totalRoomNumber"].value; 
   var  ageBetween= document.forms["blockAddForm"]["ageBetween"].value; 
if(blockName == '') {
    alert("Block Name is required");
    document.blockAddForm.blockName.focus();
    return false;
}else if(file == '') {
alert(" File is required");
document.blockAddForm.file.focus();
return false;

} else if(totalRoomNumber == '') {
    alert("Total Room Number is required");
    document.blockAddForm.totalRoomNumber.focus();
    return false;
}else if(ageBetween == '') {
    alert("Age Between is required");
    document.blockAddForm.ageBetween.focus();
    return false;
}

}
// BLOCK ROOM NUMBER
function blockRoomValidation() {
    var  roomNumber= document.forms["blockRoomForm"]["roomNumber"].value;
    if(roomNumber == '') {
        alert("Room Number is required");
        document.blockRoomForm.roomNumber.focus();
        return false;
    }

}
// USER ADD VALIDATION
function userAddValidation() {
   var  firstName= document.forms["userAddForm"]["firstName"].value;
   var  lastName= document.forms["userAddForm"]["lastName"].value;
   var  userName= document.forms["userAddForm"]["userName"].value;
   var  email= document.forms["userAddForm"]["email"].value;
   var  phoneNumber= document.forms["userAddForm"]["phoneNumber"].value;
   var  address= document.forms["userAddForm"]["address"].value;
   var  gender= document.forms["userAddForm"]["gender"].value;
   var  date= document.forms["userAddForm"]["date"].value;
   var  roomId= document.forms["userAddForm"]["roomId"].value;
   var  bloodGroup= document.forms["userAddForm"]["bloodGroup"].value;
   var  isAdmin= document.forms["userAddForm"]["isAdmin"].value;
   var  isStaff= document.forms["userAddForm"]["isStaff"].value;
   var  password= document.forms["userAddForm"]["password"].value;
   var  conformPassword= document.forms["userAddForm"]["conformPassword"].value;
  
if(firstName == '') {
    alert("First Name is required");
    document.blockRoomForm.firstName.focus();
        return false;

}else if(lastName == '') {
    alert("Last Name is required");
    document.blockRoomForm.lastName.focus();
    return false;
}else if(userName == '') {
    alert("User Name is required");
    document.blockRoomForm.userName.focus();
        return false; 
}else if(email == '') {
    alert("Email is required");
    document.blockRoomForm.email.focus();
        return false;
}else if(phoneNumber == '') {
    alert("Phone Number is required");
    document.blockRoomForm.phoneNumber.focus();
        return false;   
}else if(address == '') {
    alert("Address is required");
    document.blockRoomForm.address.focus();
        return false;     
}else if(gender == '') {
    alert("Gender is required");
    document.blockRoomForm.gender.focus();
        return false;     
}else if(date == '') {
    alert("Date is required");
    document.blockRoomForm.date.focus();
        return false; 
}else if(roomId == '') {
    alert("Room Id is required");
    document.blockRoomForm.roomId.focus();
        return false; 
}else if(bloodGroup == '') {
    alert("Blood Group is required");
    document.blockRoomForm.bloodGroup.focus();
        return false;   
}else if(isAdmin == '') {
    alert("Select the Admin");
    document.blockRoomForm.isAdmin.focus();
        return false; 
}else if(isStaff == '') {
    alert("Select the Staff");
    document.blockRoomForm.isStaff.focus();
    return false;  
}else if(password == '') {
    alert("Enter the Password");
    document.blockRoomForm.password.focus();
    return false; 
}else if(conformPassword == '') {
    alert("Conform the Password");
    document.blockRoomForm.conformPassword.focus();
    return false; 
}
}
// MEDICAL RECORD ADD
function medicalRecordAddValidation() {
    var  medicalCondition= document.forms["userAddForm"]["medicalCondition"].value;
    var  description= document.forms["userAddForm"]["description"].value;
    if(medicalRecordName == '') {
        alert("User Name is required");
        document.blockRoomForm.medicalRecordName.focus();
        return false; 
    }else if(medicalCondition == '') {
        alert("Medical Condition is required");
        document.blockRoomForm.medicalCondition.focus();
        return false; 
    }

}



