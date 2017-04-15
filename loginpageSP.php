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

?><!DOCTYPE html>

<html>
<head>
<!--<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
	<style>
	div{
	padding-top: 300px;
	}
	</style>
	<link href="stylez.css" rel="stylesheet">
	
	<div>
	<h2><center> Login </center></h2>
</head>-->
<head>

<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
 <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

   <!-- Site Properties -->
  <title>Log In</title>
  <link rel="stylesheet" type="text/css" href="dist/semantic.css">

  <script src="dist/assets/library/jquery.min.js"></script>
  <script src="dist/semantic.js"></script>
  
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/vader/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  
<style>
  table {word-wrap: break-word;}

  body{
    padding-top: 300px;
  }
</style>
</head>


<body>

      <div class="ui text container">
  <div class="ui segments">
    <div class="ui segment">

      <div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui image header">
      <img src="Images/DefaultPhoto" class="image">
      <div class="content">
        Log-in to your account
      </div>
    </h2>


    <form class="ui large form" action="" method="post" accept-charset="utf-8">
      <div class="ui stacked segment">
        <div class="field">
           <label></label>
       
            <input type="text" name="username" placeholder="Username">
          
        </div>
        <div class="field">
           <label></label>

            <input type="password" name="password" placeholder="Password">

        </div>
        <input class="ui button" type="submit" name="login" value="Login">
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      Register <a href="registerpageSP.php">Sign Up</a>
    </div>
        <div class="ui message">
      Forgot Password? <a href="forgotpasswordpage.php">I'm Forgetful</a>
    </div>
  </div>
</div>
    


      

    </div>

  </div>
</div>



		



</body>





</html>
