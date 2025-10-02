<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="login.js" type="text/javascript"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap css -->
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/rows2.css" />
	</head>

<body>
<?php
//connect to db
require_once 'DB_connect.php';

echo "<div class='container'>";
echo "<div class='h3'>Select Member to Delete from Database</div>";
//form to send to deleteMember.php			
	echo "<form action='deleteMember.php' method='get' name='deleteForm'>";		
	echo "<div class='table'>
			<div class='title'>
				<p>Member List</p>
			</div>
			<div class='row'>
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
	<div class='cell'>'".$row['username']."'</div>
	</div>";//end row
	}

		echo "</div>";//end table
	echo "</form>";
echo "</div>";//end container
//close database connecton
$db = null;
?>
</body>

</html>