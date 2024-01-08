<?php
	//Start session
	session_start();
	
	//cek apakah variabel session telah ada atau tidak
	if(!isset($_SESSION['PENGGUNA']) || (trim($_SESSION['KATASANDI']) == '')) {
		echo "<script>document.location = '../index.php?page=login'</script>";exit();
			}
?>