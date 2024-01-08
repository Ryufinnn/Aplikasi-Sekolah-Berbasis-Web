<?php
include "koneksi.php";
if(isset($_GET['mode'])=='delete'){
	 $kdsekolah=$_GET['kdsekolah'];
	 mysql_query("delete from lokasi_sekolah where kdsekolah='$kdsekolah'");
	 
	 ?><script language="javascript">document.location.href="?page=editdeletelokasi"</script><?php
}
?>

<?php

	$entries=50;
	$query=mysql_query("select * FROM lokasi_sekolah, kecamatan, desa where lokasi_sekolah.kdkec=kecamatan.kdkec and lokasi_sekolah.kddes=desa.kddes"); //input
	$get_pages=mysql_num_rows($query);
	
	if ($get_pages>$entries)  //proses
	{
		$jumlah_halaman=ceil($get_pages/$entries);
		$halaman_aktif=$_GET['kdsekolah'];
		
		//untuk prev
		if(($halaman_aktif)>0){
			$prev=$halaman_aktif-1;
			?><a href="?page=editdeletelokasi&kdsekolah=<?php  echo $prev; ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900"> &laquo;Prev&nbsp;&nbsp;</font></a><?php 
		}
		
		//echo "Halaman : ";
		$pages=1;
		while($pages<=ceil($get_pages/$entries))
		{
			
			//untuk menandai halaman yang aktif
			if (($pages-1)==$halaman_aktif){
				$font="<font size='2' face='verdana' color='red'>";
			}else{
				$font="<font size='2' face='verdana' color='#009900'>";
			}
		?>
			
		<?php 
				$pages++;
		}
	}else{
		$pages=0;
	}
	
	//untuk next
	if($halaman_aktif<$jumlah_halaman){
		$next=$halaman_aktif+1;
		?>&nbsp;&nbsp;<a href="?page=info-lokasi&kdsekolah=<?php  echo $next; ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900">Next&raquo;</font></a><?php 
	}
	
	//proses halaman
	$page=(int)$_GET['kdsekolah'];
	$offset=$page*$entries;
	$result=mysql_query("select * from lokasi_sekolah, kecamatan, desa where lokasi_sekolah.kdkec=kecamatan.kdkec and lokasi_sekolah.kddes=desa.kddes order by kdsekolah asc limit $offset,$entries"); //output
	$jumlah=mysql_num_rows($query);
	
	//akhir paging
	echo "</center>";

	if ($jumlah){
	?>

		<div style='overflow-y:scroll;overflow-x:scroll;width:950px;height:500px;padding:20px;scroll-color:hidden;'>
		<table width="955" border="0" cellpadding="0" cellspacing="0" class="sortable" id="table">
		<thead>
			<tr>
			
				<th colspan="2"><h3>Aksi</h3></th>
				<th><h3>Nomor</h3></th>
				<th><h3>ID Lokasi</h3></th>
				<th><h3>Nama Sekolah</h3></th>
				<th><h3>Alamat</h3></th>
				<th><h3>Desa </h3></th>
				<th><h3>Kecamatan</h3></th>
				<th><h3>Telpon</h3></th>
				<th><h3>Jumlah Murid </h3></th>
				<th><h3>Jumlah Guru </h3></th>
				<th><h3>Nama Kepala Sekolah </h3></th>
				<th><h3>Fasilitas </h3></th>
				<th><h3>Koord X</h3></th>
				<th><h3>Koord Y</h3></th>
			</tr>
		</thead>
		<tbody>
		 <?php
			//$query=mysql_query("SELECT * FROM view_informasi");					

		
			while($row=mysql_fetch_assoc($result)){
				?>
				<tr>
					<td><a href="?page=edit-lokasi&kdsekolah=<?php echo $row['kdsekolah'];?>"><img src="images/edit.png"></a></td>
					<td><a href="?page=editdeletelokasi&mode=delete&kdsekolah=<?php echo $row['kdsekolah'];?>" onClick="return confirm('Apakah Anda Yakin?')"><img src="images/delete.png"></a></td>
					
					<td><?php echo $d=$d+1;?></td>
					<td><?php echo $row['kdsekolah'];?></td>
					<td><?php echo $row['nmsekolah'];?></td>
					<td><?php echo $row['alamat'];?></td>
					<td><?php echo $row['nmdes'];?></td>
					<td><?php echo $row['nmkec'];?></td>
					<td><?php echo $row['telp'];?></td>
					<td><?php echo $row['jlmmrd'];?></td>
					<td><?php echo $row['jlmgr'];?></td>
					<td><?php echo $row['nmkep'];?></td>
					<td><?php echo $row['fasilitas'];?></td>
					<td><?php echo $row['lat'];?></td>
					<td><?php echo $row['lng'];?></td>	
				</tr>
				<?php
			}
		?>
		</tbody>
		</table>
		</div>
		<center>Jumlah Data : <?php echo $jumlah;?></center>
		<script type="text/javascript" src="script.js"></script>
		<script type="text/javascript">
			var sorter = new TINY.table.sorter("sorter");
			sorter.head = "head";
			sorter.asc = "asc";
			sorter.desc = "desc";
			sorter.even = "evenrow";
			sorter.odd = "oddrow";
			sorter.evensel = "evenselected";
			sorter.oddsel = "oddselected";
			sorter.paginate = true;
			sorter.currentid = "currentpage";
			sorter.limitid = "pagelimit";
			sorter.init("table",0);
		</script>

<?php 	
}else{
	?><p><center><font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font></center><br /><?php 
}
?>