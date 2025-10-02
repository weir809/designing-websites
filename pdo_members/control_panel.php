<?php
//Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
session_start();
if(!isset($_SESSION['myusername'])){
header("location:main_login.php");
}
$myusername = $_SESSION['myusername'];
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <script src="js/login.js" type="text/javascript"></script>
        <title>Control Panel</title>
        <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap css -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class = 'container'>
            <div class = 'header-left'>
            <h3>Member Control Panel</h3>
            Login Successful
            </div>
            <div class = 'header-right'>
                <p>Logged in as <?php echo "$myusername"?></p>
                <a href = 'logout.php'>Logout</a>
            </div>
            <hr/>
            <div class ='centre'>
                <a href = 'newMember.html'>Add New Member</a>
            </div>
            <div class ='centre'>
                <a href = 'selectUpdateMember.php'>Select Member to Update</a>
            </div>
            <div class ='centre'>
                <a href = 'selectMemberDelete.php'>Select Member to Delete</a>
            </div>

        </div>
    </body>
</html>
