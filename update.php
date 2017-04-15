<?php //educational.php
include("check.php"); //must be logged in
include("connect.php"); //connect to database
?>

<!DOCTYPE html>
<html>
<head>

<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
  <meta charset="utf-8">
  <!--<link rel="stylesheet" type="text/css" href="style.css">-->
  
  <link rel="stylesheet" type="text/css" href="dist/semantic.css">

  <script src="dist/assets/library/jquery.min.js"></script>
  <script src="dist/semantic.js"></script>
  


  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/vader/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body> <!-- body background gives layout -->
<?php
//if an update command or delete is submited



	//if update
	if(isset($_GET['id']))
	{
		//get the values
		$id_goal=$_GET['id']; //the thing the square brackets needs to correspond to the exact cloumn name in the database
		$id_type=$_GET['type'];

		
		$SQLselect = "SELECT id_goal, title, description, dueDate FROM goals WHERE id_goal = '$id_goal';"; //get the fields of the selected goal the goal id is not grabbed
	    $result1 = mysqli_query($conn, $SQLselect);
		$row = mysqli_fetch_row($result1);

	}
	//id delete
	
	
	


//else quit the page without doing any thing
else
{
	header("location:home.php");
}
?>
 


    <div class="ui text container">
  <div class="ui segments">
    <div class="ui segment">
    
    <a class="header">Update Goal</a><br<br>

        <form class="ui form" form action="<?php echo $id_type;?>.php" method="post" accept-charset="utf-8">
        <!-- Display form with the values of the goal to update -->
          <div class="field">
            <label>Goal</label>
               <input  type="hidden" name="id_goal" value="<?php echo $row[0]; ?>"></input>
               <input  type="hidden" name="goalType" value="<?php echo $_POST["goalType"]; ?>"></input>
                <input type="text" name="goalTitle" value="<?php echo $row[1]; ?>">
          </div>
          <div class="field">
            <label>Description</label>
                <textarea name="description"  rows="10" cols="100"><?php echo $row[2]; ?></textarea>
                <!-- <input type="text" name="description" value="" placeholder="Description"> -->
          </div>
          <div class="field">
            <label>Date</label>
               <input type="text" name="dueDate" value="<?php echo $row[3]; ?>" placeholder="Due Date" id="datepicker">
          </div>

      <!--on click cancel and go back -->
        <input class="ui button" type="submit" name="cancel" value="cancel">
      <!--on click SAVE CHANGES and go back -->
        <input class="ui button" type="submit" name="save" value="save">
    </form>


      

    </div>

  </div>
</div>




<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/ninquery.js"></script>


</body>
</html>