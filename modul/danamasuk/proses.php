<?php
session_start();

include_once "../../config/config.php";
date_default_timezone_set('Asia/Jakarta');

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=../../index.php?alert=1'>";
} else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['save'])) {

            $random = (rand() % 999);

            $id_dana_masuk = $_POST["id_dana_masuk"];
            $tgl_transaksi = $_POST["tgl_transaksi"];
            $id_donatur = $_POST["id_donatur"];
            $jmlh_dana_masuk = $_POST["jmlh_dana_masuk"];
            $keterangan = $_POST["keterangan"];

            $mySql    = "INSERT INTO danamasuk
                                  VALUES('$id_dana_masuk','$tgl_transaksi','$id_donatur', '$jmlh_dana_masuk' , '$keterangan')";
            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampildanamasuk&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['id_dana_masuk'])) {

                $id_dana_masuk = $_POST["id_dana_masuk"];
            $tgl_transaksi = $_POST["tgl_transaksi"];
            $id_donatur = $_POST["id_donatur"];
            $jmlh_dana_masuk = $_POST["jmlh_dana_masuk"];
            $keterangan = $_POST["keterangan"];

                $mySql = "UPDATE danamasuk SET tgl_transaksi='$tgl_transaksi' ,id_donatur='$id_donatur' ,jmlh_dana_masuk='$jmlh_dana_masuk' ,keterangan='$keterangan' WHERE id_dana_masuk='$id_dana_masuk'";
                $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                if ($query) {
                    header("location: ../../main.php?open=tampildanamasuk&alert=3");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_dana_masuk'])) {
            $id_dana_masuk = $_GET['id_dana_masuk'];

            $mySql = "DELETE FROM danamasuk WHERE id_dana_masuk='$id_dana_masuk'";
            $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampildanamasuk&alert=2");
            }
        }
    }
}
