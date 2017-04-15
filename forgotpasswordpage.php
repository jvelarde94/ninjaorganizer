<?php //forgotpasswordpage.php by Jeremy Velarde
include('forgotpassword.php');
?>

<!DOCTYPE html>

<html>
<title> Reset Password </title>
<head>
	<title>Ninja Organizer</title>
	
	<h2><center> Reset Password </center></h2>
	
	<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
	 <!-- Standard Meta -->
	  <meta charset="utf-8" />
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
	   <!-- Site Properties -->
	  
	  <link rel="stylesheet" type="text/css" href="dist/semantic.css">
	
	  <script src="dist/assets/library/jquery.min.js"></script>
	  <script src="dist/semantic.js"></script>
	  
	    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/vader/jquery-ui.css">
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<style>
	  table {word-wrap: break-word;}
	</style>
	
</head>

<body>
	<center>
	
		<form action="forgotpassword.php" method="post" accept-charset="utf-8">
		
		<label> Username: </label><input type="text" name="username" placeholder="Username">
		<br />
		<label> Birthday: </label><input type="text" name="birthday" placeholder="mm/dd/yyyy">
		<br />
		<label> New Password: </label><input type="password" name="newpassword" placeholder="New Password">
		<br />
		<label> Confirm New Password: </label><input type="password" name="confirmpass" placeholder="New Password">
		<br><br>
		<input type="submit" name="setpassword" value="Set password">
		</form>
		<br>
		
		<small>Back to <a href="loginpageSP.php"> Login Page</a></small>
		<br>
		<small>New User? - <a href="registerpageSP.php"> Register here</a></small>
		
	</center>
	
</body>
</html>