<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

    //declare $db global
    global $db;
	//connect to DB
	require_once 'DB_connect.php';
	
	//Collect the get
	$id=$_GET['id'];
	$username = $_GET['username'];
	
	try {
	    // sql to delete a record
	    $stmt = $db->prepare("DELETE FROM `pdo`.`members` WHERE id= :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	    // execute sql statement
	    $stmt->execute();
	    echo "User: $username with ID: $id, has been successfully deleted from database.";
	    echo "<br/>";
		echo "<a href = 'selectMemberDelete.php'>Back </a>to select another member list.";
	}
	catch(PDOException $e)
    {
	    echo $stmt . "<br>" . $e->getMessage();
    }

$db = null;

	//Return user to selectMemberDelete.php
	header("location:selectMemberDelete.php");
	
