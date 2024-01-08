<?php
$kddes = $_GET['kddes'];

include"koneksi.php"; 
mysql_query("DELETE FROM desa WHERE kddes='$kddes'");
{
echo "<script>document.location = 'index.php?page=formdesa'</script>";exit();
}
?>
