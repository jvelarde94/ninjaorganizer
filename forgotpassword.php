<?php //forgotpassword.php by Jeremy Velarde
include('connect.php');

if(!empty($_GET['messageEmpty'])) {
    $messageEmpty = $_GET['messageEmpty'];
    echo "<center><br>", $messageEmpty, "</center>";
}

if(!empty($_GET['messageInvalid'])) {
    $messageInvalid = $_GET['messageInvalid'];
    echo "<center><br>", $messageInvalid, "</center>";
}
	
	$user = $_POST['username'];
	$birthday = $_POST['birthday'];
	$newpassword = $_POST['newpassword'];
	$confirmpass = $_POST['confirmpass'];
	
	$userSQL = "SELECT username FROM users WHERE username='$user'";
    	$matchuser = mysqli_fetch_assoc(mysqli_query($conn, $userSQL));

	$birthdaySQL = "SELECT Birthday FROM users WHERE Birthday='$birthday'";
    	$matchbirthday = mysqli_fetch_assoc(mysqli_query($conn, $birthdaySQL));
    	

    if (isset($_POST["setpassword"]))
    {
	if (empty($_POST["username"]) || empty($_POST["birthday"]) || empty($_POST["newpassword"])  || empty($_POST["confirmpass"]) )
	   {
	   	header('location: forgotpasswordpage.php?messageEmpty=Fields are empty.');
	   }
	else if($user==$matchuser["username"] && $birthday==$matchbirthday["Birthday"] && $newpassword==$confirmpass)
	   {
	   	$hashnewpass = $confirmpass;
	   	$hashnewpass = sha1(sha1($confirmpass."salt")."salt");
	   	
	   	$sql = "UPDATE users SET password='$hashnewpass' WHERE username='$user'";
	   	$result3 = mysqli_query($conn, $sql);
	   	
	   	header('location: loginpageSP.php?message=Password changed successfully'); //redirect to login page
	   	
	   }
	else
	   {
	   	header('location: forgotpasswordpage.php?messageInvalid=Fields are invalid.');
	   }
	   
    }

    
?>



