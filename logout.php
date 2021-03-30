<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

session_start();
if(isset($_SESSION["username"])){ 
	$type = explode("_",$_SESSION["username"])[1];
}

if(session_destroy()) // Destroying All Sessions
{
	if($type=="cs") {
		header("Location: login_cs.php"); // Redirecting To Home Page
	}elseif($type=="adv") {
		header("Location: login_adv.php"); // Redirecting To Home Page
	}elseif($type=="own") {
		header("Location: login_own.php"); // Redirecting To Home Page
	}
	
}
?>