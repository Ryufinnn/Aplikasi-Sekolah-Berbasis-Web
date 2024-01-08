<?php
	require_once('ceklaman.php');
?>
<html>
<head>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style2 {color: #FFFFFF}
-->
</style>
<div id="area">
<title>GIS Lokasi Sekolah</title>
<link rel="shortcut icon" href="images/pidie.gif" type="image/x-icon">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/setelan.css" type="text/css" />
<link rel="stylesheet" href="style.css" />

<script src="./lib/jquery.min.js"></script>
	<script src="./lib/highcharts.js"></script>
	<script src="./lib/modules/exporting.js"></script>

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

<table width="844" border="0" align="center" cellpadding="2" cellspacing="0" bordercolor="#660000">
  <tr>
    <td align="left" valign="top"  background="images/dropdown-bg.png" height="150"><div align="center"><img src="images/h.png" width="1002" height="181"></div></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="top" background="images/dropdown-bg.png">
      <div align="center">
        <table width="786" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td><?php include "menu.html"; ?></td>
          </tr>
        </table>
    </div></td></tr>
  <tr>
    <td width="1124" height="225" align="center" valign="top" background="images/center.jpg" bgcolor="#FFFFFF"><table width="58%"  border="0" cellpadding="0" cellspacing="0" class="mini-font">
        
        <tr>
          <td width="98%" height="39" valign="top"><h3>
            <?php
		$pg = htmlentities($_GET['page']);	
		$file ="$pg.php";
		if (!file_exists($file)) {
			include ("depan.php");
		}else if($pg=="" || $pg=="depan"){
			include ("depan.php");
		}else{
			include ("$pg.php");
		}
		?>
          </h3>
            
          </td>
        </tr>
        
    </table>
    <p>&nbsp;</p>    </td>
  </tr>
  <tr align="center">
    <td  background="images/dropdown-bg.png"><table width="1004" border="0"  cellspacing="0" cellpadding="0" align="left">
      <tr>
        <td width="1004" background="images/dropdown-bg.png"><center>
         <p class="style1">Copyright &copy; 2015.<a href="http://smpn5-mlg.sch.id"> </a>Sistem Informsi Geografis Lokasi SMP & MTsN </p>
          <p class="style1">&nbsp;</p>
        </center>
          <div align="center"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
