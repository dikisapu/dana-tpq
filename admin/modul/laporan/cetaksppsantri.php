<?php
session_start();
include_once "../../../config/config.php";
include_once "../../../config/inc.library.php";
include_once "../../../config/fungsi_indotgl.php";

// Ambil parameter id_santri dari URL
if (isset($_GET['id_santri'])) {
    $id_santri = $_GET['id_santri'];

    // Query untuk mendapatkan data SPP dan santri berdasarkan id_santri
    $mySql = "SELECT spp.*, santri.nama, santri.alamat
              FROM spp
              JOIN santri ON spp.id_santri = santri.id_santri
              WHERE santri.id_santri = '$id_santri'
              ORDER BY spp.tgl_bayar ASC";
    $myQry = mysqli_query($koneksidb, $mySql) or die("Query salah: " . mysqli_error($koneksidb));
} else {
    echo "ID Santri tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak SPP Santri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
       .tulisan {
        text-align: left;
       }
        .content {
            margin-bottom: 20px;
        }
        .footer {
            text-align: left;
            margin-top: 20px;
        }
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
<div class="footer">
            <button  class="print-button" onclick="window.print()">Cetak</button>
        </div>
<body>
    <div class="container">
        <div class="header">
        <img src="../../../images/kop-surat.png" width="95%">
            <h2>Data SPP Santri</h2>
            <div class="tulisan">
            <?php if ($myData = mysqli_fetch_array($myQry)) { ?>
                <h3 text-align="left"><?php echo $myData['nama']; ?></h3>
                <p><strong>Alamat:</strong> <?php echo $myData['alamat']; ?></p>
            </div>
            
            <?php } ?>
        </div>
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Metode Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 0;
                    mysqli_data_seek($myQry, 0); // Reset pointer result set
                    while ($myData = mysqli_fetch_array($myQry)) {
                        $nomor++;
                    ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $myData['tgl_bayar']; ?></td>
                            <td>Rp.<?php echo $myData['jmlh_pembayaran']; ?></td>
                            <td><?php echo $myData['metode_pembayaran']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
       
    </div>

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
