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

            $id_matapelajaran = $_POST["id_matapelajaran"];
            $nama_matapelajaran = $_POST["nama_matapelajaran"];

            $mySql    = "INSERT INTO matapelajaran VALUES('$id_matapelajaran','$nama_matapelajaran')";
            $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampilmatapelajaran&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['save'])) {
            if (isset($_POST['id_matapelajaran'])) {

                $id_matapelajaran = $_POST["id_matapelajaran"];
                $nama_matapelajaran = $_POST["nama_matapelajaran"];

                $mySql = "UPDATE matapelajaran SET nama_matapelajaran='$nama_matapelajaran' WHERE id_matapelajaran='$id_matapelajaran'";
                $query    = mysql_query($mySql, $koneksidb)  or die("Query salah : " . mysql_error());

                if ($query) {
                    header("location: ../../main.php?open=tampilmatapelajaran&alert=3");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id_matapelajaran'])) {
            $id_matapelajaran = $_GET['id_matapelajaran'];

            $mySql = "DELETE FROM matapelajaran WHERE id_matapelajaran='$id_matapelajaran'";
            $query = mysql_query($mySql, $koneksidb) or die("Query salah" . mysql_error());

            if ($query) {
                header("location: ../../main.php?open=tampilmatapelajaran&alert=2");
            }
        }
    }
}
