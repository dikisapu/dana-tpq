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

            $id_dana_keluar = $_POST["id_dana_keluar"];
            $tgl_transaksi = $_POST["tgl_transaksi"];
            $ket_pengeluaran = $_POST["ket_pengeluaran"];
            $jmlh_dana = $_POST["jmlh_dana"];
            $id_dana_masuk = $_POST["id_dana_masuk"];

            $mySql    = "INSERT INTO danakeluar VALUES('$id_dana_keluar','$tgl_transaksi', '$ket_pengeluaran' ,'$jmlh_dana', '$id_dana_masuk')";
            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampildanakeluar&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['id_dana_keluar'])) {

            $id_dana_keluar = $_POST["id_dana_keluar"];
            $tgl_transaksi = $_POST["tgl_transaksi"];
            $ket_pengeluaran = $_POST["ket_pengeluaran"];
            $jmlh_dana = $_POST["jmlh_dana"];
            $id_dana_masuk = $_POST["id_dana_masuk"];

                $mySql = "UPDATE danakeluar SET tgl_transaksi='$tgl_transaksi', ket_pengeluaran='$ket_pengeluaran',jmlh_dana='$jmlh_dana',id_dana_masuk='id_dana_masuk'WHERE id_dana_keluar='$id_dana_keluar'";
                $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                if ($query) {
                    header("location: ../../main.php?open=tampildanakeluar&alert=3");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_dana_keluar'])) {
            $id_dana_keluar = $_GET['id_dana_keluar'];

            $mySql = "DELETE FROM danakeluar WHERE id_dana_keluar='$id_dana_keluar'";
            $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampildanakeluar&alert=2");
            }
        }
    }
}
