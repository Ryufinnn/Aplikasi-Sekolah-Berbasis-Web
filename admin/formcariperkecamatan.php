
<div id="areaku3">
<form name="frm_reg" action="lapperkecamatanpdf.php" method="POST" target="_blank" onSubmit="return validasi();" enctype='multipart/form-data'>

      <table width="852" border="0">
        <caption>
        Form 
        Pencarian Data Sekolah Berdasarkan 
        </caption>
        <tr>
          <td colspan="4"><div align="center"></div></td>
        </tr>
        
        <tr> 
          <td width="627"><div align="right">Kecamatan 
            </label>
          </div></td>
          <td width="215"><select  name="nmkec" class="textfield" id="nmkec" value="nmkec" required/>                    
            <option></option>
            <?php
		  	include"koneksi.php";
		    $perintah="SELECT kdkec, nmkec FROM kecamatan";
  			$ambil=MYSQL_QUERY($perintah);
  			while($hasil=MYSQL_FETCH_ARRAY($ambil))
			{
   echo "<option value ='$hasil[nmkec]'>
   $hasil[nmkec] </option>";
   }
		?>
		</select></select>
		<input name="Search" type="submit"  class="button" id="Search" value="Search"/>        </tr>
    </table>
</form>	
<br>
</div>

