<?php
include('professional.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body> <!-- body background gives layout -->
	<center>
	<div class="textboxheading">
	<p>
		<!-- <img src="personalgoals.png"/> -->
		<h1> Professional Goals: </h1>
	</p>
	</div>

    <form action="professional.php" method="post" accept-charset="utf-8">

	<label>Goal: </label><input type="text" name="goalTitle" value="" placeholder="Goal">
	<br />
    <label>Description: </label><input type="text" name="description" value="" placeholder="Description">
    <br />
	<label>Due Date: </label><input type="text" name="dueDate" value="" placeholder="Due Date">
	<br />
        
	<input type="submit" name="enterGoal" value="Enter Goal">
	</form>


	<br><br>

		<a href="home.php">Home</a> |
		<a href="personalpage.php">Personal</a> |
		<a href="professionalpage.php">Professional</a> |
		<a href="educationalpage.php">Educational</a> |
		<!--<a href="journal.html">Journal</a>-->
		
	</center>
</body>
</html>