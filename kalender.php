
<?php
//bulan sekarang
$month=date("m");
//Tahun sekarang
$year=date("Y");
//hari ini
$day=date("d");
//cek jumlah hari tahun sekarang
$endDate=date("t",mktime(0,0,0,$month,$day,$year));
//style untuk table
echo '
<style>
td {
font-size:11;
font-family:verdana;
}
</style>
';
//table untuk menulis tanggal sekarang
echo '<table align="center" border="0" width="100%" cellpadding=2
cellspacing=1 style=""><tr><td align=center>';
echo date("D, d M Y ",mktime(0,0,0,$month,$day,$year));
echo '</td></tr></table>';
//table untuk menulis hari
echo '
<table align="center" border="0" width="100%" cellpadding=2 cellspacing=1
style="border:1px solid #CCCCCC">
<tr bgcolor="#EFEFEF">
<td align=center><font color=red>Su</font></td>
<td align=center>Mo</td>
<td align=center>Tu</td>
<td align=center>We</td>
<td align=center>Th</td>
<td align=center>Fr</td>
<td align=center><font color=blue>Sa</font></td>
</tr>
';
/*
mengecek tanggal 1 bulan sekarang ada pada hari ke berapa
kemudian tambahkan cell td sebanyak var $s
*/
$s=date ("w", mktime (0,0,0,$month,1,$year));
for ($ds=1;$ds<=$s;$ds++) {
echo "<td style=\"font-family:arial;color:#B3D9FF\" width=\"15%\"
align=center valign=middle bgcolor=\"#FFFFFF\">
</td>";
}
for ($d=1;$d<=$endDate;$d++) {
if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }
$fontColor="#000000";
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun")
{ $fontColor="red"; }
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sat")
{ $fontColor="blue"; }
echo "<td style=\"font-family:arial;color:#333333\" width=\"15%\"
align=center valign=middle> <span
style=\"color:$fontColor\">$d</span></td>";
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }
}
//akhir table
echo '</table>';
?>


