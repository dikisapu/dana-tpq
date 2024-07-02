<?php
include_once "../../../config/config.php";
include_once "../../../config/inc.library.php";
include_once "../../../config/fungsi_indotgl.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data SPP Keseluruhan</title>
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
    </style>
</head>
<body>
<button  class="print-button" onclick="window.print()">Cetak</button>
<center>
    <img src="../../../images/kop-surat.png" width="95%">
    <h3>LAPORAN SPP <br>TPQ AL-IKHLAS</h3>
    <hr>

    <h3>Data SPP Keseluruhan</h3>
    <table>
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
        $mySql = "SELECT * FROM spp 
                  JOIN santri ON spp.id_santri = santri.id_santri 
                  GROUP BY spp.id_spp 
                  ORDER BY spp.tgl_bayar ASC";
        $myQry = mysqli_query($koneksidb, $mySql) or die("Query salah: " . mysqli_error($koneksidb));

        $nomor = 0;
        $total_penerimaan = 0;

        while ($myData = mysqli_fetch_array($myQry)) {
            $nomor++;
            $total_penerimaan += $myData['jmlh_pembayaran'];
        ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo Indonesia2Tgl($myData['tgl_bayar']); ?></td>
                <td><?php echo $myData['nama']; ?></td>
                <td align="right"><?php echo $myData['jmlh_pembayaran']; ?></td>
                <td><?php echo $myData['metode_pembayaran']; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="3"><b>Total</b></td>
            <td align="right"><b>Rp. <?php echo ($total_penerimaan); ?></b></td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <br>
    Bandar Lampung, <?php echo Indonesia2Tgl(date("Y-m-d")); ?><br>Kelapa TPQ
    <br><br><br><br><br>
    ( ................ )
</center>

</body>
</html>
