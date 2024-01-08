<script type="text/javascript">
 function validasi (){
     var vpengguna = document.frm_reg.pengguna;
	 var vsandi = document.frm_reg.sandi;
     

	 //pengecekan
	 if(vpengguna.value.trim().length == 0){
	         alert("Anda Lupa Mamasukkan Username");
	         vpengguna.focus();
	         return false;
	 }
	 if(vsandi.value.trim().length == 0){
	         alert("Anda Lupa Mamasukkan Password ");
	         vsandi.focus();
	         return false;
	 }
	 
	 else{
	         return true;
	 }
 }
 </script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" height="128" border="0" align="center" cellpadding="0" cellspacing="0">
<form name="frm_reg" id="form1" method="post" action="validasi.php" onSubmit="return validasi();" enctype='multipart/form-data'>

  <tr>
    <td width="153" height="19"><div align="center" class="style5">Username</div></td>
  </tr>
  <tr>
    <td height="22"><div align="center">
      <input name="pengguna" type="text" placeholder="Username"/>
    </div></td>
  </tr>
  <tr>
    <td height="19"><div align="center" class="style5">Password</div></td>
  </tr>
  <tr>
    <td height="22"><div align="center">
      <input name="sandi" type="password" placeholder="Password"/>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">
      <input name="Submit" type="submit" id="Submit" value="Login" />
      <input name="Reset" type="Reset" id="Reset" value="Reset" />
    </div>        </td>
  </tr>
</table>
<div align="center"></div>
</body>
</html>
