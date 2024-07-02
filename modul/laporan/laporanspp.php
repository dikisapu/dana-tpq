<?php
include_once "../../config/config.php";
include_once "../../config/inc.library.php";
include_once "../../config/fungsi_indotgl.php";
?>

<html>
<head>
<title>Laporan Data SPP</title>
</head>
<body onLoad="window.print()">

<center>

<div>
<img src="../../images/kop-surat.png" width="95%">
<h3>LAPORAN PENERIMAAN DANA SPP <br>TPQ AL-IKHLAS</h3>

<table border="1" cellpadding="1" cellspacing="0">
	<thead>
		<tr>
                  <th>No.</th>
                  <th>Nama Santri</th>
                  <th>Tgl. Pembayaran</th>
                  <th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
<?php										
	$mySql = "SELECT * FROM spp,santri 
				WHERE spp.id_santri = santri.id_santri GROUP BY id_spp";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
	$nomor++;
?>
		<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $myData['nama']; ?></td>
					<td><?php echo $myData['tgl_bayar']; ?></td>
					<td><?php echo $myData['jmlh_pembayaran']; ?></td>
					
		<?php 
			$no++;
			} 
		?>
	</tbody>
</table>

<br>
Bandar Lampung, <?php echo Indonesia2Tgl(date("Y-m-d")); ?><br>Kepala TPQ
<br><br><br><br><br>
( M. Hasyim )
</center>

</body>
</html>