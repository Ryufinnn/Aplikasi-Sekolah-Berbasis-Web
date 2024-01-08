
<?php include "koneksi.php";?>

<?php
include"koneksi.php";
// membaca kode barang terbesar
$query = "SELECT max(kdsekolah) as maxKode FROM lokasi_sekolah";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kode_lokasi = $data['maxKode'];

// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kode_lokasi, 1, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// atau misal sprintf("%02s", 1); maka akan dihasilkan string '001'
$char = "0";
$newID = $char . sprintf("%03s", $noUrut);


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
       var vx = document.frm_reg.x;
	  var vy = document.frm_reg.y;
	  var vnmsekolah = document.frm_reg.nmsekolah;
	  var valamat = document.frm_reg.alamat;
	  var vkdkec = document.frm_reg.kdkec;
	  var vtelp = document.frm_reg.telp;
	  var vjlmmrd = document.frm_reg.jlmmrd;
	  var vjlmgr = document.frm_reg.jlmgr;
	  var vnmkep = document.frm_reg.nmkep;
	   var vfasilitas = document.frm_reg.fasilitas;
	    
	  
	    
	  	      
	 //pengecekan
	  if(vx.value.trim().length == 0){
	         alert("Latitude harus di isi ");
	         vx.focus();
	         return false;
			 }
			 if(vy.value.trim().length == 0){
	         alert("logingitude Harus di isi ");
	         vy.focus();
	         return false;
			 }
			 if(vnmsekolah.value.trim().length == 0){
	         alert("Nama Sekolah Harus di isi ");
	         vnmsekolah.focus();
	         return false;
			 }
			  if(valamat.value.trim().length == 0){
	         alert("Alamat Harus di isi ");
	         valamat.focus();
	         return false;
			 }
			 if(vkdkec.value.trim().length == 0){
	         alert("Nama Kecamatan Harus di isi ");
	         vkdkec.focus();
	         return false;
			 }
			  if(vtelp.value.trim().length == 0){
	         alert("Nomor Telp Harus di isi ");
	         vtelp.focus();
	         return false;
			 }
			  if(vjlmmrd.value.trim().length == 0){
	         alert("Jumlah Muruid Harus di isi ");
	         vjlmmrd.focus();
	         return false;
			 }
			  if(vjlmgr.value.trim().length == 0){
	         alert("Jumlah Guru Harus di isi ");
	         vjlmgr.focus();
	         return false;
			 }
			  if(vnmkep.value.trim().length == 0){
	         alert("Nama Kepala Sekolah Harus di isi ");
	         vnmkep.focus();
	         return false;
			 }
			  if(vfasilitas.value.trim().length == 0){
	         alert("Fasilitas Harus di isi ");
	         vfasilitas.focus();
	         return false;
			 }
			 
	 else{
	         return true;
	 }
 }
 </script>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#kdkec").change(function(){
    var kdkec = $("#kdkec").val();
    $.ajax({
        url: "ambildesa.php",
        data: "kdkec="+kdkec,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kddes").html(msg);
        }
    });
  });
  $("#kddes").change(function(){
    var kddes = $("#kddes").val();
    $.ajax({
        url: "ambilkecamatan.php",
        data: "kddes="+kddes,
        cache: false,
        success: function(msg){
            $("#kddes").html(msg);
        }
    });
  });
});
</script>

<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript">
//google maps GIS 1.1.b by desrizal
//dibuat tanggal 8 Jan 2011
var peta;
var pertama = 0;
var jenis = "MTsN";
var judulx = new Array();
var desx = new Array();
var kecx = new Array();
var desx = new Array();
var kdsekolahx = new Array();

var nmsekolahx = new Array();
var alamatx = new Array();
var telpx = new Array();
var jlmmrdx = new Array();
var jlmgrx = new Array();
var nmkepx = new Array();
var fasilitasx = new Array();

var koorx = new Array();
var koory = new Array();

var i;
var url;
var gambar_tanda;
function peta_awal(){
    var pidie = new google.maps.LatLng(5.378915589026278, 95.95329630359629);
    var petaoption = {
        zoom: 16,
        center: pidie,
         mapTypeId: google.maps.MapTypeId.SATELLITE
        };
    peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        kasihtanda(event.latLng);
    });
    ambildatabase('awal');
	
	/*untuk tgl*/
	new JsDatePick({
		useMode:2,
		target:"tgl",
		dateFormat:"%Y-%m-%d"
	});
}

$(document).ready(function(){
       $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
});
function kasihtanda(lokasi){
    set_icon(jenis);
    tanda = new google.maps.Marker({
            position: lokasi,
            map: peta,
            icon: gambar_tanda
    });
    $("#x").val(lokasi.lat());
    $("#y").val(lokasi.lng());

}

function set_icon(jenisnya){
    switch(jenisnya){
        case "SMP":
            gambar_tanda = 'icon/smp.png';
            break;
			
        case "MTsN":
            gambar_tanda = 'icon/mtsn.png';
			break;
    }
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "ambildata.php?akhir=1";
    }else{
        url = "ambildata.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                judulx[i] = msg.wilayah.petak[i].judul;
                desx[i] = msg.wilayah.petak[i].deskripsi;
				kecx[i] = msg.wilayah.petak[i].nmkec;
				desx[i] = msg.wilayah.petak[i].nmdes;
				kdsekolahx[i] = msg.wilayah.petak[i].kdsekolah;
				nmsekolahx[i] = msg.wilayah.petak[i].nmsekolah;
				alamatx[i] = msg.wilayah.petak[i].alamat;
				telpx[i] = msg.wilayah.petak[i].telp;
				jlmmrdx[i] = msg.wilayah.petak[i].jlmmrd;
				jlmgrx[i] = msg.wilayah.petak[i].jlmgr;
				nmkepx[i] = msg.wilayah.petak[i].nmkep;
				fasilitasx[i] = msg.wilayah.petak[i].fasilitas;
				
				koorx[i] = msg.wilayah.petak[i].x;
				koory[i] = msg.wilayah.petak[i].y;
				
                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: gambar_tanda
                });
                setinfo(tanda,i);

            }
        }
    });
}

function setjenis(jns){
    jenis = jns;
}

function setinfo(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo").fadeIn();
        $("#teksjudul").html(judulx[nomor]);
        $("#teksdes").html(desx[nomor]);
		$("#tekskec").html(kecx[nomor]);
		$("#teksdes").html(desx[nomor]);
		$("#tekskdsekolah").html(kdsekolahx[nomor]);
		$("#teksnmsekolah").html(nmsekolahx[nomor]);
		$("#teksalamat").html(alamatx[nomor]);
		$("#tekstelp").html(telpx[nomor]);
		$("#teksjlmmrd").html(jlmmrdx[nomor]);
		$("#teksjlmgr").html(jlmgrx[nomor]);
		$("#teksnmkep").html(nmkepx[nomor]);
		$("#teksfasilitas").html(fasilitasx[nomor]);
		
		$("#tekskoorx").html(koorx[nomor]);
		$("#tekskoory").html(koory[nomor]);
    });
}
</script>


<style>
#jendelainfo{position:absolute;z-index:1000;top:262;
left:179;background-color:yellow;display:none;}
</style>
</head>
<body onLoad="peta_awal()">
<table id="jendelainfo" border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" height="140">
  <tr>
    <td width="248" bgcolor="#000000" height="19"><font color=white>ID Lokasi : <span id="tekskdsekolah"></span></font></td>
    <td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup"><b>X</b></a></font></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" valign="top" colspan="2"> 
    Kecamatan : <span id="tekskec"></span><br>
	Desa : <span id="teksdes"></span><br>
	Nama Sekolah : <span id="teksnmsekolah"></span><br>
	Alamat : <span id="teksalamat"></span><br>
	Telpon : <span id="tekstelp"></span><br>
	Jumlah Murid : <span id="teksjlmmrd"></span><br>
	Jumlah Guru : <span id="teksjlmgr"></span><br>
	Nama Kepala Sekolah : <span id="teksnmkep"></span><br>
	Fasilitas : <span id="teksfasilitas"></span><br>
	
	Koordinat X : <span id="tekskoorx"></span><br>
	Koordinat Y : <span id="tekskoory"></span><br>
	</td>
  </tr>
</table>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<table border=0>
<form name="frm_reg" id="form1" method="post" action="index.php?page=simpanlokasi" onSubmit="return validasi();" enctype='multipart/form-data'>
<tr><td width="750">
<div id="petaku" style="width:755px; height:820px"></div>
</td>
<td width="196" valign=top>
Form Input Lokasi
  Sekolah
  <p>
    <input type=radio name=jenis value="SMP" onClick="setjenis(this.value)">
<img src="icon/smp.png"> SMP <br>
<input type=radio checked name=jenis value="MTsN" onClick="setjenis(this.value)">
<img src="icon/mtsn.png">MTsN<br>

<p>
X : <input name="lat" onKeyPress="return goodchars(event,'0123456789',this)" type="text" id="x"><br>
Y : <input name="lng" onKeyPress="return goodchars(event,'0123456789',this)" type="text" id="y">
<p>
ID Sekolah :<br>
<input name="kdsekolah" type="text" class="textfield" id="kdsekolah" size="32"  maxlength="4" value="<?php echo $newID; ?>" />
<p>Nama Sekolah:<br />
  <input type="text" name="nmsekolah" id="nmsekolah"  onKeyPress="return goodchars(event,'a bcdefghijklmnopqrsvxywtuzABCDEFGHIJKLMNOPQRSVXYWUTZ',this)" size="32" />
<p>Alamat:<br />
  <input type="text" name="alamat" id="alamat"  onKeyPress="return goodchars(event,'a bcdefghijklmnopqrsvxywtuzABCDEFGHIJKLMNOPQRSVXYWUTZ',this)" size="32" />
<p>
Kecamatan : <br>
<select name="kdkec" id="kdkec">
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
<br>
<br>
Desa : <br>
<select name="kddes" id="kddes">
  <option></option>
</select>
<br>
<br>
Telpon
:<br>
<input type=text name="telp" id="telp" onKeyPress="return goodchars(event,'0123456789',this)" size=32>
<p>
Jumlah Murid:<br>
<input type=text name="jlmmrd" id="jlmmrd" onKeyPress="return goodchars(event,'0123456789',this)" size=32>
<p>
Jumlah Guru:<br>
<input type=text name="jlmgr" id="jlmgr" onKeyPress="return goodchars(event,'0123456789',this)" size=32>
<p>
Nama Kepala Sekolah:<br>
<input type=text name="nmkep" id="nmkep"  onKeyPress="return goodchars(event,'a bcdefghijklmnopqrsvxywtuzABCDEFGHIJKLMNOPQRSVXYWUTZ',this)" size=32>
<p>
Fasilitas:<br>
<textarea name="fasilitas" cols="32" id="fasilitas"  onKeyPress="return goodchars(event,'a bcdefghijklmnopqrsvxywtuzABCDEFGHIJKLMNOPQRSVXYWUTZ',this)" style="width:225px; height:50px"></textarea>
<br>
<br>
<button id="tombol_simpan">Simpan</button>
<img src="ajax-loader.gif" style="display:none" id="loading"></td>
</tr>
</table>

</body>
</html>



