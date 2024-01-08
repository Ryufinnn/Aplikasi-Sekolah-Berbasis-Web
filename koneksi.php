<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "dbsekolah";

$hubungkan = mysql_connect ($host, $user, $pass);
if ($hubungkan) {
	$buka = mysql_select_db ($dbnm);
	if (!$buka) {
		die ("Database tidak dapat dibuka");	
	}
} else {
	die ("Server MySQL tidak terhubung");	
}

?>
