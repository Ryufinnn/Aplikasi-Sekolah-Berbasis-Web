<?php
require('fpdf/fpdf.php');
  include"koneksi.php";

$tgl = date('d-M-Y');

$pdf = new FPDF();
$pdf->Open();
$pdf->addPage(landscape,legal);
$pdf->setAutoPageBreak(true);
$pdf->Image('images/pidie.gif',10,9,25,20);
$sql = mysql_query("select * FROM lokasi_sekolah, kecamatan, desa where lokasi_sekolah.kdkec=kecamatan.kdkec and lokasi_sekolah.kddes=desa.kddes and jenis = '$_POST[jenis]'");
$data = mysql_fetch_array($sql);
$pdf->setFont('Times','b',14);
$pdf->text(100,20,'DAFTAR NAMA NAMA SEKOLAH SMP DAN MTsN');
$pdf->setFont('Times','b',14);
$pdf->text(110,26,'DINAS PENDIDIKAN KABUPATEN PIDIE');
$pdf->setFont('Times','b',14);
$pdf->setXY(130,28); $pdf->cell(43,6,'JENIS SEKOLAH');$pdf->cell(20,6,':
'.$data[jenis]);
$pdf->setFont('Times','b',9);
$pdf->text(100,38,'Jalan TGK. Chik Ditiro No. 8, Blang Asan, Sigli Telp.(0653) 21576, Fax. (0653) 24786');


$yi = 50;
$ya = 55;
$pdf->setFont('Times','',14);
	$pdf->line(7, 34,310, 34);
	$pdf->line(7, 39,310, 39);
	
$pdf->setFont('Times','b',8);
$pdf->Ln(15);
$pdf->setX(7);
$pdf->SetFillColor(223, 223, 223);
   $pdf->CELL(5,6,'No',1,0,'C',1);
$pdf->CELL(50,6,'Nama Sekolah',1,0,'C',1);
$pdf->CELL(35,6,'Alamat',1,0,'C',1);
$pdf->CELL(35,6,'Desa',1,0,'C',1);
$pdf->CELL(30,6,'Kecamatan',1,0,'C',1);
$pdf->CELL(20,6,'JLM Murid',1,0,'C',1);
$pdf->CELL(20,6,'JLM Guru',1,0,'C',1);
$pdf->CELL(28,6,'Nama Kepala Sekolah',1,0,'C',1);
$pdf->CELL(15,6,'Telpon',1,0,'C',1);
$pdf->CELL(65,6,'Fasilitas',1,0,'C',1);
   
 $ya = $yi + $row;


	// Query untuk merelasikan kedua tabel
$sql = mysql_query("select * FROM lokasi_sekolah, kecamatan, desa where lokasi_sekolah.kdkec=kecamatan.kdkec and lokasi_sekolah.kddes=desa.kddes and jenis = '$_POST[jenis]'");
$jml = mysql_num_rows($sql);
$i = 1;
$no = 1;
$max = 61;
$row = 5;
$hasil = 0;
$hasill = 0;
$hasilll = 0;

while($data = mysql_fetch_array($sql)){
 $pdf->Ln(6);
$pdf->setX(7);
$pdf->setFont('Arial','',6);
$pdf->setFillColor(255,255,255);
$pdf->cell(5,6,$no,1,0,'C',1);
$pdf->cell(50,6,$data[nmsekolah],1,0,'L',1);
$pdf->cell(35,6,$data[alamat],1,0,'L',1);
$pdf->cell(35,6,$data[nmdes],1,0,'L',1);
$pdf->cell(30,6,$data[nmkec],1,0,'L',1);
$pdf->cell(20,6,$data[jlmmrd],1,0,'R',1);
$pdf->cell(20,6,$data[jlmgr],1,0,'R',1);
$pdf->cell(28,6,$data[nmkep],1,0,'L',1);
$pdf->cell(15,6,$data[telp],1,0,'L',1);
$pdf->cell(65,6,$data[fasilitas],1,0,'L',1);
$ya = $ya+$row;
$no++;
$i++;
	}
	
	$pdf->Ln(6);
$pdf->setX(7);

	$pdf->text(260,$ya+12,"Sigli , ".$tgl);
$pdf->text(260,$ya+15,"Dinas Pendidikan Kab Pidie");
$pdf->text(260,$ya+31,"Drs Laisani M.Si");
$pdf->text(260,$ya+35,"Pembina/Nip.19691116 199804 1 003");
	


$pdf->Output('Laporan Per Janis.pdf', I);


?>