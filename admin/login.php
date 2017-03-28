<?php
//include config
require_once('../includes/config.php');


//check if already logged in
if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login</title>

  <link rel="stylesheet" href="../style/main.css?version=1">
</head>
<body>

<!-- <div id="login"> -->

	<?php

	//process login form if submitted
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($user->login($username,$password)){ 

			//logged in return to index page
			header('Location: index.php');
			exit;
		

		} else {
			$message = '<div align="center" class="error"><p>Wrong username or password</p></div>';
		}

	}//end if submit

	if(isset($message)){ echo $message; }
	?>
	<div id="login">
	<form action="" method="post">
	<h3 align="center">Admin login:</h3>
	<p align="center"><label>Username:</label><input type="text" name="username" value="" size="30" /></p>
	<p align="center"><label>Password: </label><input type="password" name="password" value="" size="30"  /></p>
	<p align="center"><label></label><input type="submit" id="btn" name="submit" value="Login"  /></p>
	</form>

</div>
</body>
</html>
