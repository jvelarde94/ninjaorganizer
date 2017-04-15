<html>
<title> Register </title>
<head>

<link rel='shortcut icon' href='Images/favicon.ico' type='image/ico'/>
 <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

   <!-- Site Properties -->
  <title>Educational Goals</title>
  <link rel="stylesheet" type="text/css" href="dist/semantic.css">

  <script src="dist/assets/library/jquery.min.js"></script>
  <script src="dist/semantic.js"></script>
  
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/vader/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  </head>
  
</html>

<?php //registerSP.php by Jeremy Velarde
include('connect.php');

//register new user (with validation)
//****************************************************************\\
	//User entry variables
	$user = $_POST['username'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
	$pass = $_POST['password'];
        $cpass = $_POST['cpass'];
        //Error variables
        $usererror = "";
	$emailerror = "";
	$passerror = "";
	$birthdayerror = "";
	$nomatch = "";
	$error = 0;
//****************************************************************\\
echo "<center>";
if (isset($_POST['register']))
{	
    //**** variables for if user already exists ****\\
    $userSQL = "SELECT username FROM users WHERE username='$user'";
    $matchuser = mysqli_fetch_assoc(mysqli_query($conn, $userSQL));

//******************** VALIDATE USERNAME ***********************\\
    if (empty($_POST['username'])){
        $usererror = "<i> - Username field is blank </i>";
        $error++;
        echo $usererror, "<br>";
    }
    else if($user == $matchuser["username"]) {
	$usererror = "<i> - Username already exists </i>";    	
    	$error++;
    	echo $usererror, "<br>";
    }
    else {
    $user= test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9]*$/",$user)) {
            $usererror = "<i> - Only letters and numbers allowed in username field </i>";
            $error++;
            echo $usererror, "<br>";
        }
    }
//**************************************************************\\
//******************** VALIDATE EMAIL **************************\\

    //**** variables for if email address is already being used ****\\
    $emailSQL = "SELECT email FROM users WHERE email='$email'";
    $matchemail = mysqli_fetch_assoc(mysqli_query($conn, $emailSQL));
    	
    if (empty($_POST['email'])) {
        $emailerror = "<i> - Email field is blank </i>";
        $error++;
        echo $emailerror, "<br>";
    }
    else if($email == $matchemail["email"]) {
	$emailerror = "<i> - This email address is already in use </i>";    	
    	$error++;
    	echo $emailerror, "<br>";
    }
    else {
        $email = test_input($_POST["email"]);
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $emailerror = "<i> - Email address entered is invalid </i>";
            $error++;
            echo $emailerror, "<br>";
        }
    }
//**************************************************************\\
//******************* VALIDATE BIRTHDAY ************************\\
    if (empty($_POST['birthday']))
    {
        $birthdayerror = "<i> - Birthday field is blank </i>";
        $error++;
        echo $birthdayerror, "<br>";
    }
    else {
        $birthday = test_input($_POST["birthday"]);
        if (!preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/",$birthday)) 
        {
            $birthdayerror = "<i> - Birthday entered is invalid </i>";
            $error++;
            echo $birthdayerror, "<br>";
        }
    }  
//******************************************************************\\
//*************** ACCOUNT IMAGE **********************************\\

       
   	if($_FILES['image']['error'] > 0)
	{
		echo "<i> No file uploaded. Default image assigned. </i>", "<br/>";
		$ImageLocation = "Images/DefaultPhoto";
	}
	else
	{
    		$image_name = $_FILES['image']['name'];
		$image_type = $_FILES['image']['type'];
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_name = $user.".jpg";
		move_uploaded_file($image_tmp_name,"Images/".$image_name);
		$ImageLocation = "Images/$image_name";
     	}
//******************************************************************\\ 
//*************** VALIDATE PASSWORD ********************************\\
    if (empty($_POST['password'])){
        $passerror = "<i> - Password field is blank </i>";
        $error++;
        echo $passerror, "<br>";
    }
    else if($pass != $cpass){
        $nomatch = "<i> - Passwords do not match </i>";
        echo $nomatch;
    }
    else if($pass == $cpass && $error<1){ //validate password matches and no other errors
        echo "<img width = '100' height ='100' src= $ImageLocation >";//output the profile image
        
        $hashpass = $pass;
        $hashpass = sha1(sha1($pass."salt")."salt"); //to encrypt password entered into database
     
        //SQL TO ENTER DATA INTO USERS TABLE
        $sql = "INSERT INTO users (username, email, password, Birthday, Image) VALUES ('$user', '$email', '$hashpass', '$birthday', '$ImageLocation')";
        $result = mysqli_query($conn, $sql);
        echo "Registration successful!", '<br><br>', '<a href="loginpageSP.php"> Log in here </a>';
    }
//**************************************************************************************************
//***************** CHECK FOR ERRORS *******************************\\
    if($usererror || $emailerror || $passerror || $nomatch || $error){
       echo '<br><br>',"Registration failed", '<br><br>', '<a class = "ui button" href="registerpageSP.php">Back to registration</a>';
    }
//******************************************************************\\
    
echo "</center>";
}

//test_input function
function test_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

?>