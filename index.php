<?php 
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location:login_cs.php");
	}else if(isset($_SESSION["username"])){
		$temp = explode('_',$_SESSION["username"]);
		
		if($temp[1] == "adv" ) {
			header("Location:Advertiser/index_adv.php");
		}
		
		if($temp[1] == "cs" ) {
		header('Location: Customer Services/index_cs.php');
		}
		
		if($temp[1] == "own" ) {
		header("Location: Owner/index_own.php");
		}
	}
?>