
<html>
<head>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style3 {font-size: 12px; color: #FFFFFF;}
.style4 {color: #FFFFFF}
.menu211 {border-style: solid;
border-width: 0px;
border-radius: 10px; /*Kode pembuat lengkungan sudut*/
background-color: #ffffff;
margin: 0 0 0 0;
}
.menu2111 {border-style: solid;
border-width: 0px;
border-radius: 10px; /*Kode pembuat lengkungan sudut*/
background-color: #ffffff;
margin: 0 0 0 0;
}
.menu21111 {border-style: solid;
border-width: 0px;
border-radius: 10px; /*Kode pembuat lengkungan sudut*/
background-color: #ffffff;
margin: 0 0 0 0;
}
-->
</style>
<div id="area">
<title>GIS Lokasi Sekolah</title>

<link rel="shortcut icon" href="images/pidie.gif" type="image/x-icon">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/setelan.css" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body background="images/satu.jpg">
<center>

<table width="1041" border="0" align="center" cellpadding="2" cellspacing="0" bordercolor="#660000">
  <tr>
    <td colspan="2" align="left" valign="top" bgcolor="#660000" height="150"><div align="center"><img src="images/luar.png" width="1116" height="168"></div></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top" background="images/bg_footer.png" height="22">
      <div align="center">
        <table width="786" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td><?php include "menu.html"; ?></td>
          </tr>
        </table>
    </div></td></tr>
  <tr>
    <td width="200" height="225" valign="top" bgcolor="#FFFFFF"><table width="194" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td><?php include "liefkiri.php"; ?></td>
          </tr>
        </table>
      <span class="menu21111">
      <?php
    include "inc.bukaprogram.php";
	
  ?>
      </span>
      <table width="217" height="437" border="0" cellpadding="0" cellspacing="0">
        
        <tr>
          <td width="213" background="images/box_h9.png"><div align="center" class="style4"><strong>Kalender</strong></div></td>
          <td width="10" height="24" bgcolor="#FFFFFF"><div align="center" class="style3"></div></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><?php include "kalender.php"; ?></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td height="25" background="images/box_h9.png"><div align="center" class="style4"><strong>Jam Digital </strong></div></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="190" height="134">
            <param name="movie" value="images/online-clock.swf">
            <param name="quality" value="high">
            <embed src="images/online-clock.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="190" height="134"></embed>
          </object></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td height="28" background="images/box_h9.png"><span class="style4"><font size="2" face="Arial, Helvetica, sans-serif"><strong>== Anda pengunjung ke ==</strong></font></span></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><span class="style11">
            <?php include"counter/index.php"; ?>
          </span></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td height="28" background="images/box_h9.png"><div align="center"><span class="style4"><font size="2" face="Arial, Helvetica, sans-serif"><strong>== Link ==</strong></font></span></div></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><a href="http://www.pidiekab.go.id/" target="_blank"><img src="images/logo.png" width="208" height="45" /></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td height="55" bgcolor="#FFFFFF"><a href="http://disdik.acehprov.go.id/" target="_blank"><img src="images/dinas.png" width="208" height="52" /></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><a href="http://www.pidiekab.go.id/" target="_blank"><img src="images/logopijay.png" width="208" height="52" /></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"><a href="http://www.kemdiknas.go.id/" target="_blank"><img src="images/m.png" width="208" height="52" /></td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
      </table>
    <p>&nbsp; </p></td>
    <td width="916" align="left" valign="top" background="images/center.jpg" bgcolor="#FFFFFF"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="mini-font">
      
      <tr>
        <td width="95%" height="39" valign="top"><?php
$halaman = (isset($_GET['halaman']))? $_GET['halaman'] : "utama";
switch ($halaman) {

	case 'home' : include "home.php"; break;
	case 'form' : include "form.php"; break;
	
	//-------------------------------------------------

	case 'sejarah' : include "sejarah.php"; break;
	case 'visimisi' : include "visimisi.php"; break;
	case 'viewpegawai' : include "viewpegawai.php"; break;
	case 'struktur' : include "struktur.php"; break;
	case 'contact' : include "contact.php"; break;
	case 'pembuat' : include "pembuat.php"; break;
	
	case 'ganti_password' : include "ganti_password.php"; break;
	case 'ganti_password_admin_proses' : include "ganti_password_admin_proses.php"; break;
	
	case 'peta_smp' : include "peta_smp.php"; break;
	case 'peta_mtsn' : include "peta_mtsn.php"; break;
	case 'petakeseluruhan' : include "petakeseluruhan.php"; break;
	
	
	case 'formcariperkecamatan' : include "formcariperkecamatan.php"; break;
	case 'formcariperjenis' : include "formcariperjenis.php"; break;
	case 'daftarpegawai' : include "daftarpegawai.php"; break;
	case 'login' : include "login.php"; break;
	
	case 'utama' :
	default : include 'utama.php';	
}
?></td>
        </tr>
    </table></td>
  </tr>
  <tr align="center">
    <td colspan="2"><table width="1120" border="0" cellspacing="0" cellpadding="0" align="left">
      <tr>
        <td width="1124" bgcolor="#660000"><center>
          <p class="style1">Copyright &copy; 2015. <a href="http://smpn5-mlg.sch.id"></a>Sistem Informsi Geografis Lokasi SMP & MTsN </p>
          <p class="style1">&nbsp;</p>
        </center>
          <div align="center"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<br>
</body>
</html>
