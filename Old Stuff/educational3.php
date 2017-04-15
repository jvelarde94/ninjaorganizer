<?php
include("check.php"); //must be logged in
include("connect.php"); //connect to database
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
        <h1> Educational Goals: </h1>
    </p>
    </div>

    <form action="educational3.php" method="post" accept-charset="utf-8">

    <label>Goal: </label><input type="text" name="goalTitle" value="" placeholder="Goal">
    <br />
    <label>Description: </label><input type="text" name="description" value="" placeholder="Description">
    <br />
    <label>Due Date: </label><input type="text" name="dueDate" value="" placeholder="Due Date">
    <br />
        
    <input type="submit" name="enterGoal" value="Enter Goal">
    <input type="submit" name="showGoals" value="Show All Goals">
    </form>


    <br><br>
	
        <a href="home.php">Home</a> |
        <a href="personal4.php">Personal</a> |
        <a href="professional3.php">Professional</a> |
        <a href="educational3.php">Educational</a> |
        <!--<a href="journal.html">Journal</a>-->
        <br><br><br>
        
    </center>
</body>
</html>

<?php

//error variables
$goalerror = "";
$descerror = "";
$dueerror = "";
//$nomatch = "";
$error = 0;

if (isset($_POST['enterGoal']))
{
    //validate Goal field
    if (empty($_POST['goalTitle']))
    {
        $goalerror = "**Goal Title field is blank.**";
        $error++;
        echo $goalerror, "<br>";
    }

    //validate Description field
    if (empty($_POST['description']))
    {
        $descerror = "**Description field is blank.**";
        $error++;
        echo $descerror, "<br>";
    }

    //validate duedate field
    if (empty($_POST['dueDate']))
    {
        $dueerror = "**Due Date field is blank.**";
        $error++;
        echo $dueerror, "<br>";
    }

    
  }  

include 'loginSP.php';
    $user = $_SESSION['username'];
    $goal = $_POST['goalTitle'];
    $desc = $_POST['description'];
    $due = $_POST['dueDate'];
    $goalType = 'Educational';

  if(isset($_POST['enterGoal'])) //insert data into table if enter goal is clicked
    
    { 
	    $sql = "INSERT INTO `goals`(`username`, `title`, `description`, `dueDate`, `goalType`) VALUES ('$user','$goal','$desc','$due','$goalType');"; //DATE MUST BE IN YYYY-MM-DD MONTH MUST BE A VAILD MONTH 
	    $result = mysqli_query($conn, $sql); //insert date
	   
	   
	  // echo $sql;
    }
      
        
        
    if(isset($_POST['showGoals'])) // show info in table if show goals button is clicked
    {
	    $SQLselect = "SELECT title, description, dueDate FROM goals WHERE username = '$user' AND goalType = '$goalType';"; //display info in table 
	    $result1 = mysqli_query($conn, $SQLselect); //select the data
	    
		   // echo $SQLselect;
	   
	     //**************Display the chart****************  	
  
     	echo '<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif;
    	  font-size:15px; background-color:#E1E1E1" width="100%">
            <tr bgcolor="#FFFFFF" style="font-weight:bold">
            <th>Goal Title</th>
            <th>Description</th>
            <th>Due Date</th>
            
            </tr>';

   	 while ($row = mysqli_fetch_row($result1)) 
    	{
	    echo '<tr>';
	    foreach ($row as $value)
	    {
	      echo "<td>".$value."</td>";
	    }
	    echo "</tr>";
    	}
   	 echo "</table>";
	   
	   
	   
	   
    }
    
  

?>