<?php
include_once "../../../config/config.php";
include_once "../../../config/inc.library.php";
include_once "../../../config/fungsi_indotgl.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Nama Santri</title>
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
<button class="print-button" onclick="window.print()">Cetak</button>
<center>
    <img src="../../../images/kop-surat.png" width="95%">
    <h3>Data Santri <br>TPQ AL-IKHLAS</h3>
    
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No. Telpon</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $mySql = "SELECT * FROM santri ORDER BY nama ASC";
        $myQry = mysql_query($mySql, $koneksidb) or die("Query salah : " . mysql_error());
        $nomor = 0;
        while ($myData = mysql_fetch_array($myQry)) {
            $nomor++;
        ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $myData['nis']; ?></td>
                <td><?php echo $myData['nama']; ?></td>
                <td><?php echo $myData['tgl_lahir']; ?></td>
                <td><?php echo $myData['alamat']; ?></td>
                <td><?php echo $myData['no_telpon']; ?></td>
                <td><?php echo $myData['jenis_kelamin']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <br>
    Bandar Lampung, <?php echo Indonesia2Tgl(date("Y-m-d")); ?><br>Kelapa TPQ
    <br><br><br><br><br>
    ( ................ )
</center>

</body>
</html>
