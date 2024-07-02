<?php
include_once "../../config/config.php";
include_once "../../config/inc.library.php";
include_once "../../config/fungsi_indotgl.php";
?>

<?php						

	$bulan 	= $_POST['bulan'];
	$tahun	= $_POST['tahun'];
	
	$mySql = "SELECT * FROM danamasuk 
				WHERE month(tgl_transaksi) = '$bulan' AND year(tgl_transaksi) = '$tahun'
				ORDER BY id_dana_masuk ASC";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
	$myData = mysql_fetch_array($myQry);
	
  if($bulan=="1"){ $namabulan = "Januari";
  }else if($bulan=="2"){ $namabulan = "Februari";
  }else if($bulan=="3"){ $namabulan = "Maret";
  }else if($bulan=="4"){ $namabulan = "April";
  }else if($bulan=="5"){ $namabulan = "Mei";
  }else if($bulan=="6"){ $namabulan = "Juni";	 
  }else if($bulan=="7"){ $namabulan = "Juli";
  }else if($bulan=="8"){ $namabulan = "Agustus";
  }else if($bulan=="9"){ $namabulan = "September"; 
  }else if($bulan=="10"){ $namabulan = "Oktober"; 
  }else if($bulan=="11"){ $namabulan = "November"; 
  }else if($bulan=="12"){ $namabulan = "Desember"; } 
?>

<html>
<head>
<title>Laporan Data Keuangan</title>
</head>
<body onLoad="window.print()">

<center>
<img src="../../images/kop-surat.png" width="95%">
<h3>LAPORAN KEUANGAN <br>ITBA DIAN CIPTA CENDIKIA</h3>
Bulan : <?php echo $namabulan; ?> <?php echo $tahun; ?>

<hr>

<h3>Data Dana Masuk</h3>
<table border="1" cellpadding="1" cellspacing="0">
	<thead>
		<tr>
                  <th>No.</th>
                  <th>tgl. Transaksi</th>
                  <th>Tgl. Penerimaan</th>
                  <th>Nama Donatur</th>
                  <th>jenis Donatur</th>
				  <th>keterangan</th>
				  <th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
<?php						

	$bulan 	= $_POST['bulan'];
	$tahun	= $_POST['tahun'];
	
		$mySql = "SELECT * FROM danamasuk,donatur 
				WHERE danamasuk.id_donatur = donatur.id_donatur AND month(tgl_transaksi) = '$bulan' AND year(tgl_transaksi) = '$tahun'
				ORDER BY id_dana_masuk ASC";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
	$nomor++;
?>
		<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $myData['tgl_transaksi']; ?></td>
					<td><?php echo Indonesia2Tgl($myData['tgl_transaksi']); ?></td>
					<td><?php echo $myData['nama']; ?></td>
					<td><?php echo $myData['jenis_donatur']; ?></td>
					<td><?php echo $myData['keterangan']; ?></td>
					<td align="right"><?php echo $myData['jmlh_dana_masuk']; ?></td>
		</tr>
		<?php 
			$no++;
			} 
		?>
		
<?php										
	$mySql = "SELECT sum(jmlh_dana_masuk) as jmlh_dana_masuk FROM danamasuk WHERE month(tgl_transaksi) = '$bulan' AND year(tgl_transaksi) = '$tahun'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());  
	$myData = mysql_fetch_array($myQry);
	$total_penerimaan = $myData['jmlh_dana_masuk'];
	
	
?>		
		<tr>
			<td colspan="6"><b>Total Penerimaan</b></td>
			<td align="right"><b>Rp. <?php echo number_format($total_penerimaan); ?></b></td>
		</tr>
		
		
	</tbody>
</table>


<br><br>
<!--disini kalau di relasiin sama dana masuk tanggal transaksi tabarakan sql ny bingung bacanya kudu di ubah salah satu -->
<h3>Data Dana Keluar</h3>
<table border="1" cellpadding="1" cellspacing="0">
	<thead>
		<tr>
                  <th>No.</th>
                  <th>Tgl. Pengeluaran</th>
                  <th>------</th>
                  <th>-------</th>
                  <th>Saldo Dana</th>
				  <th>Keterangan</th>
				  <th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
<?php										
	$mySql = "SELECT * FROM danakeluar 
				WHERE month(tgl_transaksi) = '$bulan' AND year(tgl_transaksi) = '$tahun'
				ORDER BY id_dana_keluar ASC";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error()); 
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
	$nomor++;
?>
		<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo Indonesia2Tgl($myData['tgl_transaksi']); ?></td>
					<td><?php echo $myData['']; ?></td>
					<td></td>
					<td></td>
					<td><?php echo $myData['ket_pengeluaran']; ?></td>
					<td align="right"><?php echo number_format($myData['jmlh_dana']); ?></td>
		</tr>
		<?php 
			$no++;
			} 
		?>
		
<?php										
	$mySql = "SELECT sum(jmlh_dana) as jmlh_dana FROM danakeluar WHERE month(tgl_transaksi) = '$bulan' AND year(tgl_transaksi) = '$tahun'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());  
	$myData = mysql_fetch_array($myQry);
	$total_pengeluaran = $myData['jmlh_dana'];
	
	$saldo_akhir = $total_penerimaan - $total_pengeluaran;
	
	
?>		
		<tr>
			<td colspan="6"><b>Total Pengeluaran</b></td>
			<td align="right"><b>Rp. <?php echo number_format($total_pengeluaran); ?></b></td>
		</tr>
		
	</tbody>
</table>


<hr>
<b> Total saldo Akhir : Rp. <?php echo number_format($saldo_akhir); ?></b>
<hr>

<br>
Bandar Lampung, <?php echo Indonesia2Tgl(date("Y-m-d")); ?><br>Kelapa TPQ
<br><br><br><br><br>
( ................ )
</center>

</body>
</html>