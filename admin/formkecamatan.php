<center>
<?php
include"koneksi.php";
// membaca kode barang terbesar
$query = "SELECT max(kdkec) as maxKode FROM kecamatan";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kode_kec = $data['maxKode'];

// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kode_kec, 1, 2);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "0";
$newID = $char . sprintf("%01s", $noUrut);
?>

<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>


<SCRIPT LANGUAGE="JavaScript">
function pesan() {

var nmjenis= document.forms[0].elements[1].value;
if ((nmjenis.length == 0)) {
window.alert("Anda belum nama kecamatan");
} else {
document.forms[0].submit();
}}
</SCRIPT>
		


<div id="areaku3">
<form name="postform" id="form1" method="post" action="index.php?page=proseskecamatan">
	  
	  <table width="1099" border="0">
        <caption>
        Form Input Data Kecamatan 
        </caption>
        <tr>
          <td colspan="4"><div align="center"></div></td>
        </tr>
        
        <tr> 
          <td width="150">Kode Kecamatan </td>
		  <td width="7">:</td>
          <td width="928" colspan="3"><input name="kdkec" type="text" class="textfield" id="kdkec" size="4"  maxlength="4" value="<?php echo $newID; ?>"></td>
        </tr>
        <tr> 
          <td>Nama Kecamatan </td>
		  <td width="7">: </td>
          <td><input name="nmkec" type="text" class="textfield" id="nmkec" size="40"  maxlength="40" onKeyPress="return goodchars(event,'a bcdefghijklmnopqrsvxywtuzABCDEFGHIJKLMNOPQRSVXYWUTZ',this)" />        
        </tr>
        
        <tr> 
          <td></td>
		  <td> </td>
          <td colspan="3"><input type="button" name="button" class="button" onClick=pesan() value="Simpan">
  <input type="reset" name="bersih" value="Batal" class="button" />    </td>
        </tr>
    </table>
	
</form>	
</div>

<br />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<div id="areaku3">
<form name="nmkec" action="index.php?page=formkecamatan" method="POST">
  <div align="right">
    <input name="nmkec" type="text" class="textfield" required id="nmkec" size="30" placeholder="Cari Nama Kecamatan"/> 
    <input name="Search" type="submit"  class="button" id="Search" value="Search"/>
    
    <?PHP
$nmunitkjr = $_POST['nmunitkjr'];
?>
  </div>
  <table width="1099" border="1"cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  
  <tr>
    <td width="78" height="29" bgcolor="#990000"><div align="center" class="style1">No.</div></td>
    <td width="184" bgcolor="#990000"><div align="center" class="style1">Kode Kecamatan </div></td>
    <td width="901" bgcolor="#990000"><div align="center" class="style1">Nama Kecamatan </div></td>
	<td colspan="2" bgcolor="#990000"><div align="center" class="style1">Aksi</div></td>
  </tr>
  <?php 
include"koneksi.php"; 
$no=1;
$sql = "SELECT * FROM kecamatan where kdkec and nmkec like '%$nmkec%' order by kdkec";
$data=mysql_query($sql);
while($record=mysql_fetch_array($data))
{
?>



<td><div align="center"><samp><?php echo $no;?></samp></div></td>
<td><div align="center"><samp><?php echo $record['kdkec'];?></samp></div></td>
<td><div align="left"><samp><?php echo $record['nmkec'];?></samp></div></td>
<td width="20"><a href="?page=formeditkecamatan&kdkec=<?php echo $record['kdkec']; ?>"><img src="images/edit.png" width="16" height="16" /></a></td>
<td width="20"><a href="?page=deletekecamatan&kdkec=<?php echo $record['kdkec']; ?>" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><img src="images/delete.png" width="16" height="16" /></a></td>
</tr>
<?php
$no=$no + 1;
}
?>


  <tr>
    <td colspan="7" bgcolor="#FFFFFF"><strong><em><samp>Jumlah.......................................:<?php echo mysql_num_rows($data);?></samp></em></strong></td>
  </tr>
</table>


