<?php //registerpageSP.php by Jeremy Velarde
?>

<!DOCTYPE html>

<!--
Registration form
-->

<html>
<head>

<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
 <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

   <!-- Site Properties -->
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="dist/semantic.css">

  <script src="dist/assets/library/jquery.min.js"></script>
  <script src="dist/semantic.js"></script>
  
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css">

  
    

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  
<style>
  table {word-wrap: break-word;}
</style>

<script>
  $( function() {
    $( "#datepicker" ).datepicker({
    	changeMonth: true,
    	changeYear: true,
    	yearRange : '-120:+0',
    	maxDate: 0,
    	dateFormat:'mm/dd/yy'
    });
  } );
  </script>
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
        Register
      </div>
    </h2>


    <form class="ui large form" action="registerSP.php" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
      <div class="ui stacked segment">
        <div class="field">
           <label>Username: </label>
       
            <input type="text" name="username" placeholder="Username">
          
        </div>

        <div class="field">
           <label>Email: </label>

            <input type="text" name="email" value="" placeholder="Email">

        </div>

        <div class="field">
           <label>Birthday: </label>

           <input type="text" name="birthday" id="datepicker" value="" placeholder="dd/mm/yyyy">

        </div>

        <div class="field">
           <label>Password: </label>

            <input type="password" name="password" value="" placeholder="Password">

        </div>

        <div class="field">
           <label>Confirm Password: </label>

            <input type="password" name="cpass" value="" placeholder="Confirm Password">

        </div>
        
        
        <label> Upload profile picture: </label>
	<input type="file" name="image">
	<br><br>
	<input type="submit" name="register" value="Register">






      <div class="ui error message"></div>
    </form>

    <div class="ui message">
      Already a user? <a href="loginpageSP.php">Log in here</a>
    </div>

  </div>
</div>


    </div>

  </div>
</div>


<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>

		



</body>



</html>