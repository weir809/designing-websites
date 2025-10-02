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
