<?php
include "koneksi.php";
$kdsekolah = $_POST['kdsekolah'];
$nmsekolah = $_POST['nmsekolah'];
$jenis = $_POST['jenis'];
$kdkec = $_POST['kdkec'];
$kddes = $_POST['kddes'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$jlmmrd = $_POST['jlmmrd'];
$jlmgr = $_POST['jlmgr'];
$nmkep = $_POST['nmkep'];
$fasilitas = $_POST['fasilitas'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];


mysql_query("insert into lokasi_sekolah(kdsekolah,nmsekolah,jenis,kdkec,kddes,alamat,telp,jlmmrd,jlmgr,nmkep,fasilitas,lat,lng)
values('$kdsekolah','$nmsekolah','$jenis','$kdkec','$kddes','$alamat','$telp','$jlmmrd','$jlmgr','$nmkep','$fasilitas',$lat,$lng)");


{

echo "<script>document.location = 'index.php?page=info-lokasi'</script>";exit();

}
?>
