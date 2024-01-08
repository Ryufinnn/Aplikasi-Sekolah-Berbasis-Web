<center>

<script type="text/javascript">
String.prototype.trim = function() {a = this.replace(/^\s+/,'');return a.replace(/\s+$/, '');};


 function validasi (){
      var vpengguna = document.frm_reg.pengguna;
	  var vpassword_lama = document.frm_reg.password_lama;
	  var vpassword_baru = document.frm_reg.password_baru;
	  var vpassword_baru2 = document.frm_reg.password_baru2;
	      
	 //pengecekan
	  if(vpengguna.value.trim().length == 0){
	         alert("User Name Harus Di isi ");
	         vpengguna.focus();
	         return false;
			 }
			 if(vsandi.value.trim().length == 0){
	         alert("Sadi lama harus di isi ");
	         vsandi.focus();
	         return false;
			 }
			 if(vpassword_baru.value.trim().length == 0){
	         alert("Passwor Baru Harus di isi ");
	         vpassword_baru.focus();
	         return false;
			 }
			 if(vpassword_baru2.value.trim().length == 0){
	         alert("Verifikasi Password Harus di isi ");
	         vpassword_baru2.focus();
	         return false;
			 }
	 else{
	         return true;
	 }
 }
 </script>
 
		
<div id="areaku3">
<form name="frm_reg" id="form1" method="post" action="index.php?halaman=ganti_password_admin_proses" onSubmit="return validasi();" enctype='multipart/form-data'>
	
      <table width="570" border="0">
        <caption>
        Form Ganti Pasword
        </caption>
        <tr>
          <td colspan="4"><div align="center"></div></td>
        </tr>
        
        <tr> 
          <td width="301"><label for="kdkec">Username </label></td>
          <td width="259" colspan="3"><input name="pengguna" type="text" class="textfield" id="pengguna" size="25" /></td>
        </tr>
        <tr> 
          <td><label for="nmkec">Password Lama </label></td>
          <td><input name="sandi" type="text" class="textfield" id="sandi" size="25" />
        </tr>
        
        <tr>
          <td><label for="nmkec">Password Baru </label></td>
          <td colspan="3"><input name="password_baru" type="text" class="textfield" id="password_baru" size="25" /></td>
        </tr>
        <tr>
          <td><label for="nmkec">Verifikasi Password Baru </label></td>
          <td colspan="3"><input name="password_baru2" type="text" class="textfield" id="password_baru2" size="25" /></td>
        </tr>
        <tr> 
          <td></td>
          <td colspan="3"><input  name="fok" type="submit" id="fok"  value="OK" class="button" />
          <input type="reset" name="bersih" value="Batal" class="button" />    </td>
        </tr>
      </table>
</form>	
<br>


