<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//declare $db global
global $db;
//connect to db
require_once 'DB_connect.php';

// Define $myusername and $mypassword 
$myusername=$_POST['User'];
$mypassword=$_POST['Pass'];

//Salt and hash password
$salt = "dontcrackmywebsite";
$hash = crypt($mypassword, $salt);

try {
	  // Check if user exists
	  $stmt = $db->prepare("SELECT COUNT(*) FROM `members` WHERE `username` = :username AND `password` =:password");
	  $stmt->execute(array('username' => $myusername,'password' => $hash ));
	  if ($stmt->fetchColumn() == 1) {
		// Register $myusername, $mypassword and redirect to control_panel.php
		session_start();
		$_SESSION['myusername'] = $myusername;
		$_SESSION['mypassword'] = $mypassword;
		header('Location:control_panel.php');
	  }
		else{
	  	//echo "Wrong username or password, try again.";
		//log error attempts
		//capture IP and date
		$ip = $_SERVER["REMOTE_ADDR"];
		$date = date("d-m-Y H:i:s");

		//Append to file
		$file = 'login.txt';
		
		// Open the file to get existing content
		$current = file_get_contents($file);

		// Append login information to the file
		$current .= "User: $myusername attempted to login using Password: $mypassword from IP Address of $ip on $date"."\r\n";

		// Write the contents back to the file
		file_put_contents($file, $current);
		//redirect user to main login page1
		header('Location:login_retry.php');
		}
	} 
	catch (Exception $e) {
	  //Display error messages
	echo $e->getMessage();
	exit;
	}
//Close database
$db = null;
?>

