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

    //Collect the get from selectUpdateMember.php
    $id=$_GET['id'];
    $username = $_GET['username'];

try {
    // sql to select a record
    $stmt = $db->prepare("SELECT * FROM `pdo`.`members` WHERE id= :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // execute sql statement
    $stmt->execute();
    //populate array $member with results from $stmt
    $member = $stmt->fetch();

}
catch(PDOException $e)
{
    echo $stmt . "<br>" . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Update Member</title>
		<link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap css -->
		<link href="css/style.css" rel="stylesheet">
  </head>
  <body>

  <!--*****-->

  <div class="container">

    <div class = 'header-left'>
      <div>
        <a href = 'control_panel.php'>Back to Control Panel</a>
      </div>
        <div>
            <a href = 'selectUpdateMember.php'>Select another member</a>
        </div>
      <h3>Update Member</h3>
    </div>

    <div class = 'centre'>

    <form action="updateMemberData.php" method="post" name="updateForm" >
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">

      <div class="form-group">
        <label for="user">Username</label>
        <input type="text" name="user" id="user" class="form-control" value="<?php echo ($member['username']); ?>">
      </div>

<!--      <div class="form-group">-->
<!--        <label for="password">Password</label>-->
<!--        <input placeholder="Password" id="password" name="password" class="form-control input-field" type="password">-->
<!--        <span class="glyphicon glyphicon-eye-open"></span>-->
<!--      </div>-->

      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo ($member['email']); ?>">
      </div>

      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo ($member['first_name']); ?>">
      </div>

      <div class="form-group">
        <label for="second_name">Second Name</label>
        <input type="text" id="second_name" name="second_name" class="form-control" value="<?php echo ($member['second_name']); ?>">
      </div>

      <div class="form-group">
        <label for="address1">Address 1</label>
        <input type="text" id="address1" name="address1" class="form-control" value="<?php echo ($member['address1']); ?>">
      </div>

      <div class="form-group">
        <label for="address2">Address 2</label>
        <input type="text" id="address2" name="address2" class="form-control" value="<?php echo ($member['address2']); ?>">
      </div>

      <div class="form-group">
        <label for="town_city">Town /City</label>
        <input type="text" id="town_city" name="town_city" class="form-control" value="<?php echo ($member['town_city']); ?>">
      </div>

      <div class="form-group">
        <label for="postcode">Postcode</label>
        <input type="text" id="postcode" name="postcode" class="form-control" value="<?php echo ($member['postcode']); ?>">
      </div>

      <div class="form-group">
        <label for="mobile_phone">Mobile Phone</label>
        <input type="text" id="mobile_phone" name="mobile_phone" class="form-control" value="<?php echo ($member['mobile_phone']); ?>">
      </div>
        <button type="submit" class="btn btn-info">Update</button>
      </form>

      </div>
    </div><!-- end container -- >

		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.3.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/login.js"></script>

  </body>
</html>