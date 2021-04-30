<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Medical Record</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Add Medical Record
            </div>
            <div class="info">
                <form  name="medicalRecordAddForm" method="POST" onsubmit="return medicalRecordAddValidation()">
                   <div>
                       <select name="userId" id="userId">
                           <option value="">Select User</option>
                           <option value="1">Newton</option>
                           <option value="2">Karanja</option>
                       </select>
                   </div>
                   
                  <div>
                    <textarea name="medicalCondition" id="medicalCondition" cols="30" rows="10" placeholder="Medical Condition"></textarea>
                  </div>
                  <div>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                  </div>
     
                   <div>
                       <input type="submit" value="Save">
                   </div>
               </form>

            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>