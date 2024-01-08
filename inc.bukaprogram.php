<?php
$page= $_REQUEST['page'];
if ($page=="login") {
	if(file_exists ("login.php")) {
		include "login.php";
	}
	else {
		echo "File Program Login Tidak Ada";
	}
}


?>


