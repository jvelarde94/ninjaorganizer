<?php //loginpageSP.php by Jeremy Velarde
include('loginSP.php'); //include login php code
if ((isset($_SESSION['username']) != '')) 
{
	header('Location: home.php');
}

//****** If redirected after password reset ******
if(!empty($_GET['message'])) {
    $message = $_GET['message'];
    echo "<center><br>", $message, "<br> Log in below. </center>";
    
}
//************************************************

?>

<!DOCTYPE html>

<html>
<title> Log in </title>
<head>

<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
	<style>
	div{
	padding-top: 300px;
	}
	</style>
	<link href="stylez.css" rel="stylesheet">
	
	<div>
	<h2><center> Login </center></h2>
</head>
<body>
	<center>
		<form action="" method="post" accept-charset="utf-8">
		<label>Username: </label><input type="text" name="username" placeholder="Username">
		<br />
		<label>Password: </label><input type="password" name="password" placeholder="Password">
		<br />
		<input type="submit" name="login" value="Login">
		</form>
		
		<br>
		
		<a href="forgotpasswordpage.php"><small>Forgot password?</small></a>
		
		<br><br>
		
		<a href="index.html">Main Page</a> |
		<a href="registerpageSP.php">Register</a>
		
		<br><br>
	</center>
	</div>	
</body>
</html>





























