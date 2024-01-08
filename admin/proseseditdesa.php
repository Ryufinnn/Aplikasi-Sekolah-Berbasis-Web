

  <?PHP	
include"koneksi.php"; 
#baca variabel Form (if Register Global ON)
if (isset($_POST['edit'])) {
$kddes = $_POST['kddes'];
$nmdes = $_POST['nmdes'];
$kdkec = $_POST['kdkec'];

	$query = "UPDATE desa SET kddes='$kddes', nmdes='$nmdes', kdkec='$kdkec' WHERE kddes='$kddes'";
	
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
include "formdesa.php";
?>
</div>