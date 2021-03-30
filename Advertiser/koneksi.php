<?php
	$conn = mysqli_connect('localhost', 'root', '', 'dashboard');
	
	if($conn){
		echo "Berhasil Tersambung";
	}else{
		echo "Tidak Berhasil Tersambung";
	}
?>