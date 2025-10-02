<?php
//Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if(!isset($_SESSION['myusername'])){
header("location:main_login.php");
}
$myusername = $_SESSION['myusername'];

/**
 * @var PDO $db
 */
?>
<!DOCTYPE html>

<html lang = "en">

	<head>
        <title>Update Member</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <script src="js/login.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap css -->
	    <link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>

<body>
    <div class = 'container'>
        <div class = 'header-left'>
            <div>
                <a href = 'control_panel.php'>Back to Control Panel</a>
            </div>

            <h3>Select Member ID to Update</h3>
        </div>
        <div class = 'header-right'>
            <p>Logged in as <?php echo "$myusername"?></p>
            <a href = 'logout.php'>Logout</a>
        </div>

            <form action='updateMemberForm.php' method='get' name='updateForm'>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Mobile Phone</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
				    //connect to db
				    require_once 'DB_connect.php';
                    //select members and id to display in table rows
                    foreach($db->query('SELECT * FROM `members`') as $row) {
                    echo "<tr>
                    <td><a href='updateMemberForm.php?id=".$row['id']."&username=".$row['username']."'>".$row['id']."</a></td>
                    <td>".$row['username']."</td>
                    <td>".$row['first_name'].' '.$row['second_name']."</td>
                    <td>".$row['mobile_phone']."</td>
                    </tr>";//end row
                    }
                    //close database connection
                    $db = null;
                    ?>
                    </tbody>
                </table>
            </form>
        </div>

<!--    </div><!-- end container-->
    <!--*****-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>