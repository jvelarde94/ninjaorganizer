<?php //resetpasswordpage.php by Jeremy Velarde
include('resetpassword.php');
?>

<!DOCTYPE html>

<html>
<title> Reset Password </title>
<head>

<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
	<link href="stylez.css" rel="stylesheet">
	<style>
		div{
		padding-top: 300px;
		padding-bottom: 300px;
		}
	</style>
	
	<div>
	<h2><center> Reset Password </center></h2>
</head>

<body>
	<center>
	
		<form action="resetpassword.php" method="post" accept-charset="utf-8">
		
		<label> New Password: </label><input type="password" name="newpassword" placeholder="New Password">
		<br />
		<label> Confirm New Password: </label><input type="password" name="confirmpass" placeholder="New Password">
		<br><br>
		<input type="submit" name="resetpassword" value="Reset password">
		</form>
		<br>
		<a href="account.php"> Back to My Account </a>
		
	</center>
	</div>
	
</body>
</html>