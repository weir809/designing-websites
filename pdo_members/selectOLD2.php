<?php
//Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_start();
if(!isset($_SESSION['myusername'])){
header("location:main_login.php");
}
?>
<!DOCTYPE html>

<html lang = "en">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <script src="js/login.js" type="text/javascript"></script>
<!--        <link href="css/bootstrap.min.css" rel="stylesheet"> -->
	    <link rel="stylesheet" type="text/css" href="css/rows.css" />
        <title>Select</title>
	</head>

<body>
    <div class = 'container-fluid'>
        <?php
        global $db;
        //connect to db
        require_once 'DB_connect.php';

        echo "<div class='container'>";
        echo "<h3>Select Member ID to Delete from Database</h3>";
        //form to send to deleteMember.php
            echo "<form action='deleteMember.php' method='get' name='deleteForm'>";
            echo "<div class='table'>
                    <div class='title'>
                        <p>Member List</p>
                    </div>
                    <div class='heading'>
                        <div class='cell'>
                            <p>Member ID</p>
                        </div>
                        <div class='cell'>
                            <p>Member Name</p>
                        </div>
                    </div>";//end heading

            //select members and id to display in table rows
            foreach($db->query('SELECT * FROM members') as $row) {
            echo "<div class= 'row'>
            <div class='cell'><a onclick='return confirm_delete()' href='deleteMember.php?id=".$row['id']."&username=".$row['username']."'>".$row['id']."</a></div>
            <div class='cell'>".$row['username']."</div>
            </div>";//end row
            }

                echo "</div>";//end table
            echo "</form>";
        echo "</div>";//end container
        //close database connecton
        $db = null;
        ?>
    </div><!-- end container-->
    <!--*****-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>