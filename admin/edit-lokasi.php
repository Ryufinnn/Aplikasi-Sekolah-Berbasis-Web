

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
    $("#tombol_simpan").click(function(){
        var x = $("#x").val();
        var y = $("#y").val();
        var judul = $("#judul").val();
        var des = $("#deskripsi").val();
		
		var kdsekolah = $("#kdsekolah").val();
		var nmsekolah = $("#nmsekolah").val();
		var alamat = $("#alamat").val();
		var kdkec = $("#kdkec").val();
		var kddes = $("#kddes").val();
		
		var telp = $("#telp").val();
		var jlmmrd = $("#jlmmrd").val();
		var jlmgr = $("#jlmgr").val();
		var nmkep = $("#nmkep").val();
		var fasilitas = $("#fasilitas").val();
		
        $("#loading").show();
        $.ajax({
            url: "simpanlokasi.php",
            data: "x="+x+"&y="+y+"&jenis="+jenis+"&kdsekolah="+kdsekolah+"&nmsekolah="+nmsekolah+"&alamat="+alamat+"&telp="+telp+"&kdkec="+kdkec+"&kddes="+kddes+"&jlmmrd="+jlmmrd+"&jlmgr="+jlmgr+"&nmkep="+nmkep+"&fasilitas="+fasilitas,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
				$("#kdsekolah").val("");
				$("#nmsekolah").val("");
				$("#telp").val("");
				$("#jlmmrd").val("");
				$("#jlmgr").val("");
				$("#nmkep").val("");
				$("#fasilitas").val("");
		
                ambildatabase('akhir');
				document.location.href='?page=info-lokasi';
            }
        });
    });
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



<head>
<?php
include "koneksi.php";

if (isset($_GET['kdsekolah'])) {
	$kdsekolah = $_GET['kdsekolah'];
} else {
	die ("Error...!! Tidak Ada data Terpilih Untuk di edit! ");	
}

$query = "SELECT * FROM lokasi_sekolah, kecamatan, desa WHERE lokasi_sekolah.kdkec=kecamatan.kdkec and lokasi_sekolah.kddes=desa.kddes and kdsekolah ='$kdsekolah'";
$sql = mysql_query ($query);
$h = mysql_fetch_array ($sql);
$jenis = $h['jenis'];
			?>

<table border=0>
<form name="kdsekolah" action="index.php?page=proseseditlokasi" method="POST">
<input type="hidden" name="kdsekolah" value="<?php echo $h['kdsekolah']; ?>">
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
X : 
  <input type="text" name="lat" id="x" value="<?php echo $h['lat']; ?>" />
  <br>
Y : 
<input type="text" name="lng" id="y" value="<?php echo $h['lng']; ?>" />
<p>ID Sekolah :<br>
<input type="text" name="kdsekolah" value="<?php echo $h['kdsekolah']; ?>" size="32"  class="textfield" disabled="disabled" />
<p>Nama Sekolah:<br />
 <input type=text name="nmsekolah" id="nmsekolah" value="<?php echo $h['nmsekolah']; ?>" size=32>
<p>Alamat:<br />
   <input type=text name="alamat" id="alamat" value="<?php echo $h['alamat']; ?>" size=32>
<p>
Kecamatan : <br>
<select name="kdkec" id="kdkec">
   <option selected="selected" value="<?php print($h['kdkec']) ?>"><?php print($h['nmkec']) ?></option>
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
 <option selected="selected" value="<?php print($h['kddes']) ?>"><?php print($h['nmdes']) ?></option>
</select>
<br>
<br>
Telpon
:<br>
<input type=text name="telp" id="telp" value="<?php echo $h['telp']; ?>" size=32>
<p>
Jumlah Murid:<br>
<input type=text name="jlmmrd" id="jlmmrd" value="<?php echo $h['jlmmrd']; ?>" size=32>
<p>
Jumlah Guru:<br>
<input type=text name="jlmgr" id="jlmgr" value="<?php echo $h['jlmgr']; ?>" size=32>
<p>
Nama Kepala Sekolah:<br>
<input type=text name="nmkep" id="nmkep" value="<?php echo $h['nmkep']; ?>" size=32>
<p>
Fasilitas:<br>
<input name="fasilitas" type="text" style="width:210px; height:40px;" class="textfield" id="fasilitas" value="<?php echo $h['fasilitas']; ?>"size="40"  maxlength="80" />
<br>
<br>
<input type="submit" name="edit" value="Edit Data" />
<img src="ajax-loader.gif" style="display:none" id="loading"></td>
</tr>
</table>

</body>
</html>



