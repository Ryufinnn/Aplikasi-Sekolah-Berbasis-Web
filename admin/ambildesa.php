<?php include "koneksi.php";?>
<?php
$kdkec = $_GET['kdkec'];
$kddes = mysql_query("SELECT kddes,nmdes FROM desa WHERE kdkec='$kdkec' order by nmdes");
echo "<option>-- Pilih Desa --</option>";
while($k = mysql_fetch_array($kddes)){
    echo "<option value=\"".$k['kddes']."\">".$k['nmdes']."</option>\n";
}
?>

