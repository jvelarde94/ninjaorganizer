<?php //personal.php
include("check.php"); //must be logged in
include("connect.php"); //connect to database
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!--<link rel="stylesheet" type="text/css" href="style.css">-->

  <link href="stylez.css" rel="stylesheet">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/vader/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



</head>

<body> <!-- body background gives layout -->
    <center>
    <div class="textboxheading">
    <p>
        <!-- <img src="personalgoals.png"/> -->
        <h1> Personal Goals: </h1>
    </p>
    </div>

    <form action="personal.php" method="post" accept-charset="utf-8">
		<fieldset>

    		Goal:<br>
    		<input type="text" name="goalTitle" value="" placeholder="Goal">
    		<br>
    		Description:<br>
    		<textarea name="description" placeholder="Description" rows="10" cols="100"></textarea>
    		<!-- <input type="text" name="description" value="" placeholder="Description"> -->
    		<br>
    		Date:<br>
        <input type="text" name="dueDate" value="" placeholder="Due Date" id="datepicker">
    		<br><br>
    		<input type="submit" name="enterGoal" value="Enter Goal">
        <input type="submit" name="showGoals" value="Show My Personal Goals">
   			</fieldset>


    </form>



    <br><br>
<script> $( function() {
 dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      /*buttons: {
        "Create an account": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },*/
      close: function() {
        form[ 0 ].reset();
        //allFields.removeClass( "ui-state-error" );
      }
    });

  $( "#Edit" ).submit().on( "click", function() {
      dialog.dialog( "open" );
    });
});
</script>








        <a href="home.php">Home</a> |
        <a href="personal.php">Personal</a> |
        <a href="professional.php">Professional</a> |
        <a href="educational.php">Educational</a> |
        <!--<a href="journal.html">Journal</a>-->
        <br><br><br>

    </center>

<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/ninquery.js"></script>


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
        $goalerror = "<center>*Goal Title field is blank.*</center>";
        $error++;
        echo $goalerror, "<br>";
    }

    //validate Description field
    if (empty($_POST['description']))
    {
        $descerror = "<center>*Description field is blank.*</center>";
        $error++;
        echo $descerror, "<br>";
    }

    //validate duedate field
    if (empty($_POST['dueDate']))
    {
        $dueerror = "<center>*Due Date field is blank.*</center>";
        $error++;
        echo $dueerror, "<br>";
    }
}

include 'loginSP.php';


  if(isset($_POST['enterGoal']) && !empty($_POST['goalTitle'])&& !empty($_POST['description']) && !empty($_POST['dueDate'])) //insert data into table if enter goal is clicked
    {
		$user = $_SESSION['username'];
		$goal = $_POST['goalTitle'];
		$desc = $_POST['description'];
		$due = $_POST['dueDate'];
		$goalType = 'Personal';

		$aposGoal = mysqli_real_escape_string($conn, $goal); //ALLOW APOSTROPHES IN SQL GOAL TITLE INPUT
		$aposDesc = mysqli_real_escape_string($conn, $desc); //ALLOW APOSTROPHES IN SQL DESCRIPTION INPUT
    	$sql = "INSERT INTO `goals`(`username`, `title`, `description`, `dueDate`, `goalType`,`MailNotif`) VALUES ('$user','$aposGoal','$aposDesc','$due','$goalType','no');";
	$result = mysqli_query($conn, $sql); //insert date
    	echo "<center><big><big> Goal entered successfully! </big></big></center>";
    }
  else if(isset($_POST['enterGoal']))
    {
  	echo "<center><big> No goal entered. </big></center>";
    }
  if(isset($_POST['delete']))
	{
		//get the values
		$id_goal=$_POST['id_goal'];
		$id_type=$_POST['goalType'];
		
		 $SQLselect = "delete from goals WHERE id_goal = '$id_goal';";  //delete the selected goal
		 mysqli_query($conn, $SQLselect);//execute the delete query
		  echo "Goal Deleted"; 
	}
	if(isset($_POST['save']))
	{
		//get the values
		$id_goal=$_POST['id_goal'];
		$id_type=$_POST['goalType'];
		$title=$_POST['goalTitle'];
		$description=$_POST['description'];
		$dueDate=$_POST['dueDate'];
		$title = mysqli_real_escape_string($conn, $title); //ALLOW APOSTROPHES IN SQL GOAL TITLE INPUT
		$description= mysqli_real_escape_string($conn, $description); //ALLOW APOSTROPHES IN SQL DESCRIPTION INPUT
		 $SQLselect = "UPDATE goals set title='$title', description= '$description',  dueDate='$dueDate' WHERE id_goal = '$id_goal';";  //update goal with the new data ID GOAL IS NOT PUT INTO THE UPDATE

		 mysqli_query($conn, $SQLselect);//execute the update query
		 echo "Goal Updated"; 
		
	}
  if(isset($_POST['showGoals']) || isset($_POST['save']) || isset($_POST['delete'])) // show info in table if show goals button is clicked
    {
		$user = $_SESSION['username'];

		$goalType = 'Personal';

	    $SQLselect = "SELECT id_goal,title, description, dueDate FROM goals WHERE username = '$user' AND goalType = '$goalType';"; //display info in table
	    $result1 = mysqli_query($conn, $SQLselect); //select the data

		   // echo $SQLselect;

	     //**************Display the chart****************

     	echo '<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif;
    	  font-size:15px; background-color:#E1E1E1" width="100%">
            <tr bgcolor="#FFFFFF" style="font-weight:bold">
			
            <th>Goal Title</th>
            <th>Description</th>
            <th>Due Date</th>

			<th> <th>
			<th> <th>
			
			
            </tr>';

   	 while ($row = mysqli_fetch_row($result1))
    	{
	   
	    echo '<tr>';
	    echo "<td>".$row[1]."</td>";
		  echo "<td>".$row[2]."</td>";
		  echo "<td>".$row[3]."</td>";
		//Display delete and update button for each row
		//a form for each row of the table
		echo '<form action="personal.php" method="POST">';
		//hidden input contains the id when button update or delete is clicked it will submit the id
		echo'<input  type="hidden" name="id_goal" value="'.$row[0].'"></input>';
		//another hidden input contain the type ( we will use this field to redirect back from the update form)
		echo'<input  type="hidden" name="goalType" value="personal"></input>';
		echo "<td><input type='submit' name='delete' value='delete'></input><td>";
		echo '</form>';
		//a form for each row of the table
		echo '<form action="update.php" method="POST">';
		//( for the delete also )hidden input contains the id when button update or delete is clicked it will submit the id
		echo'<input  type="hidden" name="id_goal" value="'.$row[0].'"></input>';
		//( for the delete also )another hidden input contain the type ( we will use this field to redirect back from the update form)
		echo'<input  type="hidden" name="goalType" value="personal"></input>';
		echo "<td><input type='submit' name='update' value='update'></input><td>";
		echo '</form>';
	    
	    echo "</tr>";
		
    	}
   	 echo "</table>";

    }

?>