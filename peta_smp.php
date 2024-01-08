
<?php
	include "koneksi.php";
	$jenis = $_POST['search'];
	
	if(isset($_POST['submit'])){ 
		$sql="SELECT * FROM lokasi_sekolah, kecamatan, desa where lokasi_sekolah.kdkec=kecamatan.kdkec and lokasi_sekolah.kddes=desa.kddes and jenis like '%$jenis%'";			
		$query = mysql_query($sql);
		$num = mysql_num_rows($query);
	}	
?>
<html> 
<head> 
<title>Peta</title>
<style type="text/css">
*{
	margin:0;
	padding:0;
}
#top{
	width:100%;
	height:30px;
	background:black;
}
#logo{
	padding:5px 100px 0 50px;
	width:200px;
	height:65px;
	float:left;
}
#map{
	width:870;
	height:800;
	border:1px solid black;
	margin-top:10px;
	margin-left:4px;
}
#search{
	width:250px;
	height:30px;
	border:1px solid #D8D8D8;
	padding:0 0 0 5px;
	margin:18px 0 0 0;
}
#button-search{
	width:50px;
	height:30px;
	border:1px solid #808080;
	border-radius:5px;
	background:#0066FF;
	color:white;
}
#form-cari{
	width:100%;
	height:70px;
	background:#F0F0F0;
	border-bottom:1px solid #E0E0E0;
}
.style1 {
	color: #000000;
	font-weight: bold;
}
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript">
<?php
	if($num>0){
		echo 'var locations = ['."\r\n";
		$i=0;
		while($row = mysql_fetch_array($query)){
			echo '['.$row['lat'].','.$row['lng'].',"'.$row['jenis'].'","'.$row['nmsekolah'].'","'.$row['alamat'].'","'.$row['nmdes'].'","'.$row['nmkec'].'","'.$row['telp'].'","'.$row['jlmmrd'].'","'.$row['jlmgr'].'","'.$row['nmkep'].'","'.$row['fasilitas'].'","'.$row['lat'].'","'.$row['lng'].'"]';
			if($i<$num-1) 
				echo ','."\r\n";
			else 
				echo "\r\n";
			$i++;
		}
		echo ']'."\r\n";
	}
?>
    function initialize() {
		var map = new google.maps.Map(document.getElementById('map'), {
		  zoom: 11,
		  center: new google.maps.LatLng(5.319793669745921, 95.93213903921423),
		  mapTypeId: google.maps.MapTypeId.SATELLITE
		});
	
		var infowindow = new google.maps.InfoWindow();
	
		var marker, i;
	
		for (i = 0; i < locations.length; i++) {
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][0], locations[i][1]),
				map: map,
				icon: 'images/smp.png'
			});
			
			
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.setContent("Jenis : "+locations[i][2]+"<br />Nama Sekolah : "+locations[i][3]+"<br />Alamat: "+locations[i][4]+"<br />Desa : "+locations[i][5]+"<br />Kecamatan : "+locations[i][6]+"<br />Telp : "+locations[i][7]+"<br />Jlm Muruid : "+locations[i][8]+"<br />Jlm Guru : "+locations[i][9]+"<br />Nama Kepala Sekolah : "+locations[i][10]+"<br />Fasilitas : "+locations[i][11]+"<br />Langtitut : "+locations[i][12]+"<br />Longtitut : "+locations[i][13]+"\n");
					infowindow.open(map, marker);
				}
			})(marker, i));
		}
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head> 
<body>  

</img>
<div align="center"><span class="style1"> LOKASI SEKOLAH MENEGAH PERTAMA (SMP) DI KABUPATEN PIDIE </span></div>
<form method="post">
  <select  name="search" size="1" id="search" style="width:70px; height:20px;" value="search"/>                        
              <option value="SMP">SMP</option>
            </select>
	<input type="submit"  name="submit" value="Tampilkan Dara Peta Lokasi SMP" />
</form>
</div>
<div id="map">  
</div> 

</body> 
</html> 
<br>
