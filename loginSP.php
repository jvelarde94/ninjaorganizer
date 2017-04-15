<?php //loginSP.php by Jeremy Velarde
session_start(); //start session
include('connect.php');

$error= ''; //variable to store an error message

if (isset($_POST["login"]))
{
   if(empty($_POST["username"]) || empty($_POST["password"]))
   {
      $error="Username or Password is blank";
      echo "<center>", $error, "</center>";
   }
   else
   {
    	//define username and password
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	//encrypt password
	$hashpass = sha1(sha1($pass."salt")."salt");
	
	$sql = "SELECT id FROM users WHERE username='$user' AND password='$hashpass'";
	$result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	if(mysqli_num_rows($result) == 1)
	{
	        $_SESSION['username']= $user; //initialize session
	        header("location: home.php"); //redirect to home page
	        exit();
	}
	else
	{
		$error = "Username or password invalid";
		echo "<center>", $error, "</center>";
	}
   }
}

?>