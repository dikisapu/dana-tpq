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

            $id_spp = $_POST["id_spp"];
            $tgl_bayar = $_POST["tgl_bayar"];
            $id_santri = $_POST["id_santri"];
            $jmlh_pembayaran = $_POST["jmlh_pembayaran"];
            $metode_pembayaran = $_POST["metode_pembayaran"];

            $mySql    = "INSERT INTO spp VALUES('$id_spp','$tgl_bayar','$id_santri','$jmlh_pembayaran','$metode_pembayaran')";
            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampilspp&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['id_spp'])) {

            $id_spp = $_POST["id_spp"];
            $tgl_bayar = $_POST["tgl_bayar"];
            $id_santri = $_POST["id_santri"];
            $jmlh_pembayaran = $_POST["jmlh_pembayaran"];
            $metode_pembayaran = $_POST["metode_pembayaran"];


                $mySql = "UPDATE spp SET tgl_bayar='$tgl_bayar', id_santri='$id_santri', jmlh_pembayaran='$jmlh_pembayaran', metode_pembayaran='$metode_pembayaran' WHERE id_spp='$id_spp'";
                $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                if ($query) {
                    header("location: ../../main.php?open=tampilspp&alert=3");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_spp'])) {
            $id_spp = $_GET['id_spp'];

            $mySql = "DELETE FROM spp WHERE id_spp='$id_spp'";
            $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampilspp&alert=2");
            }
        }
    }
}
