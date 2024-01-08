  <?PHP	
include"koneksi.php"; 
$kddes = $_POST['kddes'];
$nmdes = $_POST['nmdes'];
$kdkec = $_POST['kdkec'];
	
mysql_query("INSERT INTO desa (kddes, nmdes, kdkec) VALUES ('$kddes','$nmdes','$kdkec')");

{

echo "<script>document.location = 'index.php?page=formdesa'</script>";exit();

}	
?>
