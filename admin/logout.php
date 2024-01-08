<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['PEGGUNA']);
	unset($_SESSION['KATASANDI']);
	header("location: ../index.php?page=utama");
?>

