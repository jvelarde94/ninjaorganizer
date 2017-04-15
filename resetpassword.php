<?php //resetpassword.php by Jeremy Velarde
include("check.php");
include('connect.php');

//******** Password reset successful *********
if(!empty($_GET['messageSuccess'])) {
    $messageSuccess = $_GET['messageSuccess'];
    echo $messageSuccess;
}
//********************************************
//********** If fields are empty *************
if(!empty($_GET['messageEmpty'])) {
    $messageEmpty = $_GET['messageEmpty'];
    echo $messageEmpty;
}
//********************************************
//********* If fields are incorrect **********
if(!empty($_GET['messageInvalid'])) {
    $messageInvalid = $_GET['messageInvalid'];
    echo $messageInvalid;
}
//********************************************
	

	$user = $_SESSION['username']; //set user variable from session variable session variable
	$newpassword = $_POST['newpassword'];
	$confirmpass = $_POST['confirmpass'];
	
	$userSQL = "SELECT username FROM users WHERE username='$user'";
    	$matchuser = mysqli_fetch_assoc(mysqli_query($conn, $userSQL));



    if (isset($_POST["resetpassword"]))
    {
	if (empty($_POST["newpassword"])  || empty($_POST["confirmpass"]) )
	   {
	   	header('location: account.php?messageEmpty=Fields are empty.');
	   }
	else if($newpassword==$confirmpass)
	   {
	   	$hashnewpass = $confirmpass;
	   	$hashnewpass = sha1(sha1($confirmpass."salt")."salt");
	   	
	   	$sql = "UPDATE users SET password='$hashnewpass' WHERE username='$user'";
	   	$result3 = mysqli_query($conn, $sql);
	   	
	   	header('location: account.php?messageSuccess=Password changed successfully'); //
	   	
	   }
	else
	   {
	   	header('location: account.php?messageInvalid=Fields are invalid.');
	   }
	   
    }

    
?>



