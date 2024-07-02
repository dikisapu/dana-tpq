<?php
include_once "../../../config/config.php";
include_once "../../../config/inc.library.php";
include_once "../../../config/fungsi_indotgl.php";
?>

<?php						

	$bulan 	= $_POST['bulan'];
	$tahun	= $_POST['tahun'];
	
	$mySql = "SELECT * FROM spp 
				WHERE month(tgl_bayar) = '$bulan' AND year(tgl_bayar) = '$tahun'
				ORDER BY id_spp ASC";
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
<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .ttd-container {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            padding: 0 50px;
        }
        .ttd {
            text-align: center;
        }

    </style>
<title>Laporan Data SPP</title>
</head>
<body onLoad="window.print()">

<center>
<img src="../../../images/kop-surat.png" width="95%">
<h3>LAPORAN KEUANGAN <br>TPQ AL-IKHLAS</h3>
Bulan : <?php echo $namabulan; ?> <?php echo $tahun; ?>

<hr>

<h3>Data SPP Santri</h3>
<table border="1" cellpadding="1" cellspacing="0">
	<thead>
		<tr>
				<th>No.</th>
                <th>Tanggal Bayar</th>
                <th>Nama Santri</th>
                <th>Jumlah Pembayaran</th>
                <th>Metode Pembayaran</th>
		</tr>
	</thead>
	<tbody>
<?php						

	$bulan 	= $_POST['bulan'];
	$tahun	= $_POST['tahun'];
	
	$mySql = "SELECT * FROM spp 
	JOIN santri ON spp.id_santri = santri.id_santri AND month(tgl_bayar) = '$bulan' AND year(tgl_bayar) = '$tahun'
	GROUP BY spp.id_spp 
	ORDER BY spp.tgl_bayar ASC";
$myQry = mysqli_query($koneksidb, $mySql) or die("Query salah: " . mysqli_error($koneksidb));
$nomor = 0;
	while ($myData = mysql_fetch_array($myQry)) {
	$nomor++;
?>
				<tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo Indonesia2Tgl($myData['tgl_bayar']); ?></td>
                <td><?php echo $myData['nama']; ?></td>
                <td align="right"><?php echo $myData['jmlh_pembayaran']; ?></td>
                <td><?php echo $myData['metode_pembayaran']; ?></td>
            </tr>
		<?php 
			$no++;
			} 
		?>
		
<?php										
	$mySql = "SELECT sum(jmlh_pembayaran) as jmlh_pembayaran FROM spp WHERE month(tgl_bayar) = '$bulan' AND year(tgl_bayar) = '$tahun'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());  
	$myData = mysql_fetch_array($myQry);
	$total_penerimaan = $myData['jmlh_pembayaran'];
	
	
?>		
		<tr>
			<td colspan="3"><b>Total SPP</b></td>
			<td align="right"><b>Rp. <?php echo number_format($total_penerimaan); ?></b></td>
		</tr>
		
		
	</tbody>
</table>



</center>

<div class="ttd-container">
	<div class="ttd">
		<p>Penanggung Jawab</p>
		<p>Bendahara</p>
		<br><br><br><br><br>
		<p>(......................)</p>
	</div>

	<div class="ttd">
	<p>Bandar Lampung, <?php echo Indonesia2Tgl(date("Y-m-d")); ?></p>
	<p>Ketua TPQ</p>
	<br><br><br><br><br>
	<p>(M. Hasyim)</p>
	</div>
</div>

</body>
</html>