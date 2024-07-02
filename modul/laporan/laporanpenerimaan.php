<?php
include_once "../../config/config.php";
include_once "../../config/inc.library.php";
include_once "../../config/fungsi_indotgl.php";
?>

<html>
<head>
<title>Laporan Data Penerimaan</title>
</head>
<body onLoad="window.print()">

<center>

<div>
<img src="../../images/kop-surat.png" width="95%">
<h3>LAPORAN PENERIMAAN DANA <br>TPQ AL-IKHLAS</h3>

<table border="1" cellpadding="1" cellspacing="0">
	<thead>
		<tr>
                  <th>No.</th>
                  <th>Tgl. Penerimaan</th>
                  <th>Sumber Dana</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
<?php										
	$mySql = "SELECT * FROM danamasuk,donatur 
				WHERE danamasuk.id_donatur = donatur.id_donatur GROUP BY id_dana_masuk";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
	$nomor++;
?>
		<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $myData['tgl_transaksi']; ?></td>
					<td><?php echo $myData['nama']; ?></td>
					<td><?php echo $myData['jmlh_dana_masuk']; ?></td>
					<td><?php echo $myData['keterangan']; ?></td>
					
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