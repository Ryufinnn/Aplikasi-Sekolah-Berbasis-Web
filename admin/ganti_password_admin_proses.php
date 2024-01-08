<?php
include "koneksi.php";
?>
        <?php
        $pengguna=$_POST['pengguna'];
        $sandi=$_POST['sandi'];
        $password_baru=$_POST['password_baru'];
        $password_baru2=$_POST['password_baru2'];
        ?>
            <?php
			
			if($pengguna==$pengguna && $sandi==$sandi && $password_baru==$password_baru2) 
			{
			$perintah="UPDATE admin SET sandi='$password_baru' WHERE pengguna='$pengguna'";
			$hasil=mysql_query($perintah);

			if($hasil)
			{
			echo "<b>Password Admin Berhasil Diganti</b>";
			echo "<br>";
			echo "<br>";
			}
			else echo "Update Gagal !";
			}
			else echo "Username Password Salah !";
		
			?>
	
	