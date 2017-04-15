<?php //home.php
session_start();
//exit($_SESSION['username']);
include('check.php');
include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  
  <!--
  <link rel="stylesheet" type="text/css" href="style.css">
  -->
  
</head>

<body style="margin:0;padding:100">
	<center>
		<h1>Set Your Goals. Organize them. Achieve them.</h1>
	  
		<strong>
			<h3>Think further. Reach higher.</h3>
			<br>
		</strong>
		
		
		<i> Welcome <strong><?php echo $login_user; ?>. </strong></i>
		<br>
		Time to get to work!.
		<br><br>
		
		<?php
			date_default_timezone_set("America/New_York"); //THIS SETS THE TIME ZONE DO NOT TOUCH
			$currentDate = date('m/d/Y');
		
					
			//echo $currentDate;
			echo "<br><br>";
			
			//if($row1['dueDate'] != $currentDate) {
			//	echo "<strong>You have no goals set for today! </strong>";
			//   }
			//else {
			
			//if($currentDate == )
			$user = $_SESSION['username'];
				$sqlCurrent = "SELECT title, description, dueDate, goalType FROM goals WHERE username = '$user' AND dueDate = '$currentDate';";
				$resultCurrent = mysqli_query($conn, $sqlCurrent);
				
				
				echo "<strong>Your goals for " .$currentDate. ": </strong></br>";
				echo '<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif;
	    	  			font-size:15px; background-color:#FB7BA7" width="60%">
				        <tr bgcolor="#26CC16" style="font-weight:bold">
				        <th>Goal Title</th>
				        <th>Description</th>
				        <th>Due Date</th>
				        <th>Category</th>
				        </tr>';
			
				while ($row = mysqli_fetch_row($resultCurrent)) 
			    	{
				    echo '<tr>';
				    foreach ($row as $value)
				    {
				      echo "<td>".$value."</td>";
				    }
				    echo "</tr>";
			    	}
			   	  echo "</table>";
			    //}
		?>
		
		
		<br><br>
		<a href="personal.php">Personal</a> |
		<a href="professional.php">Professional</a> |
		<a href="educational.php">Educational</a> 
		<!--///<a href="daily.html">Daily</a> |
		///<a href="journal.html">Journal</a> -->
	</center>
</body>

<footer>
<center>
	<br><br>
	<a href="logout.php"> Logout </a>
</center>
</footer>
</html>	    		



<?php	

	$sql = "SELECT Image FROM users WHERE username = '$user' LIMIT 1";
	$result = mysqli_query($conn,$sql);
			
			
			
	if ($result)
	  {
			
  		$row = mysqli_fetch_assoc($result);
  		echo "<img src='Image".$row['image']."' />";
 		echo $row['Image'];
 		//echo "<img width = '100' height ='100' src= '$row['Image']'>;";
 		
 		


	 }
	else 
	 {
		echo "An error occurred: " . mysqli_error(); // Otherwise display the error		
	 }	

?>




