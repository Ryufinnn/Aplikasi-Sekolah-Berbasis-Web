  <?PHP	
include"koneksi.php"; 
$kdkec = $_POST['kdkec'];
$nmkec = $_POST['nmkec'];
	
mysql_query("INSERT INTO kecamatan (kdkec, nmkec) VALUES ('$kdkec','$nmkec')");

{

echo "<script>document.location = 'index.php?page=formkecamatan'</script>";exit();

}	
?>
