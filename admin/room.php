<th>Husband First Name</th>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Side Navigation Bar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <div class="wrapper">
    <?php include("header.php")?>
        <div class="main_content">
            <div class="header" style="color: red; font-size: 20px;">Room
                <button style="background-color:olivedrab; padding: 10px;float: right;margin-top: -10px;" >
                    <a href="#" style="color: white;">Add Rooms</a>  
                  </button> 
            </div>
            <div class="info">
                <table>
                    <tr>
                        <td>Block Name</td>
                        <td>Room Number</td> 
                        <td>Date</td>
                        
                    </tr>
                    <tr>
                        <td>Saint Joseph</td>
                        <td>01</td>
                        <td>22/01/2020</td>
                    </tr>
                    <tr>
                        <td>Saint Joseph</td>
                        <td>02</td>
                        <td>01/01/2020</td>
                    </tr>
                    <tr>
                        <td>Saint Joseph</td>
                        <td>03</td>
                      <td>01/01/2020</td>
                    </tr>
                   
                </table>

            </div>
        </div>
    </div>
</body>
</html>