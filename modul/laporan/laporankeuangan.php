<?php
include_once "../../config/config.php";
include_once "../../config/inc.library.php";
include_once "../../config/fungsi_indotgl.php";
?>

<html>
<head>
<title>Laporan Data Keuangan</title>
</head>
<body onLoad="window.print()">

<center>

<h3>LAPORAN KEUANGAN <br>TPQ AL-IKHLAS</h3>

Data Penerimaan
<table border="1" cellpadding="1" cellspacing="0">
	<thead>
		<tr>
                  <th>No.</th>
                  <th>Tgl. Dana Masuk</th>
                  <th>Sumber</th>
                  <th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
<?php										
	$mySql = "SELECT * FROM danamasuk.donatur  
				WHERE danamasuk.id_donatur = donatur.id_donatur 
				GROUP BY id_dana_masuk ORDER BY id_dana_masuk ASC";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
	$nomor++;
?>
		<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $myData['tgl_transaksi']; ?></td>
					<td><?php echo Indonesia2Tgl($myData['tgl_penerimaan']); ?></td>
					<td><?php echo IndonesiaTgl($myData['tgl_nota']); ?></td>
					<td><?php echo $myData['nama']; ?></td>
					<td><?php echo $myData['keterangan']; ?></td>
					<td align="right"><?php echo number_format($myData['jumlah']); ?></td>
		</tr>
		<?php 
			$no++;
			} 
		?>
		
<?php										
	$mySql = "SELECT sum(jumlah) as total_penerimaan FROM penerimaan";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());  
	$myData = mysql_fetch_array($myQry);
	$total_penerimaan = $myData['total_penerimaan'];
	
	
?>		
		<tr>
			<td colspan="6"><b>Total Penerimaan</b></td>
			<td align="right"><b>Rp. <?php echo number_format($total_penerimaan); ?></b></td>
		</tr>
		
		
	</tbody>
</table>


<br><br>

Data Pengeluaran
<table border="1" cellpadding="1" cellspacing="0">
	<thead>
		<tr>
                  <th>No.</th>
                  <th>No. Pengeluaran</th>
                  <th>Tgl. Pengeluaran</th>
                  <th>Tgl. Nota</th>
                  <th>Kode Akun</th>
				  <th>Nama Akun</th>
				  <th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
<?php										
	$mySql = "SELECT * FROM penerimaan,akun 
				WHERE penerimaan.kode_akun = akun.kode_akun 
				GROUP BY no_penerimaan ORDER BY no_penerimaan ASC";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
	$nomor++;
?>
		<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $myData['no_penerimaan']; ?></td>
					<td><?php echo Indonesia2Tgl($myData['tgl_penerimaan']); ?></td>
					<td><?php echo IndonesiaTgl($myData['tgl_nota']); ?></td>
					<td><?php echo $myData['kode_akun']; ?></td>
					<td><?php echo $myData['nama_akun']; ?></td>
					<td align="right"><?php echo number_format($myData['jumlah']); ?></td>
		</tr>
		<?php 
			$no++;
			} 
		?>
		
<?php										
	$mySql = "SELECT sum(jumlah) as total_penerimaan FROM penerimaan";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());  
	$myData = mysql_fetch_array($myQry);
	$total_pengeluaran = $myData['total_penerimaan'];
	
	$saldo_akhir = $total_penerimaan - $total_pengeluaran;
	
	
?>		
		<tr>
			<td colspan="6"><b>Total Pengeluaran</b></td>
			<td align="right"><b>Rp. <?php echo number_format($total_penerimaan); ?></b></td>
		</tr>
		
	</tbody>
</table>


<hr>
<b> Total saldo Akhir : Rp. <?php echo number_format($saldo_akhir); ?></b>
<hr>

<br>
Bandar Lampung, <?php echo Indonesia2Tgl(date("Y-m-d")); ?><br>Direktur
<br><br><br><br><br>
( Desti Nurdianti, S.S., M.Hum. )
</center>

</body>
</html>