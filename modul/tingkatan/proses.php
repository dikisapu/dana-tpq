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

            $id_matapelajaran = $_POST["id_tingkatan"];
            $tingkatan = $_POST["tingkatan"];

            $mySql    = "INSERT INTO tingkatan VALUES('$id_tingkatan','$tingkatan')";
            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampiltingkatan&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['id_tingkatan'])) {

                $id_tingkatan = $_POST["id_tingkatan"];
                $tingkatan = $_POST["tingkatan"];

                $mySql = "UPDATE tingkatan SET tingkatan='$tingkatan' WHERE id_tingkatan='$id_tingkatan'";
                $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                if ($query) {
                    header("location: ../../main.php?open=tampiltingkatan&alert=3");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_tingkatan'])) {
            $id_tingkatan = $_GET['id_tingkatan'];

            $mySql = "DELETE FROM tingkatan WHERE id_tingkatan='$id_tingkatan'";
            $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampiltingkatan&alert=2");
            }
        }
    }
}
