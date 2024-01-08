<?php
include "koneksi.php";
if (isset($_POST['edit'])) {
	$kdsekolah = $_POST['kdsekolah'];
	$nmsekolah = $_POST['nmsekolah'];
	$kdkec = $_POST['kdkec'];
	$kddes = $_POST['kddes'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$jlmmrd = $_POST['jlmmrd'];
	$jlmgr = $_POST['jlmgr'];
	$nmkep = $_POST['nmkep'];
	$fasilitas = $_POST['fasilitas'];
	$jenis = $_POST['jenis'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	
	
	//update data
	
	$query = "UPDATE lokasi_sekolah SET kdsekolah='$kdsekolah',nmsekolah='$nmsekolah', kdkec='$kdkec', kddes='$kddes', alamat='$alamat', telp='$telp', jlmmrd='$jlmmrd', jlmgr='$jlmgr', nmkep='$nmkep',fasilitas='$fasilitas', jenis='$jenis', lat='$lat',lng='$lng' WHERE kdsekolah='$kdsekolah'";
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
include "editdeletelokasi.php";
?>
