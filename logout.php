<?php //logout.php by Jeremy Velarde
//setcookie("loggedin", "val", time() - (120), "/");

session_start();
if(session_destroy())
{
	header("Location: index.html");
}
?>