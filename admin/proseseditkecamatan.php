

  <?PHP	
include"koneksi.php"; 
#baca variabel Form (if Register Global ON)
if (isset($_POST['edit'])) {
$kdkec = $_POST['kdkec'];
$nmkec = $_POST['nmkec'];

	$query = "UPDATE kecamatan SET kdkec='$kdkec', nmkec='$nmkec' WHERE kdkec='$kdkec'";
	
	$hasil = mysql_query ($query);
	if ($hasil) {
?>
		<span><center>
		  <img src="images/contreng.png" width="22" height="21" /><strong> Data berhasil di perbarui..!!</strong>
		</center>
		
		
		</span>	
<?php
	} else {
		echo "<h2><font color=red>Data gagal diPerbarui</font></h2>";
	}
}
include "formkecamatan.php";
?>
</div>