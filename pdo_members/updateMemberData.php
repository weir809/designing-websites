<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

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

	//connect to db
	require_once 'DB_connect.php';
	
	//Collect the post
    $id=$_POST['id'];
	$myusername=$_POST['user'];
	$email=$_POST['email'];
    $first_name=$_POST['first_name'];
    $second_name=$_POST['second_name'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $town_city=$_POST['town_city'];
    $postcode=$_POST['postcode'];
    $mobile_phone=$_POST['mobile_phone'];

	//Check for duplicate username or
//	 email entries
//	try {
//
//	  // Check if username is taken
//	  $stmt = $db->prepare("SELECT COUNT(*) FROM `pdo`.`members` WHERE `username` = :username");
//	  $stmt->execute(array('username' => $myusername));
//	  if ($stmt->fetchColumn() > 0) {
//		throw new Exception("That username is already taken.");
//	  }
//
//	  // Check if email is taken
//	  $stmt = $db->prepare("SELECT COUNT(*) FROM `pdo`.`members` WHERE `email` = :email");
//	  $stmt->execute(array('email' => $email));
//	  if ($stmt->fetchColumn() > 0) {
//		throw new Exception("That email is already taken.");
//	  }
//	  // Username and email are free
//	}
//	catch (Exception $e) {
//
//	  // Either the username of email is already taken
//	echo $e->getMessage();
//	echo "<br/>";
//	echo "<a href = 'newMember.html'>Back</a>";
//	exit;
//	}

	
	try {
	 // prepare sql and bind parameters
    $stmt = $db->prepare("UPDATE `pdo`.`members` SET username= :username, email= :email, first_name= :first_name, second_name= :second_name, address1= :address1, address2= :address2, town_city= :town_city, postcode= :postcode, mobile_phone= :mobile_phone WHERE id='$id'");
    $stmt->bindParam(':username', $myusername);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':second_name', $second_name);
    $stmt->bindParam(':address1', $address1);
    $stmt->bindParam(':address2', $address2);
    $stmt->bindParam(':postcode', $postcode);
    $stmt->bindParam(':town_city', $town_city);
    $stmt->bindParam(':mobile_phone', $mobile_phone);
	
    $stmt->execute();
	}
	catch(PDOException $e)
    {
        echo $e->getMessage();
    }
	//close database connection
	$db = null;

    //Return user to control_panel.php
    header("location:control_panel.php");


