<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Child Approval || Coms</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Child Approvals 
            </div>
            <div class="info">
                <form  name="childApprovalForm" method="POST" onsubmit="return childApprovalValidation()">

                    <div>
                        <select name="approvalId" id="approvalId">
                            <option value="">Select Approval</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                    </div>

                    <div>
                    
                        <select name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="1">Approved</option>
                            <option value="1">Reject</option>
                            <option value="1">Pending</option>
                          </select>
                    </div>
                    
                    <div>
                        <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                    </div>

                    <div>
                        <input type="submit" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

<script src="js/validation.js"></script>



</html>