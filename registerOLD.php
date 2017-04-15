<?php //registerpageSP.php by Jeremy Velarde
?>

<!DOCTYPE html>

<!--
Registration form
-->

<html>
<title> Register form </title>
<head>

<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
<h2><center> Register </center></h2>
<link href="stylez.css" rel="stylesheet">
</head>
<body>
<center>

        <form action="registerSP.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<label>Username: </label><input type="text" name="username" value="" placeholder="Username">
	<br />
        <label>Email: </label><input type="text" name="email" value="" placeholder="Email">
        <br />
        <label>Birthday: </label><input type="text" name="birthday" value="" placeholder="dd/mm/yyyy">
        <br />
	<label>Password: </label><input type="password" name="password" value="" placeholder="Password">
	<br />
        <label>Confirm Password: </label><input type="password" name="cpass" value="" placeholder="Confirm Password">
	<br />
	
	<br>
	<label> Upload profile picture: </label>
	<input type="file" name="image">
	<br><br>
	<input type="submit" name="register" value="Register">
	</form>


			
	<br>
	<small> Already a user? - <a href="loginpageSP.php">Log in here </a></small>
	<br><br>
	<small><a href="index.html">Main Page</a></small>

    <br>
</center>
</body>
</html>