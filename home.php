<?php //home.php
include("check.php"); //must be logged in
include("connect.php"); //connect to database
?>

<!DOCTYPE html>
<html>
<head>

<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
 <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

   <!-- Site Properties -->
  <title>Home</title>
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
  
 <div class="ui fixed pink inverted menu">
    <div class="ui container">
      <a href="home.php" class="header item">
        <!--<img class="logo" src="assets/images/logo.png">-->
                    Ninja Organizer
      </a>
      <a href="home.php" class="item">Home</a>
      <a href="educational.php" class="item">Educational</a>
      <a href="professional.php" class="item">Professional</a>
      <a href="personal.php" class="item">Personal</a>
      <a href="account.php" class="item">My Account</a>
      <a href="logout.php" class="item">Logout</a>
        <a href="account.php" class="header item">
        <div class="logo"> <?php 
    
    //****************************SELECT Profile PHOTO***********************************
    $sql = "SELECT Image FROM users WHERE username = '$login_user' LIMIT 1";
    $result = mysqli_query($conn,$sql);
  
    if ($result)
     {
        $row = mysqli_fetch_assoc($result);
        $imageLocation = $row['Image'];
        echo "<img width = '27' height ='27'  src='$imageLocation'>";
    }
    else 
     {
      echo "An error occurred: " . mysqli_error(); // Otherwise display the error   
    } 
    ?>
  
      </div>
      </a>
      

    
    </div>
  </div>
  <br><br>

<h1 class="ui center aligned header">Home</h1>
<div class="ui container">

<div class="ui stackable two column divided grid container">
  <div class="row">
    <div class="column">
      <div class="ui segment">

        <h1>Set Your Goals.<br> Organize them.<br> Achieve them.</h1>
    
    <strong>
      <h3>Think further. Reach higher.</h3>
      <br>
    </strong>



      </div>
    </div>
    <div class="column">
      <div class="ui segment">
  <i> Welcome <strong><?php echo $login_user; ?>. </strong></i>
    <br>
    
    Time to get to work!
    <br><br>




      </div>
    </div>
  </div>

</div>

  
  <div class="ui relaxed divided items">
    <div class="item">
      <div class="content">
        <a class="header">Current Goals</a>
        <div class="meta">
          <?php
      date_default_timezone_set("America/New_York"); //THIS SETS THE TIME ZONE DO NOT TOUCH
      $currentDate = date('m/d/Y');
    
          
      //echo $currentDate;
      echo "<br><br>";
      
      //if($row1['dueDate'] != $currentDate) {
      //  echo "<strong>You have no goals set for today! </strong>";
      //   }
      //else {
      
      //if($currentDate == )
      $user = $_SESSION['username'];
        $sqlCurrent = "SELECT title, description, dueDate, goalType FROM goals WHERE username = '$user' AND dueDate = '$currentDate';";
        $resultCurrent = mysqli_query($conn, $sqlCurrent);
        
        
        echo "<strong>Your goals for " .$currentDate. ": </strong></br>";
        echo '<table class="ui fixed selectable inverted table">
                    <thead>
                    <tr>
                <th>Goal Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Category</th>
                </tr></thead><tbody>';
      
        while ($row = mysqli_fetch_row($resultCurrent)) 
            {
            echo '<tr>';
            foreach ($row as $value)
            {
              echo "<td>".$value."</td>";
            }
            echo "</tr>";
            }
            echo "</tbody></table>";
          //}
    ?>
        </div>

      </div>
    </div>


    </div>
  </div>







</body>
</html>



