<?php
include_once "../../config/config.php";
include_once "../../config/inc.library.php";
include_once "../../config/fungsi_indotgl.php";
?>

<html>
<head>
<title>Laporan Data Pengeluaran</title>
</head>
<body onLoad="window.print()">

<center>
<img src="../../images/kop-surat.png" width="100%" height="20%">

<h3>LAPORAN PENGELUARAN KAS <br>TAMAN PENDIDIKAN AL-QUR'AN AL-IKHLAS</h3>

<table border="1" cellpadding="1" cellspacing="0">
	<thead>
		<tr>
                  <th>No.</th>
                  <th>Tgl. Pengeluaran</th>
                  <th>Keterangan</th>
                  <th>Dana Keluar</th>
                  <th>Saldo</th>
		</tr>
	</thead>
	<tbody>
<?php										
	$mySql = "SELECT * FROM danakeluar,danamasuk 
				WHERE danakeluar.id_dana_masuk = danamasuk.id_dana_masuk 
				GROUP BY id_dana_keluar ORDER BY id_dana_keluar ASC";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
	$nomor++;
?>
		<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $myData['tgl_transaksi']; ?></td>
					<td><?php echo $myData['ket_pengeluaran']; ?></td>
					<td><?php echo $myData['jmlh_dana']; ?></td>
					<td><?php echo $myData['jmlh_dana_masuk']; ?></td>
		</tr>
		<?php 
			$no++;
			} 
		?>
	</tbody>
</table>

<br>
Bandar Lampung, <?php echo Indonesia2Tgl(date("Y-m-d")); ?><br>Kepala TPQ
<br><br><br><br><br>
( .................... )
</center>

</body>
</html>