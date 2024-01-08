<?php
$kdkec = $_GET['kdkec'];

include"koneksi.php"; 
mysql_query("DELETE FROM kecamatan WHERE kdkec='$kdkec'");
{
echo "<script>document.location = 'index.php?page=kecamatan'</script>";exit();
}
?>
