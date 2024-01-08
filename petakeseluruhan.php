
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
    var pidie = new google.maps.LatLng(5.319793669745921, 95.93213903921423);
    var petaoption = {
        zoom: 11,
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
#jendelainfo{position:absolute;z-index:1000;top:500;
left:940;background-color:yellow;display:none;}
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


<p align="center">
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  
  <strong>PETA LOKASI  SMP DAN MTsN </strong></p>
<p>&nbsp; </p>
<table border=0>
<tr><td width="750">
<div id="petaku" style="width:880px; height:800px"></div>
</td>
</tr>
</table>

</body>
</html>



