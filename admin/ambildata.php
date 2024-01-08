<?php
include "koneksi.php";
$akhir = $_GET['akhir'];
if($akhir==1){
    $query = "SELECT * FROM lokasi_sekolah, kecamatan, desa where lokasi_sekolah.kdkec=kecamatan.kdkec and lokasi_sekolah.kddes=desa.kddes  ORDER BY kdsekolah DESC LIMIT 1";
}else{
    $query = "SELECT * FROM lokasi_sekolah, kecamatan, desa where lokasi_sekolah.kdkec=kecamatan.kdkec and lokasi_sekolah.kddes=desa.kddes";
}
$data = mysql_query($query);

$json = '{"wilayah": {';
$json .= '"petak":[ ';
while($x = mysql_fetch_array($data)){
    $json .= '{';
    $json .= '"id":"'.$x['kdsekolah'].'",
        "judul":"'.htmlspecialchars($x['nama']).'",
        "deskripsi":"'.htmlspecialchars($x['deskripsi']).'",
		"nmkec":"'.htmlspecialchars($x['nmkec']).'",
		"nmdes":"'.htmlspecialchars($x['nmdes']).'",
		"nmsekolah":"'.htmlspecialchars($x['nmsekolah']).'",
		"alamat":"'.htmlspecialchars($x['alamat']).'",
		"telp":"'.htmlspecialchars($x['telp']).'",
		"jlmmrd":"'.htmlspecialchars($x['jlmmrd']).'",
		"jlmgr":"'.htmlspecialchars($x['jlmgr']).'",
		"kdsekolah":"'.htmlspecialchars($x['kdsekolah']).'",
		"nmkep":"'.htmlspecialchars($x['nmkep']).'",
		"fasilitas":"'.htmlspecialchars($x['fasilitas']).'",
        "x":"'.$x['lat'].'",
        "y":"'.$x['lng'].'",
		
        "jenis":"'.$x['jenis'].'"
    },';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';

$json .= '}}';
echo $json;

?>
