<?php
/**
 * @var PDO $db
 */

/*** mysql hostname ***/
$hostname = '127.0.0.1';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = '';

try {
    $db = new PDO("mysql:host=$hostname;dbname=pdo;charset=utf8", $username, $password);
    // Ensure PDO will throw exceptions on error
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	/*** echo a message saying we have connected ***/
    //echo 'Connected to database';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
