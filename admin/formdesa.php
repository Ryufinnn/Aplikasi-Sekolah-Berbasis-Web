<center>
<?php
include"koneksi.php";
// membaca kode barang terbesar
$query = "SELECT max(kddes) as maxKode FROM desa";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kode_des = $data['maxKode'];

// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kode_des, 1, 2);

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

<script type="text/javascript">
String.prototype.trim = function() {a = this.replace(/^\s+/,'');return a.replace(/\s+$/, '');};


 function validasi (){
       var vnmdes = document.frm_reg.nmdes;
	  var vkdkec = document.frm_reg.kdkec;		
	  	      
	 //pengecekan
	  if(vnmdes.value.trim().length == 0){
	         alert("Nama Desa Tidak Boleh Kosong ");
	         vnmdes.focus();
	         return false;
			 }
			 if(vkdkec.value.trim().length == 0){
	         alert("Nama Kecamatan Tidak Boleh Kosong ");
	         vkdkec.focus();
	         return false;
			 }			 			 
	 else{
	         return true;
	 }
 }
 </script>


<div id="areaku3">
<form name="frm_reg" id="form1" method="post" action="index.php?page=prosesdesa" onSubmit="return validasi();" enctype='multipart/form-data'>

	  
	  <table width="1099" border="0">
        <caption>
        Form Input Data Desa 
        </caption>
        <tr>
          <td colspan="4"><div align="center"></div></td>
        </tr>
        
        <tr> 
          <td width="150">Kode Desa </td>
		  <td width="7">:</td>
          <td width="928" colspan="3"><input name="kddes" type="text" class="textfield" id="kddes" size="4"  maxlength="4" value="<?php echo $newID; ?>"></td>
        </tr>
        <tr> 
          <td>Nama Desa </td>
		  <td width="7">: </td>
        <td><input name="nmdes" type="text" class="textfield" id="nmdes" size="40"  maxlength="40" onKeyPress="return goodchars(event,'a bcdefghijklmnopqrsvxywtuzABCDEFGHIJKLMNOPQRSVXYWUTZ',this)" />        </tr>
        
        <tr>
           <td>Kecamatan</td>
           <td>:</td>
          <td colspan="3"><span style="padding-top:2px; padding-bottom:2px;">
            <select name="kdkec" class="textfield" id="kdkec" style="width:268px; height:20px;">
              <option></option>
              <?php
                 // query untuk menampilkan propinsi
                 $query = "SELECT * FROM kecamatan";
                 $hasil = mysql_query($query);
                 while ($data = mysql_fetch_array($hasil))
                 {
                    echo "<option value='".$data['kdkec']."'>".$data['nmkec']."</option>";
                 }
          ?>
            </select>
          </span></td>
        </tr>
        <tr> 
          <td></td>
		  <td> </td>
          <td colspan="3"><input  name="fok" type="submit" id="fok"  value="Simpan" class="button" />
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
<form name="nmdes" action="?page=formdesa" method="POST">
  <div align="right">
    <input name="nmdes" type="text" required class="textfield" id="nmdes" size="30" placeholder="Masukkan Nama Desa"/> 
    <input name="Search" type="submit"  class="button" id="Search" value="Search"/>
    
    <?PHP
$nmdes = $_POST['nmdes'];
?>
  </div>
  <table width="1099" border="1"cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  
  <tr>
    <td width="61" height="29" bgcolor="#990000"><div align="center" class="style1">No.</div></td>
    <td width="158" bgcolor="#990000"><div align="center" class="style1">Kode Desa  </div></td>
    <td width="331" bgcolor="#990000"><div align="center" class="style1">Nama Desa </div></td>
    <td width="493" bgcolor="#990000"><div align="center" class="style1">Kecamatan</div></td>
	<td colspan="2" bgcolor="#990000"><div align="center" class="style1">Aksi</div></td>
  </tr>
  <?php 
include"koneksi.php"; 
$no=1;
$sql = "SELECT * FROM desa, kecamatan where desa.kdkec=kecamatan.kdkec and nmdes like '%$nmdes%' order by kddes";
$data=mysql_query($sql);
while($record=mysql_fetch_array($data))
{
?>



<tr><td><div align="center"><samp><?php echo $no;?></samp></div></td>
<td><div align="center"><samp><?php echo $record['kddes'];?></samp></div></td>
<td><div align="left"><samp><?php echo $record['nmdes'];?></samp></div></td>
<td><div align="left"><samp><?php echo $record['nmkec'];?></samp></div></td>
<td width="20"><a href="?page=formeditdesa&kddes=<?php echo $record['kddes']; ?>"><img src="images/edit.png" width="16" height="16" /></a></td>
<td width="22"><a href="?page=deletedesa&kddes=<?php echo $record['kddes']; ?>" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><img src="images/delete.png" width="16" height="16" /></a></td>
</tr>
<?php
$no=$no + 1;
}
?>


  <tr>
    <td colspan="8" bgcolor="#FFFFFF"><strong><em><samp>Jumlah.......................................:<?php echo mysql_num_rows($data);?></samp></em></strong></td>
  </tr>
</table>


