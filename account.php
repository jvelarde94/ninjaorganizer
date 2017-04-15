<?php //account.php
include("check.php"); //must be logged in
include("connect.php"); //connect to database
include('resetpassword.php');
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
  <title>My Account</title>
  <link rel="stylesheet" type="text/css" href="dist/semantic.css">


  <script src="dist/assets/library/jquery.min.js"></script>
  <script src="dist/semantic.js"></script>
  
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/redmond/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

   <script>
  $( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
        });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
  } );
  </script>
  
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
  
      </div></a>
     
      

    
    </div>
  </div>
  <br><br>

<h1 class="ui center aligned header">My Account</h1>
<div class="ui container">
  
  <div class="ui relaxed divided items">
    <div class="item">
      <div class="ui small image">
        <?php 
    
    //****************************SELECT Profile PHOTO***********************************
    $sql = "SELECT Image FROM users WHERE username = '$login_user' LIMIT 1";
    $result = mysqli_query($conn,$sql);
  
    if ($result)
     {
        $row = mysqli_fetch_assoc($result);
        $imageLocation = $row['Image'];
        echo "<img width = '100' height ='100'  src='$imageLocation'>";
    }
    else 
     {
      echo "An error occurred: " . mysqli_error(); // Otherwise display the error   
    } 
    ?>
  
     <!--*************************CHANGE PHOTO***********************************************-->
    <form  method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <br>
    <input type= "file" class="ui button" name= "image" value="Change Account Picture">
    <input type="submit" class= "ui button" name="CP" value="Set Image"> 
    </form>

    <?php    
    if (isset($_POST['CP']))
    {
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
 
  
    $image_name = $user.".jpg";
    move_uploaded_file($image_tmp_name,"Images/".$image_name);
    $ImageLocation = "Images/$image_name";
    //SQL TO ENTER DATA INTO USERS TABLE
        $sql = "UPDATE users SET Image='$ImageLocation' WHERE username= '$user';";
        $result = mysqli_query($conn, $sql);
        //*******************Pop up window****************
        echo '<script language="javascript">';
  	echo 'window.alert("Photo Successfully Added")';
	echo '</script>';
 	//echo "Photo Added Sucessfully!";
 	
 	

    }
      
    //**************************************************************************************
    
    
    ?>
      </div>
      
      <div class="content">
        
        <div class="meta">
          <p>
      <?php 
              echo "<strong>Username: </strong><i>", $login_user, "</i><br>";
              
              $emailSQL = "SELECT email FROM users WHERE username='$login_user'";
          $user_email = mysqli_fetch_assoc(mysqli_query($conn, $emailSQL));
          
            echo "<strong>Email: </strong><i>", $user_email["email"], "</i><br>";
            
            /*
            $birthdaySQL = "SELECT Birthday FROM users WHERE username='$login_user'";
          $user_birthday = mysqli_fetch_assoc(mysqli_query($conn, $birthdaySQL));
          
          echo "<strong>Email: </strong><i>", $user_email["email"], "</i><br>";
          */
          ?>
          </p>
        </div>
        
        <?php
      //******** Password reset successful *********
      if(!empty($_GET['messageSuccess'])) {
          $messageSuccess = $_GET['messageSuccess'];
          echo "<center>", $messageSuccess, "</center><br>";
      }
      //********************************************
      //********** If fields are empty *************
      if(!empty($_GET['messageEmpty'])) {
          $messageEmpty = $_GET['messageEmpty'];
          echo "<center>", $messageEmpty, "</center><br>";
      }
      //********************************************
      //********* If fields are incorrect **********
      if(!empty($_GET['messageInvalid'])) {
          $messageInvalid = $_GET['messageInvalid'];
          echo "<center>", $messageInvalid, "</center><br>";
      }
      //********************************************
  ?>
        
        <div class="description">
          
          
        </div>
        <div>

  <!-- ----------------OPENS ROW FOR RESET PASSWORD FIELDS---------------------- 
          <form class="ui form" action="account.php" method="post" accept-charset="utf-8">
            <input  class="ui button" type="submit" name="testButton" value="Test"/>
          </form>
         -------------------------------------------------------------------------- -->
          
              <div id="dialog" title="Reset Password">
                     <form action='resetpassword.php' method='post' accept-charset='utf-8'>
                        <label> New Password: </label><input type='password' name='newpassword' placeholder='New Password'>
                        <br />
                        <label> Confirm New Password: </label><input type='password' name='confirmpass' placeholder='New Password'>
                        <br><br>
                        <input class ="ui button" type='submit' name='resetpassword' value='Set new password'>
                    </form>
              </div>
           
<button class ="ui button" id="opener">Reset Password</button>


        </div>
      </div>
    </div>
<?php

if (isset($_POST['testButton']))
{
     echo "<div class='item'>
     
      <div class='content'>
        <div class='meta'>
      <form action='resetpassword.php' method='post' accept-charset='utf-8'>
      
      <label> New Password: </label><input type='password' name='newpassword' placeholder='New Password'>
      <br />
      <label> Confirm New Password: </label><input type='password' name='confirmpass' placeholder='New Password'>
      <br><br>
      <input type='submit' name='resetpassword' value='Reset password'>
      </form>
        </div>
      </div>
    </div>";
}


?>




    <div class="item">
      
      <div class="content">
        <center><h1 class="center header"> All Registered Goals </h1></center>

        <div class="meta">
                  
<?php

      echo "<br><br>";
      

      $user = $_SESSION['username'];
        $sqlCurrent = "SELECT title, description, dueDate, goalType FROM goals WHERE username = '$user';";
        $resultCurrent = mysqli_query($conn, $sqlCurrent);
        
        
    
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


    </div>
  </div>







</body>
</html>



