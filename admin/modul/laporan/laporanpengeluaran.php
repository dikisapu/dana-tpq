<?php
include_once "../../../config/config.php";
include_once "../../../config/inc.library.php";
include_once "../../../config/fungsi_indotgl.php";
?>

<html>

<head>
	<title>Laporan Data Pengeluaran</title>
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
        @media print {
            .print-button {
                display: none;
            }
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
</head>

<body>  
	<button  class="print-button" onclick="window.print()">Cetak</button></body>

	<center>
		<img src="../../../images/kop-surat.png" width="100%" height="20%">

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
				$myQry = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());
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
				 <?php 
                                        $mySqlPenerimaan = "SELECT sum(jmlh_dana) as total_penerimaan FROM danakeluar";
                                        $myQryPenerimaan = mysqli_query($koneksidb, $mySqlPenerimaan) or die("Query salah : " . mysqli_error($koneksidb));
                                        $myDataPenerimaan = mysqli_fetch_array($myQryPenerimaan);
                                        $total_penerimaan = $myDataPenerimaan['total_penerimaan'];

                                        ?>

                                        <tr>
                                        <td colspan="4"><b>Total Pengeluaran</b></td>
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
            <p>( ........................ )</p>
        </div>
		
        <div class="ttd">
            <p>Bandar Lampung, <?php echo Indonesia2Tgl(date("Y-m-d")); ?></p>
            <p>Kepala TPQ</p>
            <br><br><br><br><br>
            <p>( M. Hasyim )</p>
        </div>
        
    </div>

</body>

</html>