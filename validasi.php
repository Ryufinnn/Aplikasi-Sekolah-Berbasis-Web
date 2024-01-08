<?php
	//memulai session
	session_start();
	
	//Include file koneksi ke database
	require_once('koneksi.php');
			
	//fungsi untuk membersihkan nilai yang diterima dari form. mencegah SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//mengambil nilai inputan form dan menyimpan ke variabel
	$namapengguna = clean($_POST['pengguna']);
	$katasandi = clean($_POST['sandi']);
		
	
	//buat query
	$qry="SELECT * FROM admin WHERE pengguna='$namapengguna' AND sandi='".($_POST['sandi'])."'";
	$result=mysql_query($qry);
	
	//Check   query  telah sukses
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login berhasil
			session_regenerate_id();
			$user = mysql_fetch_assoc($result);
			$_SESSION['PENGGUNA'] = $user['pengguna'];//isi variabel session dengan query tabel
			$_SESSION['KATASANDI'] = $user['sandi'];//isi variabel session dengan query tabel
			session_write_close();
			header("location: admin/index.php");
			exit();
		}else {
			//Login gagal akan diarahkan ke halaman failed login
			echo "<script>alert('Anda Gagal Login Ulangi Kembali');</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
			exit();
		}
	}else {
		die("Query failed");
	}
?>

