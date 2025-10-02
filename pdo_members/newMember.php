<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
    /**
     * @var PDO $db
     */

	//connect to db
	require_once 'DB_connect.php';
	
	//Collect the post
	$myusername=$_POST['user'];
	$mypassword=$_POST['password'];
	$email=$_POST['email'];
    $first_name=$_POST['first_name'];
    $second_name=$_POST['second_name'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $town_city=$_POST['town_city'];
    $postcode=$_POST['postcode'];
    $mobile_phone=$_POST['mobile_phone'];
	// declare null for `id` field
	$myNull = null;
	
	//Check for empty fields from non JS valididation
	if (!isset($myusername)|| $myusername == '') {
        echo 'You need to enter a username';
		echo "<br/>";
		echo "<a href = 'newMember.html'>Back</a>";
		exit;
    }
	
	if (!isset($mypassword)|| $mypassword == '') {
        echo 'You need to enter a password';
		echo "<br/>";
		echo "<a href = 'newMember.html'>Back</a>";
		exit;
    }
	
	if (!isset($email)|| $email == '') {
        echo 'You need to enter an email address';
		echo "<br/>";
		echo "<a href = 'newMember.html'>Back</a>";
		exit;
    }
	//Check for duplicate username or
//	 email entries
	try {

	  // Check if username is taken
	  $stmt = $db->prepare("SELECT COUNT(*) FROM `pdo`.`members` WHERE `username` = :username");
	  $stmt->execute(array('username' => $myusername));
	  if ($stmt->fetchColumn() > 0) {
		throw new Exception("That username is already taken.");
	  }

	  // Check if email is taken
	  $stmt = $db->prepare("SELECT COUNT(*) FROM `pdo`.`members` WHERE `email` = :email");
	  $stmt->execute(array('email' => $email));
	  if ($stmt->fetchColumn() > 0) {
		throw new Exception("That email is already taken.");
	  }
	  // Username and email are free
	} 
	catch (Exception $e) {

	  // Either the username of email is already taken
	echo $e->getMessage();
	echo "<br/>";
	echo "<a href = 'newMember.html'>Back</a>";
	exit;
	}

	
	//create hash for password
	$salt = "dontcrackmywebsite";
	$hash = crypt($mypassword,$salt);
	
	
	try {
	 // prepare sql and bind parameters
    $stmt = $db->prepare("INSERT INTO `pdo`.`members`(`id`,`username`,`password`,`email`, `first_name`, `second_name`, `address1`, `address2`,`town_city`, `postcode`, `mobile_phone`)VALUES(:id, :username, :password, :email, :first_name, :second_name, :address1, :address2, :town_city, :postcode, :mobile_phone)");
	$stmt->bindParam(':id', $myNull, PDO::PARAM_INT);
    $stmt->bindParam(':username', $myusername, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindParam(':second_name', $second_name, PDO::PARAM_STR);
    $stmt->bindParam(':address1', $address1, PDO::PARAM_STR);
    $stmt->bindParam(':address2', $address2, PDO::PARAM_STR);
    $stmt->bindParam(':postcode', $postcode, PDO::PARAM_STR);
    $stmt->bindParam(':town_city', $town_city, PDO::PARAM_STR);
    $stmt->bindParam(':mobile_phone', $mobile_phone, PDO::PARAM_STR);
	
    $stmt->execute();
	}
	catch(PDOException $e)
    {
    echo $e->getMessage();
    }
	//close database connecton
	$db = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Member Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap css -->
	<link href="css/style.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <!--    Flash Message-->
    <div id="status-area"></div>

	<?php
        echo "<br/>";
        echo "New user, $myusername, successfully entered into database.";
        echo "<br/>";
	?>
	<h3>Member Login</h3>
	<form name="userForm" method="post" action="checklogin.php" >

		<div class="form-group">
			<label for="User">Username</label>
			<input type="text" name="User" class="form-control" id="errorUser" placeholder="Username">
		</div>

		<div class="form-group">
			<label for="Pass">Password</label>
			<input type="password" name="Pass" class="form-control" id="errorPassword" placeholder="Password">
		</div>

		<button type="submit" class="btn btn-default">Login</button>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/login.js" type="text/javascript"></script>
</body>
</html>
