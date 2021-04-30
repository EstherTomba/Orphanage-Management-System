<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Orphan Transfer || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Orphan Transfer 
            </div>
            <div class="info">
             
                <form  name="childTransferForm" method="POST" onsubmit="return childTransferValidation()">
                    <div>
                        <select name="orphanId" id="orphanid">
                            <option value="">Select an Orphan</option>
                            <option value="1">Joseph Mwangi</option>
                            <option value="2">Caroline Songa</option>
                            <option value="3">Charles Boromeo</option>

                        </select>
                    </div>

                    <div>
                        <input type="text" name="orphanageName" id="orphanageName" placeholder="Orphanage Name">
                    </div>
                    <div>
                        <input type="email" name="orphanageEmail" id="orphanageEmail" placeholder="Orphanage Email">
                    </div>
                    <div>
                        <input type="text" name="orphanagePhoneNumber1" id="orphanagePhoneNumber1" placeholder="Orphanage Phone Number 1">
                    </div>
                    <div>
                        <input type="text" name="orphanagePhoneNumber2" id="orphanagePhoneNumber2"   placeholder="Orphanage Phone Number 2">
                    </div>
                    <div>
                        <input type="text" name="orphanageWebsite" id="orphanageWebsite"  placeholder="Orphanage Website">
                    </div>
                    <div>
                        <input type="text" name="orphanageAddress" id="orphanageAddress"  placeholder="Orphanage Address">
                    </div>
                    
                    <div>
                        <input type="submit" value="Transfer">  
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>